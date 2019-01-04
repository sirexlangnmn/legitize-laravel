<nav id="sidebar">
        <div class="sidebar-header">
        <h3><a href="/"><img src="{!! asset('images/logos/logo-full.png') !!}" alt="Legitize Drops" class="logo-full"></a></h3>
        <strong><a href="/"><img src="{!! asset('images/logos/logo.png') !!}" alt="Legitize Drops" class="logo"></a></strong>
    </div>

    <ul class="list-unstyled components">

        <li class="{!! Request::route()->getName()  == 'dashboard' ? 'active' : '' !!}">
            <a href="{!! route('dashboard') !!}" class="dropdown-toggle">
                <i class="fa fa-dashboard"></i> Dashboard
            </a>
        </li>

        <li>
            <a href="#" class="dropdown-toggle">
                <i class="fa fa-star"></i>My Campaigns
            </a>
        </li>

        {{-- <li>
            <a href="#" class="dropdown-toggle">
                <i class="fa fa-skyatlas"></i>My Air Drops
            </a>
        </li> --}}
    </ul>

    <ul class="list-unstyled">
        @if( Auth::user()->hasAnyPermission( ['user-create', 'user-destroy', 'user-show', 'user-edit', 'user-role-assign'] ) )
            <li>
                <a 
                    href="#userSubmenu" 
                    data-toggle="collapse" 
                    aria-expanded="false" 
                    class="dropdown-toggle">
                    <i class="fa fa-user"></i>
                    Users
                </a>

                <ul class="collapse list-unstyled" id="userSubmenu">
                    @can('user-show')
                        <li>
                            <a href="{!! route('users.index') !!}" class="submenu"><i class="fa fa-users"></i> User List</a>
                        </li>
                    @endcan

                    @can('user-create')
                        <li>
                            <a href="{!! route('users.create') !!}" class="submenu"><i class="fa fa-user-plus"></i> Create User</a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endif

        @if( Auth::user()->hasAnyPermission( ['role-create', 'role-edit', 'role-destroy', 'role-show'] ) )
        <li class="{!! Request::route()->getName()  == 'roles.index' ? 'active' : '' !!}">
            <a 
                href="#roleSubmenu" 
                data-toggle="collapse" 
                aria-expanded="false" 
                class="dropdown-toggle">
                <i class="fa fa-shield"></i>
                Roles
            </a>

            <ul class="collapse list-unstyled" id="roleSubmenu">

                @can('role-show')
                    <li>
                        <a href="{!! route('roles.index') !!}" class="submenu"><i class="fa fa-list"></i> Role List</a>
                    </li>
                @endcan

                @can('role-create')
                    <li>
                        <a href="{!! route('roles.create') !!}" class="submenu"><i class="fa fa-plus"></i> Create Role</a>
                    </li>
                @endcan
            </ul>
        </li>
        @endif

        @if( Auth::user()->hasAnyPermission( ['campaign-create', 'campaign-edit', 'campaign-destroy', 'campaign-show'] ) )
        <li class="{!! Request::route()->getName()  == 'campaigns.index' ? 'active' : '' !!}">
            <a 
                href="#projectsSubmenu" 
                data-toggle="collapse" 
                aria-expanded="false" 
                class="dropdown-toggle">
                <i class="fa fa-star"></i>
                Projects
            </a>

            <ul class="collapse list-unstyled" id="projectsSubmenu">

                @can('role-show')
                    <li>
                        <a href="{!! route('projects.index') !!}" class="submenu"><i class="fa fa-list"></i> Projects List</a>
                    </li>
                @endcan

                @can('role-show')
                    <li>
                        <a href="{!! route('clients.index') !!}" class="submenu"><i class="fa fa-list"></i> Client</a>
                    </li>
                @endcan

                @can('role-show')
                    <li>
                        <a href="{!! route('campaigns.create') !!}" class="submenu"><i class="fa fa-list"></i> Project Details</a>
                    </li>
                @endcan
            </ul>
        </li>
        @endif

         @if( Auth::user()->hasAnyPermission( ['campaign-create', 'campaign-edit', 'campaign-destroy', 'campaign-show'] ) )
        <li class="{!! Request::route()->getName()  == 'campaigns.index' ? 'active' : '' !!}">
            <a 
                href="#campaignsSubmenu" 
                data-toggle="collapse" 
                aria-expanded="false" 
                class="dropdown-toggle">
                <i class="fa fa-star"></i>
                Campaigns
            </a>

            <ul class="collapse list-unstyled" id="campaignsSubmenu">

                @can('role-show')
                    <li>
                        <a href="{!! route('campaigns.index') !!}" class="submenu"><i class="fa fa-list"></i> Campaign List</a>
                    </li>
                @endcan

                @can('role-create')
                    <li>
                        <a href="{!! route('campaigns.create') !!}" class="submenu"><i class="fa fa-plus"></i> Create Campaign</a>
                    </li>
                @endcan
            </ul>
        </li>
        @endif
    </ul>

</nav>