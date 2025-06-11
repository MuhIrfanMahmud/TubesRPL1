{{-- Navigation --}}
@if(!request()->is('login') && !request()->is('register'))
    @include('layouts.navigation')
@endif

{{-- Main Content --}}
<main>
    @yield('content')
</main>

{{-- Footer --}}
@if(!request()->is('login') && !request()->is('register'))
    @include('layouts.footer')
@endif

{{-- Scripts --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Initialize Bootstrap components
    document.addEventListener('DOMContentLoaded', function() {
        // Enable tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    });
</script>
@yield('scripts')
