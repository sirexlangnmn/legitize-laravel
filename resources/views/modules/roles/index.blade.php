@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-shield"></i> Roles
                    <a href="{{ route('roles.create') }}" class="btn btn-outline-dark btn-sm float-right">
                        <i class="fa fa-plus"></i> Add Role 
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-sm display data-table" id="roles-table" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Role Name</th>
                                <th class="text-center">Total Users</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $role_permissions as $role)
                                <tr>
                                    <td class="text-center">{{ $role['role_id'] }}</td>
                                    <td class="text-center">
                                        <a 
                                            href="#" 
                                            data-toggle="popover" 
                                            title="{{ $role['role_name'] }}" 
                                            data-content="{{ $role['description'] }}"
                                            data-trigger="hover"
                                            class="info text-dark text-decoration-none">
                                            {{ $role['role_name'] }}
                                        </a>
                                    </td>
                                    <td class="text-center">{{ $role['total_users'] }}</td>

                                    <td class="text-center">
                                    <div class="text-center">
                                            <div class="btn-group">
                                        <a class="btn btn-secondary btn-sm text-white" href="{{ route('roles.show',$role['role_id']) }}">
                                            <i class="fa fa-eye"></i> View
                                        </a>

                                        <a class="btn btn-secondary btn-sm text-white
                                        {{ $edit = $role['role_name'] == 'super-admin' || $role['role_name'] == 'admin' ? 'disabled' : '' }}" href="{{ route('roles.edit', $role['role_id']) }}">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>     
                                        <a 
                                            class="btn btn-warning btn-sm text-white 
                                            {{ $role['role_name'] == 'super-admin' || $role['role_name'] == 'admin' ? 'disabled' : '' }}"

                                            data-toggle="modal" data-target="#delete-role-id-{{ $role['role_name'] == 'super-admin' || $role['role_name'] == 'admin' ? 'disabled' :  $role['role_id'] }}"
                                        >
                                            <i class="fa fa-trash"></i> Delete
                                        </a> 
                                            </div>
                                    </div>           
                                    </td>
                                </tr>

                            <!-- Modal -->
                                <div class="modal fade" id="delete-role-id-{{ $role['role_id'] }}" tabindex="-1" role="dialog" aria-labelledby="delete-role-id-{{ $role['role_id'] }}Title" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="delete-role-id-{{ $role['role_id'] }}Title">
                                                    <i class="fa fa-info-circle"></i> Are you sure you want to delete this role?
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <strong>Role id:</strong> {{ $role['role_id'] }}
                                                </br>
                                                
                                                <strong>Role name:</strong> {{ $role['role_name'] }}
                                                <br>

                                                <strong>Role total permissions:</strong>
                                                    <span 
                                                        data-toggle="tooltip" 
                                                        data-placement="top" 
                                                        title="
                                                        @foreach( $role['permissions'] as $permission )
                                                            {{$permission}} 
                                                        @endforeach">
                                                        {{ count($role['permissions']) }}
                                                    </span>
                                                <br>

                                                <strong>Role description:</strong> {{ $role['description'] }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-ban"></i> No</button>
                                                <form action="{{ route('roles.destroy',  $role['role_id'] ) }}" method="post">
                                                    
                                                    @csrf
                                                    @method("DELETE")
                                                    
                                                    <button     
                                                        type="submit" 
                                                        class="btn btn-danger" 
                                                        data-toggle="tooltip" 
                                                        data-placement="bottom"
                                                        title="Deleting this role will affect other users on this role. do you want to proceed?">
                                                        <i class="fa fa-trash"></i> Yes! Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="delete-role-id-disabled">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                    
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Forbidden</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                    
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            This role is can't be modefied nor deleted. 
                                        </div>
                                    
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    
                                        </div>
                                    </div>
                                </div>
                            <!-- End Modal -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">

                <div class="card-header">
                   <i class="fa fa-users"></i> Previledge Users
                    <a href="{{ route('users.index') }}" class="btn btn-outline-dark btn-sm float-right">
                        <i class="fa fa-users pr-1"></i> View All Users
                    </a>
                </div>

                <div class="card-body">
                    <strong>Current user:</strong> 
            
                    <div class="row">
                        <div class="col-md-4 offset-4">                            
                            <div class="user-avatar-list-parent text-center">
                                <div class="user-role-avatar-list-frame">
                                    <div 
                                        class="user-avatar" 
                                        style="background-image: url(
                                        {!! Auth::user()->avatar !== null ? asset('images/' . Auth::user()->avatar) : asset('images/default.jpg') !!} );">
                                    </div>
                                </div>
                            </div>
                            <p><strong>{{ Auth::user()->name }}</strong></p>
                        </div>
                    </div>

                    <div class="text-center">
                            @forelse( Auth::user()->getRoleNames() as $role_name)
                            <span class="badge badge-dark mouse-default">{{ $role_name }}</span>
                        @empty
                        
                        @endforelse
                    </div>

                    <div class="pt-4">
                        <table class="table table-sm table-striped data-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>User name</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse( $admin_users as $admin_user )
                                    <tr>
                                        <td>
                                            <div class="user-avatar-list-parent text-center">
                                                <div class="user-avatar-list-frame">
                                                    <div 
                                                        class="user-avatar" 
                                                        style="background-image: url(
                                                        {!! $admin_user->avatar !== null ? asset('images/' . $admin_user->avatar) : asset('images/default.jpg') !!} );">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="pt-3">{{ $admin_user->name }}</td>
                                        <td class="pt-3">
                                            @forelse($admin_user->getRoleNames() as $role_name)
                                                <span class="badge badge-dark mouse-default">{{ $role_name }}</span>
                                            @empty
    
                                            @endforelse
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center">No admin users</td>
                                    </tr>
                            </tbody>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
