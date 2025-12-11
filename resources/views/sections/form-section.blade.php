{{-- Form Section Block --}}
{{-- This block displays a form from the Forms model --}}
{{-- TODO: Implement full form rendering in the future --}}

@php
    $formId = $data['form_id'] ?? null;
    $title = $data['title'] ?? null;
    $description = $data['description'] ?? null;
    
    $form = $formId ? \App\Models\Form::find($formId) : null;
@endphp

@if($form)
<section class="section-lgx">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                @if($title || $description)
                <div class="text-center mb-5">
                    @if($title)
                        <h2 class="pbmit-title">{{ $title }}</h2>
                    @endif
                    @if($description)
                        <p class="pbmit-description mt-3">{{ $description }}</p>
                    @endif
                </div>
                @endif
                
                <div class="pbmit-form-wrapper">
                    {{-- Form placeholder - will be implemented later --}}
                    <div class="alert alert-info text-center">
                        <strong>Form:</strong> {{ $form->title }}
                        <br>
                        <small class="text-muted">Form ID: {{ $form->id }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
