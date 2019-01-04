<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-users"></i> Users
                <a href="{{ route('users.create') }}" class="btn btn-outline-dark btn-sm float-right">
                    <i class="fa fa-plus"></i> Add User
                </a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-sm data-table" id="users-table" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Roles</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Remarks</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse( $users as $user )
                            <tr>
                                <td>
                                    <div class="user-avatar-list-parent text-center">
                                        <div class="user-avatar-list-frame">
                                            <div 
                                                class="user-avatar" 
                                                style="background-image: url(
                                                {!! $user->avatar !== null ? asset('images/' . $user->avatar) : asset('images/default.jpg') !!} );">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center pt-3 pb-3">{!! $user->name !!}</td>
                                <td class="text-center pt-3 pb-3">{!! $user->email !!}</td>
                                <td class="text-center pt-3 pb-3">
                                    @forelse($user->getRoleNames() as $key => $role_name)
                                    <span class="badge badge-{{ $role_name == 'super-admin' ? 'primary' : $role_name == 'admin' ? 'success' : 'secondary' }} mouse-default">{!! $role_name !!}</span>
                                    @empty
                                    @endforelse
                                </td>
                                <td class="text-center pt-3 pb-3">{!! ucfirst($user->status) !!}
                                <td class="text-center pt-3 pb-3">{!! 'Excellent' !!}</td>
                                <td class="text-center pt-3 pb-3">
                                    <div class="btn-group btn-group-sm">
                                        <a 
                                            href="{{ route('users.show', $user->id) }}"
                                            class="btn btn-secondary text-white">
                                            <i class="fa fa-eye"></i> View
                                        </a>
    
                                        <a 
                                            href="{{ route('users.edit', $user->id) }}" 
                                            class="btn btn-secondary">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>

                                        <button 
                                            type="button" 
                                            class="btn btn-warning btn-secondary text-white"
                                            data-toggle="modal" data-target="#delete-user-id-{{ $user->id }}">
                                            <i class="fa fa-remove"></i> Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal fade" id="delete-user-id-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="delete-user-id-{{ $user->id }}Title" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="delete-user-id-{{ $user->id }}Title">
                                                <i class="fa fa-info-circle"></i> Are you sure you want to delete this user?
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <strong>Name:</strong> {!! $user->name !!}<br>
                                            <strong>Roles:</strong>
                                            @forelse($user->getRoleNames() as $key => $role_name)
                                                <span class="badge badge-{{ $role_name == 'super-admin' ? 'primary' : $role_name == 'admin' ? 'success' : 'secondary' }} mouse-default">{!! $role_name !!}</span>
                                            @empty
                                                <p>None</p>
                                            @endforelse
                                            <br>
                                            <strong>Status:</strong> {!! ucfirst($user->status) !!} <br>
                                            <strong>Remarks:</strong>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-ban"></i> No</button>
                                            <form action="{{ route('users.destroy',  $user->id ) }}" method="post">
                                                
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
                        @empty
    
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>