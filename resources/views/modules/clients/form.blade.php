<div class="row">
    <div class="col-md-12">
        <div class="card">
            {{-- Card header --}}
            <div class="card-header">
                <i class="fa fa-shield"></i>
                    @if(  Route::currentRouteName() == 'clients.create' )
                    Add New Client
                    @endif
                    
                    @if(  Route::currentRouteName() == 'clients.show' )
                    View Client
                    @endif

                    @if(  Route::currentRouteName() == 'clients.edit' )
                    Update Client
                    @endif

                <div class="btn-group float-right">
                    @if( Route::currentRouteName() == 'clients.edit' )
                        <a href="{!! route('clients.show', $client->client_id) !!}" class="btn btn-sm btn-outline-dark"><i class="fa fa-eye"></i> View Client</a>
                        
                        <a href="{!! route('clients.create') !!}" class="btn btn-sm btn-outline-dark">
                        <i class="fa fa-plus"></i> Add Client</a>
                    @endif

                    @if( Route::currentRouteName() == 'clients.show' )
                        <a href="{!! route('clients.edit', $client->client_id) !!}" class="btn btn-sm btn-outline-dark"><i class="fa fa-eye"></i> Edit client </a>
                        
                        <a href="{!! route('clients.index') !!}" class="btn btn-sm btn-outline-dark">
                        <i class="fa fa-list"></i> Clients List </a>
                    @endif
                    
                </div>
            </div>

            {{-- Card body --}}
            <div class="card-body">
                @if(Route::currentRouteName() == 'clients.edit')
                    {!! Form::model($client, ['route' => ['clients.update', $client->client_id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
                @endif

                @if(Route::currentRouteName() == 'clients.create')
                    {!! Form::open( ['route' => 'clients.store', 'enctype' => 'multipart/form-data']) !!}
                @endif
               
                <div class="row">
                    <div class="col-md-6">
                        {{-- User avatar/image row --}}
                        @include('modules.clients.parts.form-avatar')
                    </div>
                    <div class="col-md-6">
                        {{-- Form client / insert, edit, view --}}
                        @include('modules.clients.parts.form-client')
                    </div>
                </div>

                @if( Route::currentRouteName() == 'clients.show' )
                    {{-- dapat walang button pag show data. --}}
                @else
                    <button type="submit" class="btn btn-success float-right">Save</button>
                @endif
                
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>