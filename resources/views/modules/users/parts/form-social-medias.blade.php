<h5 class="mt-3">Social Media Details</h5>
<div class="row mt-3" id="smp-social-detail-div">


    @if( Request::route()->getName() == 'users.edit' ) 

        @forelse( $medias as $platform => $link )

            <div class="col-md-3 mt-3 smp smp-facebook">
                <div id="accordion">
                    <div class="card">

                        <div class="card-header {!! $platform !!}">
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
                            
                            <i 
                            class="fa fa-remove float-right mt-1" 
                            id="edit-remove-platform" 
                            data-toggle="modal" 
                            data-target="#remove-{!! $platform !!}" 
                            data-platform="{!! $platform !!}">
                            </i>

                            <div class="modal fade" id="remove-{!! $platform !!}" tabindex="-1" role="dialog" aria-labelledby="removeMMedia" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-dark" id="removeMMedia">Remove Social Media:
                                                <span class="badge badge-primary pt-2 pb-2 {!! $platform !!}"> 
                                                    <span class="fa fa-{!! $platform !!}"></span> 
                                                    {!! ucfirst( $platform  )!!} 
                                                </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-dark">Are you sure to remove this social media platform? This can't be undone and may lead to data lost on your account.</p>
                                        </div>
                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                <i class="fa fa-ban"></i>
                                                No. I change my mind.
                                            </button>

                                            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Yes! Remove.</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="collapse accordion-platform-{!! $platform !!}">
                            <div class="card-body">Platform:

                                <strong>{!! $platform !!}</strong>
                                
                                <input 
                                type="hidden" 
                                class="form-control" 
                                name="social-media-platform-{!! $platform !!}" 
                                value="{!! $platform !!}" 
                                placeholder="Platform name" 
                                autofocus>
                                
                                <input 
                                type="text" 
                                class="form-control mt-2" 
                                required 
                                name="social-media-key-platform-{!! $platform !!}" 
                                placeholder="Email, Username or Phone"
                                value="{!! $link !!}" 
                                focused>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        @empty

        @endforelse
    @endif

    <div class="col-md-3">
        <div class="form-group">
            <label for="socialMediaPlatform">Add Social Media Platform <i class="fa fa-question-circle"></i></label>
        
            <div class="input-group smp-platform-select">
                <select class="form-control" id="socialMediaPlatform">
                    
                    <option 
                    id="platform-facebook" 
                    value="facebook" 
                    @if( Request::route()->getName() == 'users.edit' ) 
                        {!! array_key_exists('facebook', $medias) ? 'disabled' : '' !!}
                    @endif >
                        Facebook
                    </option>
                    
                    <option 
                    id="platform-twitter" 
                    value="twitter" 
                    @if( Request::route()->getName() == 'users.edit' ) 
                        {!! array_key_exists('twitter', $medias) ? 'disabled' : '' !!}
                    @endif>
                        Twitter
                    </option>
                    
                    <option 
                    id="platform-linkedin" 
                    value="linkedin" 
                    @if( Request::route()->getName() == 'users.edit' ) 
                        {!! array_key_exists('linkedin', $medias) ? 'disabled' : '' !!}
                    @endif>
                        LinkedIn
                    </option>
                    
                    <option 
                    id="platform-telegram" 
                    value="telegram" 
                    @if( Request::route()->getName() == 'users.edit' ) 
                        {!! array_key_exists('telegram', $medias) ? 'disabled' : '' !!}
                    @endif>
                        Telegram
                    </option>
                    
                    <option 
                    id="platform-reddit" 
                    value="reddit" 
                    @if( Request::route()->getName() == 'users.edit' ) 
                        {!! array_key_exists('reddit', $medias) ? 'disabled' : '' !!}
                    @endif>
                        Reddit
                    </option>
                    
                    <option 
                    id="platform-medium" 
                    value="medium" 
                    @if( Request::route()->getName() == 'users.edit' ) 
                        {!! array_key_exists('medium', $medias) ? 'disabled' : '' !!}
                    @endif>
                        Medium
                    </option>
                    
                    <option 
                    id="platform-bitcointalks" 
                    value="bitcointalks" 
                    @if( Request::route()->getName() == 'users.edit' ) 
                        {!! array_key_exists('bitcointalks', $medias) ? 'disabled' : '' !!}
                    @endif>
                        BitcoinTalks
                    </option>
                    
                    <option 
                    id="platform-altcoinstalks" 
                    value="altcoinstalks" 
                    @if( Request::route()->getName() == 'users.edit' ) 
                        {!! array_key_exists('altcoinstalks', $medias) ? 'disabled' : '' !!}
                    @endif>
                        AltCoinsTalks
                    </option>
                </select>

                <button class="btn btn-dark add-platform" id="add-social-media-platform" type="button"><i class="fa fa-plus"></i></button>
            </div>
        </div>
    </div>
</div>