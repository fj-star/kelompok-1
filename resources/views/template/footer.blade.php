<div class="card">
    <div class="card-body">
        <footer class="bg-light text-center py-3 mt-auto">
            <p class="mb-0 text-muted">&copy; 2025 Mass deng</p>
        </footer>

    </div>
</div>

<!-- Scroll to Top Button-->

<!-- JavaScript -->
@include('template.scripts')

@stack('scripts')

@push('scripts')
<script>
    console.log('Script halaman khusus');
</script>
@endpush
