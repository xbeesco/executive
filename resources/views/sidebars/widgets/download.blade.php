<!-- Download / Company Profile Widget -->
@php
    $widgetTitle = $title ?? 'Company profile';
    $pdfFile = $pdf_file ?? null;
    $pdfLabel = $pdf_label ?? 'Download Pdf File';
    $docFile = $doc_file ?? null;
    $docLabel = $doc_label ?? 'Download Word File';
@endphp

<aside class="widget pbmit-download-content">
    <h2 class="widget-title">{{ $widgetTitle }}</h2>
    <div class="textwidget">
        <div class="download">
            @if(!empty($pdfFile))
                <div class="item-download">
                    <a href="{{ asset('storage/' . $pdfFile) }}" target="_blank" rel="noopener noreferrer">
                        <span class="pbmit-download-content">
                            <i class="pbmit-base-icon-pdf-file-format-symbol-1"></i> {{ $pdfLabel }}
                        </span>
                        <span class="pbmit-download-item">
                            <i class="pbminfotech-base-icons pbmit-righticon pbmit-base-icon-download"></i>
                        </span>
                    </a>
                </div>
            @endif

            @if(!empty($docFile))
                <div class="item-download">
                    <a href="{{ asset('storage/' . $docFile) }}" target="_blank" rel="noopener noreferrer">
                        <span class="pbmit-download-content">
                            <i class="pbmit-base-icon-pdf-file-format-symbol-1"></i> {{ $docLabel }}
                        </span>
                        <span class="pbmit-download-item">
                            <i class="pbminfotech-base-icons pbmit-righticon pbmit-base-icon-download"></i>
                        </span>
                    </a>
                </div>
            @endif
        </div>
    </div>
</aside>
<!-- Download / Company Profile Widget End -->
