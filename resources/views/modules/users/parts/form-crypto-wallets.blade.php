<h5 class="mt-3">Crypto Wallets</h5>
<div class="row mt-3" id="smp-crypto-wallet-div">

    @if( Request::route()->getName() == 'users.edit' ) 

        @forelse( $wallets as $platform => $key )

            <div class="col-md-3 mt-3 smp-facebook">
                <div id="accordion">
                    <div class="card">

                        <div class="card-header {!! $platform !!} text-white bg-dark">
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
                                {!! $platform !!}
                            </a>
                            
                            <i class="fa fa-remove remove-platform float-right mt-1"></i>
                        </div>

                        <div class="collapse accordion-platform-{!! $platform !!}">
                            <div class="card-body">Platform:

                                <strong>{!! $platform !!}</strong>
                                
                                <input 
                                type="hidden" 
                                class="form-control" 
                                name="crypto-wallet-platform-{!! $platform !!}" 
                                value="{!! $platform !!}" 
                                placeholder="Platform name" 
                                autofocus>
                                
                                <input 
                                type="text" 
                                class="form-control mt-2" 
                                required 
                                name="crypto-wallet-key-platform-{!! $platform !!}" 
                                placeholder="Email, Username or Phone"
                                value="{!! $key !!}" 
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
            <label for="cryptoWalletPlatform">Add Crypto Wallet Platform <i class="fa fa-question-circle"></i></label>
            
            <div class="input-group smp-platform-select">
                <select class="form-control" id="cryptoWalletPlatform">
                    
                    <option 
                    id="platform-erc-20" 
                    value="erc-20"
                        @if( Request::route()->getName() == 'users.edit' ) 
                            {!! array_key_exists('erc-20', $wallets) ? 'disabled' : '' !!}
                        @endif >ERC-20
                    </option>

                    <option 
                    id="platform-komodo" 
                    value="komodo"
                        @if( Request::route()->getName() == 'users.edit' ) 
                        {!! array_key_exists('komodo', $wallets) ? 'disabled' : '' !!}
                        @endif>Komodo
                    </option>

                    <option 
                    id="platform-omni" 
                    value="omni"
                        @if( Request::route()->getName() == 'users.edit' ) 
                            {!! array_key_exists('omni', $wallets) ? 'disabled' : '' !!}
                        @endif>Omni
                    </option>

                    <option 
                    id="platform-neo" 
                    value="neo"
                        @if( Request::route()->getName() == 'users.edit' ) 
                            {!! array_key_exists('neo', $wallets) ? 'disabled' : '' !!}
                        @endif>Neo
                    </option>

                    <option 
                    id="platform-stellar" 
                    value="stellar"
                        @if( Request::route()->getName() == 'users.edit' ) 
                            {!! array_key_exists('stellar', $wallets) ? 'disabled' : '' !!}
                        @endif>Stellar
                    </option>

                    <option 
                    id="platform-ardor" 
                    value="ardor"
                        @if( Request::route()->getName() == 'users.edit' ) 
                            {!! array_key_exists('ardor', $wallets) ? 'disabled' : '' !!}
                        @endif>Ardor
                    </option>

                    <option 
                    id="platform-waves" 
                    value="waves"
                        @if( Request::route()->getName() == 'users.edit' ) 
                            {!! array_key_exists('waves', $wallets) ? 'disabled' : '' !!}
                        @endif>Waves</option>
                         
                    <option 
                    id="platform-agama" 
                    value="agama"
                        @if( Request::route()->getName() == 'users.edit' ) 
                            {!! array_key_exists('agama', $wallets) ? 'disabled' : '' !!}
                        @endif>Agama
                    </option>

                </select>

                <button class="btn btn-dark add-platform" id="add-crypto-wallet-platform" type="button"><i class="fa fa-plus"></i></button>
            </div>
        </div>
    </div>
</div>
