<nav class="navbar navbar-expand-md navbar-dark bg-dark {!! Route::current()->uri == '/' ? 'remove-mb' : '' !!}">
        <div class="container-fluid">

            
            @if( Route::current()->uri == '/' )
                <img src="{{ asset('images/logos/logo-full.png') }}" alt="Legitize Drops" class="logo-full">
            @else
                <i class="fa fa-align-left text-white ml-0 mouse-pointer" id="sidebarCollapse"></i>
            @endif

            <button 
                class="navbar-toggler ml-auto" 
                type="button" 
                data-toggle="collapse" 
                data-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" 
                aria-expanded="false" 
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a 
                                id="dropdown-alerts" 
                                class="nav-link divider dropdown-toggle"
                                data-toggle="dropdown" 
                                aria-haspopup="true" 
                                aria-expanded="false"  
                                href="">
                                <span class="fa fa-bell mt-1"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <ul class="pl-0">
                                    <a href="" class="a-notification-dropdown">
                                        <li class="dropdown-item user-menu">
                                            <div>
                                                <i class="fa fa-star fa-fw"></i> New Campaign
                                                <span class="pull-right text-muted small ml-4">4 minutes ago</span>
                                            </div>
                                        </li>
                                    </a>
                                    <a href="" class="a-notification-dropdown">
                                        <li class="dropdown-item user-menu">
                                            <div>
                                                <i class="fa fa-comment fa-fw"></i> New Comment
                                                <span class="pull-right text-muted small ml-4">4 minutes ago</span>
                                            </div>
                                        </li>

                                        <li class="dropdown-item user-menu text-center mb-0 pb-0">
                                            <div>
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </div>
                                        </li>
                                    </a>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item dropdown">

                            <a 
                                id="navbarDropdown" 
                                class="nav-link dropdown-toggle" 
                                href="#" role="button" 
                                data-toggle="dropdown" 
                                aria-haspopup="true" 
                                aria-expanded="false" 
                                v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                
                                <a href="{!! route('profile', Auth()->user()->username !== null ? Auth()->user()->username : Auth()->user()->id) !!}" class="dropdown-item user-menu">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <div class="user-avatar-list-parent text-center" id="top-menu-carret-avatar">
                                                    <div class="user-avatar-top-menu-frame">
                                                        <div 
                                                            class="user-avatar" 
                                                            style="background-image: url(
                                                            {!! Auth()->user()->avatar !== null ? asset('images/' . Auth()->user()->avatar) : asset('images/default.jpg') !!} );">
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="text-dark">{!! Auth()->user()->name !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="{{ route('dashboard') }}" class="dropdown-item user-menu">
                                    <div class="row">
                                        <div class="col-md-1"><span class="fa fa-dashboard mr-2"></span></div>
                                        <div class="col-md-6 pl-2">Dashboard</div>
                                    </div>
                                </a>

                                <hr class="mb-1 mt-0">
                                
                                <a href="/" class="dropdown-item user-menu">
                                    <div class="row">
                                        <div class="col-md-1"><span class="fa fa-star mr-2"></span></div>
                                        <div class="col-md-6 pl-2">My Campaigns</div>
                                    </div>
                                </a>
                                {{-- <a href="/" class="dropdown-item user-menu">
                                    <div class="row">
                                        <div class="col-md-1"><span class="fa fa-skyatlas mr-2"></span></div>
                                        <div class="col-md-6 pl-2">My Airdrops</div>
                                    </div>
                                </a>
                                <a href="/" class="dropdown-item user-menu">
                                    <div class="row">
                                        <div class="col-md-1"><span class="fa fa-bar-chart mr-2"></span></div>
                                        <div class="col-md-6 pl-2">Referrals</div>
                                    </div>
                                </a> --}}
                                <hr class="mb-0 mt-0">
                                <a href="/" class="dropdown-item user-menu mt-2">
                                    <div class="row">
                                        <div class="col-md-1"><span class="fa fa-cogs mr-2"></span></div>
                                        <div class="col-md-6 pl-2">Settings</div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <div class="row">
                                        <div class="col-md-1"><span class="fa fa-sign-out mr-2"></span></div>
                                        <div class="col-md-6 pl-2">Logout</div>
                                    </div>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>