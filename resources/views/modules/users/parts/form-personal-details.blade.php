<h5 class="mt-3">Personal Details</h5>
<div class="row">
    {{-- User Name --}}
    <div class="col-md-6">
        <div class="form-group">
            <label for="name" class="col-form-label text-md-right">Name</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input 
                    type="text" 
                    class="form-control{!! $errors->has('name') ? ' is-invalid' : '' !!}" 
                    name="name" 
                    value="{!! old('name', isset($user->name) ? $user->name : '') !!}" 
                    placeholder="Type name" 
                    required 
                    autofocus
                    />
                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                <strong>{!! $errors->first('name') !!}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    {{-- User username --}}
    <div class="col-md-6">
        <div class="form-group">
            <label for="username" class="col-form-label text-md-right">Username</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input 
                    type="text" 
                    class="form-control{!! $errors->has('username') ? ' is-invalid' : '' !!}" 
                    name="username" 
                    value="{!! old('username', isset($user->username) ? $user->username : '') !!}" 
                    placeholder="Type username"
                    autofocus
                    />
                @if ($errors->has('username'))
                <span class="invalid-feedback" role="alert">
                <strong>{!! $errors->first('username') !!}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="username" class="col-form-label text-md-right">Email</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><strong>@</strong></span>
                </div>
                <input 
                    type="email" 
                    class="form-control{!! $errors->has('email') ? ' is-invalid' : '' !!}" 
                    name="email" 
                    value="{!! old('email', isset($user  ->email) ? $user  ->email : '') !!}" 
                    placeholder="Type email" 
                    required 
                    autofocus
                    />
                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                <strong>{!! $errors->first('email') !!}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    {{-- User roles --}}
    <div class="col-md-6">
        <div class="form-group">
            <label for="role" class="col-form-label text-md-right">Role</label>
            <div class="row">
                <div class="container">
                    <select 
                        class="selectpicker form-control{!! $errors->has('role') ? ' is-invalid' : '' !!}" 
                        multiple data-live-search="true" 
                        title="Choose role" 
                        data-selected-text-format="count > 2"
                        show-menu-arrow
                        name="role[]"
                        required
                        />
                    @foreach( $roles as $key => $role)
                    <option value="{!! $role->name !!}"
                    @if(Request::route()->getName() !== 'users.create')
                    {!! in_array( $role->name , $user->getRoleNames()->toArray() ) ? 'selected' : '' !!}
                    @endif>
                    {!! $role->name !!}
                    </option>
                    @endforeach
                    </select>
                    @if ($errors->has('role'))
                    <span class="invalid-feedback" role="alert">
                    <strong>{!! $errors->first('role') !!}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{-- User password --}}
    @if(Route::currentRouteName() !== 'users.create')
    <div class="col-md-12">
        <div id="accordion" class="mt-3">
            <div class="card">
                <div class="card-header">
                    <a class="card-link text-decoration-none text-dark" data-toggle="collapse" data-parent="#accordion" href="#userPassword">
                    Password
                    <i class="fa fa-plus float-right mt-1"></i>
                    </a>
                </div>
                <div id="userPassword" class="collapse">
                    <div class="card-body">
                        <div class="alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <i class="fa fa-info-circle"></i>
                            <strong>Info</strong> If you don't want to update password. Leave it blank.
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="col-form-label text-md-right">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-key"></i></span>
                                        </div>
                                        <input 
                                            type="password" 
                                            class="form-control{!! $errors->has('password') ? ' is-invalid' : '' !!}" 
                                            name="password" 
                                            placeholder="Type password"  
                                            autofocus
                                            />
                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{!! $errors->first('password') !!}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Confirm Password" class="col-form-label text-md-right">Confirm Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-repeat"></i></span>
                                        </div>
                                        <input 
                                            type="password" 
                                            class="form-control" 
                                            name="password_confirmation" 
                                            placeholder="Confirm Password"  
                                            autofocus
                                            />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="col-md-6">
        <div class="form-group">
            <label for="password" class="col-form-label text-md-right">password</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                </div>
                <input 
                    type="password" 
                    class="form-control{!! $errors->has('password') ? ' is-invalid' : '' !!}" 
                    name="password" 
                    placeholder="Type password"  
                    autofocus
                    />
                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                <strong>{!! $errors->first('password') !!}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="Confirm Password" class="col-form-label text-md-right">Confirm Password</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-repeat"></i></span>
                </div>
                <input 
                    type="password" 
                    class="form-control" 
                    name="password_confirmation" 
                    placeholder="Confirm Password"  
                    autofocus
                    />
            </div>
        </div>
    </div>
    @endif
    <div class="col-md-6"></div>
    <div class="col-md-6"></div>
    <div class="col-md-6"></div>
</div>