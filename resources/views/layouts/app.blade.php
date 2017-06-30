<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('partials.top._head')
    @yield('links')
</head>

<body>
    <div id="app">
        @include('partials.top._nav')

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @yield('content')
                </div>
                <div class="col-md-4">
                    Sidebar
                </div>
            </div>
        </div>
    </div>

    @include('partials.bottom._scripts')
    @yield('scripts')
</body>

</html>
