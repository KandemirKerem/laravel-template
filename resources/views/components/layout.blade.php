
<!-- Head Section -->
<x-templates.head>

    <x-slot:title>
        {{ $title ?? 'Welcome' }}
    </x-slot:title>


</x-templates.head>

<!-- Navbar -->
<x-templates.navbar/>

<!-- Main Content -->
{{ $slot }}


@props([
    'hidefooter' => false,
])

<!-- Footer -->
@if ( !($hidefooter ?? false) )
    <x-templates.footer/>
@endif

