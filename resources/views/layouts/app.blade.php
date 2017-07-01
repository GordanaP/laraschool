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
                    <a href="{{ route('threads.create') }}" class="btn btn-warning">
                        Start new thread
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('partials.bottom._scripts')
    @yield('scripts')
</body>

</html>
