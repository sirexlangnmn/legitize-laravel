@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-user"></i> User
                    <div class="btn-group float-right">
                        @if( Route::currentRouteName() == 'profile' )
                            <a href="{!! Auth::user()->username  == !null ? route('profile.edit', Auth::user()->username) : route('profile.edit', Auth::user()->id) !!}" class="btn btn-sm btn-outline-dark">
                                <i class="fa fa-edit"></i> Edit Your Profile
                            </a>
                        @else
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-dark">
                                <i class="fa fa-edit"></i> Edit User
                            </a>
                            <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-dark float-right">
                                <i class="fa fa-list"></i> User List
                            </a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="avatar-upload">
                                <div class="avatar-preview">
                                    <div 
                                        id="imagePreview" 
                                        style="background-image: url(
                                            {{ $user->avatar !== null ? asset('images/' . $user->avatar) : asset('images/default.jpg') }}
                                        );">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-center">
                                {!! $user->name !!}
                            </h4>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link text-dark active" id="details-tab" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="true"> <i class="fa fa-info-circle"></i> Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" id="social-tab" data-toggle="tab" href="#social" role="tab" aria-controls="social" aria-selected="false"> <i class="fa fa-plug"></i> Social</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" id="wallet-tab" data-toggle="tab" href="#wallet" role="tab" aria-controls="wallet" aria-selected="false"> <i class="fa fa-money"></i> Wallet</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                                    <div class="card user-view-nav">
                                        <div class="card-body">
                                            <div>
                                                <i class="fa fa-user"></i> <strong>Username:</strong> {!! $user->username !!}
                                            </div>
                                            <div>
                                                <i class="fa fa-envelope"></i> <strong>Email:</strong> {!! $user->email !!}
                                            </div>
                                            <div>
                                                <i class="fa fa-calendar"></i> <strong>Joined On:</strong> {!! $user->created_at !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">
                                    <div class="card user-view-nav">
                                        <div class="card-body">
                                            @if( !empty( $medias ) )
                                                <div class="row">
                                                    <div class="col-md-12 mb-2">
                                                        <h5>You have {!! count( $medias ) !!} social medias in total.</h5>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="row">
                                                @forelse( $medias as $platform => $key )
                                                    <div class="col-md-4">
                                                        <div id="accordion">
                                                            <div class="card mt-1">
                                                                <div class="card-header {!! $platform !!} text-white">
                                                                    <a 
                                                                    class="card-link text-decoration-none text-white" 
                                                                    data-toggle="collapse" 
                                                                    data-parent="#accordion" 
                                                                    href=".accordion-platform-{!! $platform !!}">
                                            
                                                                        @if( $platform == 'bitcointalks' || $platform == 'altcointalks' )
                                                                            <i class="fa fa-bitcoin float-left mt-1 mr-2"></i>
                                                                        @else
                                                                            <i class="fa fa-{!! $platform !!} float-left mt-1 mr-2"></i>
                                                                        @endif
                                                                        {!! ucfirst($platform) !!}
                                                                    </a>
                                                                </div>
                                            
                                                                <div class="collapse accordion-platform-{!! $platform !!}">
                                                                    <div class="card-body">
                                                                        <i class="fa fa-bitcoin"></i> Platform: <strong>{!! $platform !!}</strong> <br>
                                                                        <i class="fa fa-key"></i> Key: <strong>{!! $key !!}</strong>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="col-md-12">
                                                        <div class="text-center">
                                                            <i class="fa fa-plug font-size-70px mb-2 bg-gray"></i>
                                                            <h4>
                                                                No social media registered.
                                                            </h4>
                                                        </div>
                                                    </div>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="wallet" role="tabpanel" aria-labelledby="wallet-tab">
                                    <div class="card user-view-nav">
                                        <div class="card-body">
                                            @if( !empty( $medias ) )
                                                <div class="row">
                                                    <div class="col-md-12 mb-2">
                                                        <h5>You have {!! count( $medias ) !!} wallets in total.</h5>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="row">
                                                @forelse( $wallets as $platform => $key )
                                                    <div class="col-md-4">
                                                        <div id="accordion">
                                                            <div class="card mt-1">
                                                                <div class="card-header bg-dark text-white">
                                                                    <a 
                                                                    class="card-link text-decoration-none text-white" 
                                                                    data-toggle="collapse" 
                                                                    data-parent="#accordion" 
                                                                    href=".accordion-platform-{!! $platform !!}">
                                            
                                                                        @if( $platform == 'bitcointalks' || $platform == 'altcointalks' )
                                                                            <i class="fa fa-bitcoin float-left mt-1 mr-2"></i>
                                                                        @else
                                                                            <i class="fa fa-{!! $platform !!} float-left mt-1 mr-2"></i>
                                                                        @endif
                                                                        {!! ucfirst($platform) !!}
                                                                    </a>
                                                                </div>
                                            
                                                                <div class="collapse accordion-platform-{!! $platform !!}">
                                                                    <div class="card-body">
                                                                        <i class="fa fa-bitcoin"></i> Platform: <strong>{!! $platform !!}</strong> <br>
                                                                        <i class="fa fa-key"></i> Key: <strong>{!! $key !!}</strong>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="col-md-12">
                                                        <div class="text-center">
                                                        <i class="fa fa-money font-size-70px mb-2 bg-gray"></i>
                                                            <h4>
                                                                No crypto wallet registered.
                                                            </h4>
                                                        </div>
                                                    </div>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
@endsection