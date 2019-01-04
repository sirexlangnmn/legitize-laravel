<h5 class="mt-3">Client Registration</h5>
<div class="row">
    @csrf
    {{-- Project Title --}}
    <div class="col-md-6">
        <div class="form-group">
            <label for="role" class="col-form-label text-md-right">Project Title</label>
            <div class="row">
                <div class="container">
                    <select 
                        class="selectpicker form-control{!! $errors->has('project_title') ? ' is-invalid' : '' !!}" 
                        title="Choose Project Title" 
                        show-menu-arrow
                        name="project_id"
                        required
                    />
                    @foreach( $projects as $key => $project)
                        <option value="{!! $project->project_id !!}">
                            {!! $project->project_title !!}
                        </option>
                    @endforeach

                    </select>

                    @if ($errors->has('project_title'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{!! $errors->first('project_title') !!}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- client_firstname --}}
    <div class="col-md-6">
        <div class="form-group">
            <label for="client_firstname" class="col-form-label text-md-right">Firstname</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input 
                    type="text" 
                    class="form-control{!! $errors->has('client_firstname') ? ' is-invalid' : '' !!}" 
                    name="client_firstname" 
                    value="{!! old('client_firstname', isset($clients->client_firstname) ? $clients->client_firstname : '') !!}"
                    {!! (Route::currentRouteName() == 'clients.show' ? 'disabled' : '' ) !!} 
                    placeholder="Type Firstname" 
                    required 
                    autofocus
                    />
                @if ($errors->has('client_firstname'))
                <span class="invalid-feedback" project_title="alert">
                <strong>{!! $errors->first('client_firstname') !!}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>

    {{-- client_lastname --}}
    <div class="col-md-6">
        <div class="form-group">
            <label for="client_lastname" class="col-form-label text-md-right">Lastname</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input 
                    type="text" 
                    class="form-control{!! $errors->has('client_lastname') ? ' is-invalid' : '' !!}" 
                    name="client_lastname" 
                    value="{!! old('client_lastname', isset($clients->client_lastname) ? $clients->client_lastname : '') !!}"
                    {!! (Route::currentRouteName() == 'clients.show' ? 'disabled' : '' ) !!} 
                    placeholder="Type Lastname" 
                    required 
                    autofocus
                    />
                @if ($errors->has('client_lastname'))
                <span class="invalid-feedback" project_title="alert">
                <strong>{!! $errors->last('client_lastname') !!}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>

    {{-- client_middlename --}}
    <div class="col-md-6">
        <div class="form-group">
            <label for="client_middlename" class="col-form-label text-md-right">Middlename</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input 
                    type="text" 
                    class="form-control{!! $errors->has('client_middlename') ? ' is-invalid' : '' !!}" 
                    name="client_middlename" 
                    value="{!! old('client_middlename', isset($clients->client_middlename) ? $clients->client_middlename : '') !!}"
                    {!! (Route::currentRouteName() == 'clients.show' ? 'disabled' : '' ) !!} 
                    placeholder="Type Middlename" 
                    required 
                    autofocus
                    />
                @if ($errors->has('client_middlename'))
                <span class="invalid-feedback" project_title="alert">
                <strong>{!! $errors->middle('client_middlename') !!}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>

</div>