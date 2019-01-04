@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card mt-3">

                <div class="card-header">
                    <i class="fa fa-shield"></i> Role
                    <div class="btn-group float-right">
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-outline-dark">
                            <i class="fa fa-edit"></i> Edit Role
                        </a>
                        <a href="{{ route('roles.index') }}" class="btn btn-sm btn-outline-dark float-right">
                            <i class="fa fa-list"></i> Role List
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="name"><strong>Role name:</strong></label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" value="{{ $role->name }}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="description"><strong>Description:</strong></label>
                            </div>
                            <div class="col-md">
                                <textarea class="form-control" rows="3" id="description" readonly>{{ $role->description }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="Role permissions"><strong>Permissions:</strong></label>
                            </div>
                            <div class="col-md-3">
                                <ul>
                                    @forelse($role->permissions as $permission)
                                    <li 
                                    class="mouse-default"
                                    data-toggle="tooltip"
                                    title="{{ $permission->description }}">
                                        {{ $permission->name }}
                                    </li>
                                    @empty
                                    
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection