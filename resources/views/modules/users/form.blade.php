<div class="row">
    <div class="col-md-12">
        <div class="card">

            {{-- Card header --}}
            <div class="card-header">

                <i class="fa fa-shield"></i>
                {{-- {!! Route::currentRouteName() == 'users.edit' ? 'Update user' : 'Create new user' !!} --}}

                @if(  Route::currentRouteName() == 'users.create' )
                    Create new user
                @endif

                @if(  Route::currentRouteName() == 'users.edit' )
                    Update user
                @else
                    Update profile
                @endif


                <div class="btn-group float-right">
                    @if( Route::currentRouteName() == 'users.edit' )
                        <a href="{!! route('users.show', $user->id) !!}" class="btn btn-sm btn-outline-dark">
                            <i class="fa fa-eye"></i> View User
                        </a>
                        <a href="{!! route('users.create') !!}" class="btn btn-sm btn-outline-dark">
                            <i class="fa fa-plus"></i> Add User
                        </a>
                    @endif


                    @if( Route::currentRouteName() !== 'profile.edit' )
                        <a href="{!! route('users.index') !!}" class="btn btn-sm btn-outline-dark">
                            <i class="fa fa-list"></i> Users List
                        </a>
                    @endif

                </div>

            </div>

            {{-- Card body --}}
            <div class="card-body">

                @if(Route::currentRouteName() == 'users.edit')
                    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
                @endif

                @if(Route::currentRouteName() == 'profile.edit')
                    {!! Form::model($user, ['route' => ['profile.update', Auth::user()->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
                @endif

                @if(Route::currentRouteName() == 'users.create')
                    {!! Form::open( ['route' => 'users.store', 'enctype' => 'multipart/form-data'] ) !!}
                @endif

                <div class="row">
                    <div class="col-md-6">
                        {{-- User avatar row --}}
                        @include('modules.users.parts.form-avatar')
                    </div>
                    <div class="col-md-6">
                        {{-- Personal detail row --}}
                        @include('modules.users.parts.form-personal-details')
                    </div>
                </div>
                
                <hr>
                {{-- Social media row --}}
                @include('modules.users.parts.form-social-medias')
                
                <hr>
                {{-- Wallet info row --}}
                @include('modules.users.parts.form-crypto-wallets')

                <button type="submit" class="btn btn-success float-right">Save</button>

            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>