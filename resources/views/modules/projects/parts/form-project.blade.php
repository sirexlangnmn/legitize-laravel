<h5 class="mt-3">Project Registration</h5>
<div class="row">
    @csrf
    {{-- Project Title --}}
    <div class="col-md-6">
        <div class="form-group">
            <label for="project_title" class="col-form-label text-md-right">Project Title</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input 
                    type="text" 
                    class="form-control{!! $errors->has('project_title') ? ' is-invalid' : '' !!}" 
                    name="project_title" 
                    value="{!! old('project_title', isset($project->project_title) ? $project->project_title : '') !!}" 
                    {!! (Route::currentRouteName() == 'projects.show' ? 'disabled' : '' ) !!}
                    placeholder="Type project title" 
                    required 
                    autofocus
                    />
                @if ($errors->has('project_title'))
                <span class="invalid-feedback" role="alert">
                <strong>{!! $errors->first('project_title') !!}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    {{-- Website --}}
    <div class="col-md-6">
        <div class="form-group">
            <label for="website" class="col-form-label text-md-right">Website</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input 
                    type="text" 
                    class="form-control{!! $errors->has('website') ? ' is-invalid' : '' !!}" 
                    name="website" 
                    value="{!! old('website', isset($project->website) ? $project->website : '') !!}"
                    {!! (Route::currentRouteName() == 'projects.show' ? 'disabled' : '' ) !!} 
                    placeholder="Type Website" 
                    required 
                    autofocus
                    />
                @if ($errors->has('website'))
                <span class="invalid-feedback" role="alert">
                <strong>{!! $errors->first('website') !!}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    {{-- Email --}}
    <div class="col-md-6">
        <div class="form-group">
            <label for="email" class="col-form-label text-md-right">Email</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input 
                    type="email" 
                    class="form-control{!! $errors->has('email') ? ' is-invalid' : '' !!}" 
                    name="email" 
                    value="{!! old('email', isset($project->email) ? $project->email : '') !!}"
                    {!! (Route::currentRouteName() == 'projects.show' ? 'disabled' : '' ) !!} 
                    placeholder="Type Email" 
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
    {{-- Telegram --}}
    <div class="col-md-6">
        <div class="form-group">
            <label for="telegram" class="col-form-label text-md-right">Telegram</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input 
                    type="text" 
                    class="form-control{!! $errors->has('telegram') ? ' is-invalid' : '' !!}" 
                    name="telegram" 
                    value="{!! old('telegram', isset($project->telegram) ? $project->telegram : '') !!}"
                    {!! (Route::currentRouteName() == 'projects.show' ? 'disabled' : '' ) !!}
                    placeholder="Type Telegram" 
                    required 
                    autofocus
                    />
                @if ($errors->has('telegram'))
                <span class="invalid-feedback" role="alert">
                <strong>{!! $errors->first('telegram') !!}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    {{-- Note --}}
    <div class="col-md-6">
        <div class="form-group">
            <label for="note" class="col-form-label text-md-right">Note</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <textarea
                    type="text" 
                    class="form-control{!! $errors->has('note') ? ' is-invalid' : '' !!}" 
                    name="note" 
                    value="{!! old('note', isset($project->note) ? $project->note : '') !!}" 
                    {!! (Route::currentRouteName() == 'projects.show' ? 'disabled' : '' ) !!}
                    placeholder="Type Note" 
                    required 
                    autofocus>{!! old('note', isset($project->note) ? $project->note : '') !!}
                </textarea>
                @if ($errors->has('note'))
                <span class="invalid-feedback" role="alert">
                <strong>{!! $errors->first('note') !!}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
</div>