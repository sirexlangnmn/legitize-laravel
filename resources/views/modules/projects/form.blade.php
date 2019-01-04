<div class="row">
    <div class="col-md-12">
        <div class="card">
            {{-- Card header --}}
            <div class="card-header">
                <i class="fa fa-shield"></i>
                    @if(  Route::currentRouteName() == 'projects.create' )
                    Add New Project
                    @endif
                    
                    @if(  Route::currentRouteName() == 'projects.show' )
                    View Project
                    @endif

                    @if(  Route::currentRouteName() == 'projects.edit' )
                    Update Project
                    @endif
                <div class="btn-group float-right">
                    @if( Route::currentRouteName() == 'projects.edit' )
                        <a href="{!! route('projects.show', $project->project_id) !!}" class="btn btn-sm btn-outline-dark"><i class="fa fa-eye"></i> View Project</a>
                        
                        <a href="{!! route('projects.create') !!}" class="btn btn-sm btn-outline-dark">
                        <i class="fa fa-plus"></i> Add Project</a>
                    @endif

                    @if( Route::currentRouteName() == 'projects.show' )
                        <a href="{!! route('projects.edit', $project->project_id) !!}" class="btn btn-sm btn-outline-dark"><i class="fa fa-eye"></i> Edit Project </a>
                        
                        <a href="{!! route('projects.index') !!}" class="btn btn-sm btn-outline-dark">
                        <i class="fa fa-list"></i> Projects List </a>
                    @endif
                    
                    {{-- @if( Route::currentRouteName() !== 'profile.edit' )
                        <a href="{!! route('projects.index') !!}" class="btn btn-sm btn-outline-dark">
                        <i class="fa fa-list"></i> Projects List</a>
                    @endif --}}
                </div>
            </div>

            {{-- Card body --}}
            <div class="card-body">
                @if(Route::currentRouteName() == 'projects.edit')
                    {!! Form::model($project, ['route' => ['projects.update', $project->project_id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
                @endif
                {{-- 
                @if(Route::currentRouteName() == 'profile.edit')
                    {!! Form::model($user, ['route' => ['profile.update', Auth::user()->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
                @endif 
                --}}
                @if(Route::currentRouteName() == 'projects.create')
                    {!! Form::open( ['route' => 'projects.store', 'enctype' => 'multipart/form-data']) !!}
                @endif
               {{--  @if(Route::currentRouteName() == 'projects.show')
                    {!! Form::open( ['route' => 'projects.store', 'enctype' => 'multipart/form-data']) !!}
                @endif --}}
                <div class="row">
                    <div class="col-md-12">
                        {{-- Form Project / insert, edit, view --}}
                        @include('modules.projects.parts.form-project')
                    </div>
                </div>
                @if( Route::currentRouteName() == 'projects.show' )
                    {{-- dapat walang button pag show data. --}}
                @else
                    <button type="submit" class="btn btn-success float-right">Save</button>
                @endif
                
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>