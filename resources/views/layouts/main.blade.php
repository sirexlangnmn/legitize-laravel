<!DOCTYPE html>
<html lang="en">
    @include('includes.head')

    <body>
        <div class="app">
            @if( Route::current()->uri == '/' )

                @include('includes.top-menu')
                @yield('content')
                
            @else
                <div class="wrapper">
                    @include('includes.side-menu')
                    <div id="content">
                        @include('includes.top-menu')
                        <div class="container-fluid">
                            @yield('content')
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </body>
    
    @include('components.toast-message')
    
</html>