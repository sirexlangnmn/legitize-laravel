<!DOCTYPE html>
<html lang="en">
    @include('includes.head')

    <body>
        <div class="app">
            <div class="wrapper">
                <div id="content">
                    @include('includes.top-menu')
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </body>
    
    @include('components.toast-message')
    
</html>