<script>
/**
 * Block Clipboard Handler
 * Handles copying and pasting blocks between content types using Clipboard API
 */
document.addEventListener('livewire:init', () => {

    /**
     * Event: Copy block data to clipboard
     * Triggered from PHP when user clicks "Copy Block"
     */
    Livewire.on('copy-block-to-clipboard', async ({ blockData }) => {
        try {
            await navigator.clipboard.writeText(blockData);
            console.log('[BlockClipboard] Block copied to clipboard');
        } catch (err) {
            console.error('[BlockClipboard] Failed to copy to clipboard:', err);
            // Fallback: Show the JSON in an alert for manual copy
            prompt('Auto-copy failed. Please copy this manually:', blockData);
        }
    });

    /**
     * Event: Request to paste from clipboard
     * Triggered when user clicks "Paste Block" button
     */
    Livewire.on('request-paste-from-clipboard', async () => {
        console.log('[BlockClipboard] Paste requested, reading clipboard...');

        try {
            // Request clipboard read permission
            const text = await navigator.clipboard.readText();

            if (!text || text.trim() === '') {
                alert('Clipboard is empty');
                return;
            }

            // Validate it's JSON
            let parsed;
            try {
                parsed = JSON.parse(text);
                if (!parsed.type || !parsed.data) {
                    alert('Clipboard does not contain valid block data. Expected format: {"type": "...", "data": {...}}');
                    return;
                }
            } catch (e) {
                alert('Clipboard does not contain valid JSON block data');
                return;
            }

            console.log('[BlockClipboard] Valid block found, type:', parsed.type);

            // Find the correct Livewire component (edit or create for any resource type)
            const components = Livewire.all();
            const targetComponent = components.find(c =>
                c.name && (
                    c.name.includes('edit-page') || c.name.includes('create-page') ||
                    c.name.includes('edit-post') || c.name.includes('create-post') ||
                    c.name.includes('edit-event') || c.name.includes('create-event') ||
                    c.name.includes('edit-service') || c.name.includes('create-service')
                )
            );

            if (targetComponent && targetComponent.$wire) {
                console.log('[BlockClipboard] Calling pasteBlockFromClipboard on:', targetComponent.name);
                targetComponent.$wire.pasteBlockFromClipboard(text);
            } else {
                console.error('[BlockClipboard] No compatible component found');
                alert('Error: Could not find a compatible content builder component');
            }

        } catch (err) {
            console.error('[BlockClipboard] Failed to read clipboard:', err);

            // Clipboard API might be blocked - show manual input
            const manualInput = prompt(
                'Could not access clipboard automatically.\n\n' +
                'Please paste the block JSON here:'
            );

            if (manualInput && manualInput.trim()) {
                try {
                    const parsed = JSON.parse(manualInput);
                    if (parsed.type && parsed.data) {
                        const components = Livewire.all();
                        const targetComponent = components.find(c =>
                            c.name && (
                                c.name.includes('edit-page') || c.name.includes('create-page') ||
                                c.name.includes('edit-post') || c.name.includes('create-post') ||
                                c.name.includes('edit-event') || c.name.includes('create-event') ||
                                c.name.includes('edit-service') || c.name.includes('create-service')
                            )
                        );
                        if (targetComponent && targetComponent.$wire) {
                            targetComponent.$wire.pasteBlockFromClipboard(manualInput);
                        }
                    } else {
                        alert('Invalid block structure');
                    }
                } catch (e) {
                    alert('Invalid JSON');
                }
            }
        }
    });
});
</script>
