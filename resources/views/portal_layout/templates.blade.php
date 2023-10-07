@if (request()->header('X-Partial-Content') == true)
    @yield('content')
@else
    @if (!isset($hideHeaderFooter))
        @include('portal_layout.navbar')
    @else
        @include('layout.head')
    @endif

    <body>
        <div id="root-content" style="min-height: 100vh; padding-top:50px; margin-bottom:100px">
            @yield('content')
        </div>
        @if (!isset($hideHeaderFooter))
            @include('portal_layout.footer')
        @endif

    </body>
    @include('layout.foot')
@endif
