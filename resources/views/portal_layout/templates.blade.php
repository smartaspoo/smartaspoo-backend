
@if(!isset($hideHeaderFooter) )
    @include('portal_layout.navbar')
@else
    @include('layout.head')    
@endif

@yield('content')

@if(!isset($hideHeaderFooter) )
    @include('portal_layout.footer')
@else
@include('layout.foot')    

@endif
