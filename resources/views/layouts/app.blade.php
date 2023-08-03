@include('partials.head')

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        @include('partials.navbar')
        @yield('container')

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
        @include('partials.footer')
    </div>
    @include('partials.js')
    <!-- <script src="{{url('dist/js/demo.js')}}"></script> -->
</body>

</html>