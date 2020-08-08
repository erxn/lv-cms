@include('partials.header')

<section class="pt-0">
    <div class="mt-4">
        <div class="container">
            <div class="row">
                @yield('content')

                @include('partials.sidebar')
            </div>
        </div>
</section>

@include('partials.footer')