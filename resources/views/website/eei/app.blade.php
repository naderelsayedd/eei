<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('website.eei.partial.head')
<body style="overflow-y: auto;">
    @include('website.eei.partial.header')
    {{-- @include('website.' . config('dashboard.theme_name') . '.layouts.preload') --}}

    @yield('content')
    @include('website.eei.partial.contact-form')
    <!-- footer  -->
    @include('website.eei.partial.footer')
    <div class="black-bar" id="blackBar"></div>

    @include('website.eei.partial.scripts')
</body>

</html>
