<div class="row">
    <div class="col-md-8">
        <div class="card mt-3">
            <div class="card-header">
                <i class="fa fa-shield"></i>
                    {{ Route::currentRouteName() == 'roles.edit' ? 'Update role' : 'Create new role' }}
                <a href="{{ route('roles.index') }}" class="btn btn-sm btn-outline-dark float-right">
                    <i class="fa fa-list"></i> Role List
                </a>
            </div>
            <div class="card-body">

                @if(isset($role))
                    {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'put']) !!}
                @else
                    {!! Form::open( ['route' => 'roles.store'] ) !!}
                @endif
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="role" class="col-form-label text-md-right">Role Name</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-shield"></i></span>
                                </div>

                                <input 
                                    id="role" 
                                    type="text" 
                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                    name="name" 
                                    value="{{ old('name', isset($role->name) ? $role->name : '') }}" 
                                    placeholder="Type role name" 
                                    required 
                                    autofocus
                                />
                                
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="role" class="col-form-label text-md-right">Role Permissions</label>
                            <div class="row">
                                <div class="container">

                                    <select 
                                        class="selectpicker form-control{{ $errors->has('permission') ? ' is-invalid' : '' }}" 
                                        multiple data-live-search="true" 
                                        title="Choose role permissions" 
                                        data-selected-text-format="count > 3"
                                        show-menu-arrow
                                        name="permission[]"
                                    />
                                        @foreach($permissions as $permission)
                                            <option value="{{ $permission }}"
                                                @if(Request::route()->getName() == 'roles.edit')
                                                {{ in_array( $permission , $role->permissions->pluck('name')->toArray()) ? 'selected' : '' }}
                                                @endif>
                                                {{ $permission }}</option>
                                        @endforeach

                                    </select>

                                    @if ($errors->has('permission'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('permission') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="container">
                        <div class="form-group">
                            <label for="comment">Description:</label>
                            <textarea class="form-control" rows="3" id="description" name="description">{{ old('description', isset($role->description) ? $role->description : '') }}</textarea>

                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="container">
                        <button class="btn btn-success float-right btn-sm" type="submit"><i class="fa fa-save mr-1"></i> Save</button>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">

    </div>
</div>

