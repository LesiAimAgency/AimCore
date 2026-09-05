{{-- About Page Template - included as partial by pages/show.blade.php --}}
{{-- DO NOT add @extends here - this file is @include'd, not a standalone view --}}

<!-- Dynamic About Page Content Managed by Widget Builder -->
{!! render_widgets('about_page') !!}

@include('layouts.partials.service-bar')
