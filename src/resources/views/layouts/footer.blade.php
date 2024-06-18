@php
    use \Lexontech\Root\app\Models\Setting;
@endphp
<!-- Footer Start -->
<footer class="footer mt-auto py-3 text-center">
    <div class="container">
        <span class="">
            {{$settings[Setting::CopyRight]['link'] ?? null}}
        </span>
    </div>
</footer>
<!-- Footer End -->
