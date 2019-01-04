<?php

namespace App\Traits;

use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\UserSocialMedia;
use App\UserCryptoWallet;

trait UserTrait
{
    protected function validator( $request, $user_id = '' ){        
        $userSocialMedias = [];
        $userWallets = [];

        foreach( $this->cryptoWalletPlatforms() as $wallet ){
           
            if( !empty($request['crypto-wallet-platform-' . $wallet]) ){
                
                $platform = $request['crypto-wallet-platform-' . $wallet];
                $key = $request['crypto-wallet-key-platform-' . $wallet];

                // Checks the current platform index if exist on users wallets table.
                $userWallet = userCryptoWallet::where( 
                    [ 
                        'user_id' => $user_id,
                        'platform' => $platform, 
                    ] 
                )->first();

                // Checks the current platform index if exist on other users.
                $otherWallet = userCryptoWallet::where( 
                    [ 
                        'platform' => $platform, 
                        'key' => $key 
                    ] 
                )->first();

                // Check if $user_id parameter is set.
                if( isset( $user_id ) ){

                    if( !empty( $userWallet ) ){

                        $userWallets[] = [
                            'status' => 'update',
                            'platform' =>  $platform,
                            'key' => $key,
                            'user_id' => $user_id
                        ];

                    } else{

                        if( empty( $otherWallet ) ){
                            $userWallets[] = [
                                'status' => 'create',
                                'platform' =>  $platform,
                                'key' => $key
                            ];
                        } else{

                            $this->throwValidationError( 'wallet', 'Wallet already exist.' );
                        }
                    }
                
                // Did not passed $user_id parameter. Expecting to be create post type.
                } else {

                    if( empty( $otherWallet ) ){

                        $userWallets[] = [
                            'platform' =>  $platform,
                            'key' => $key
                        ]; 

                    } else{

                        $this->throwValidationError( 'wallet', 'Wallet already exist.' );
                    }
                }               
            }
        }

        // Check user social medias form request.
        foreach( $this->socialMediaPlatforms() as $socialMediaPlatform ){

            if( !empty($request['social-media-platform-' . $socialMediaPlatform ]) ){

                $platform = $request['social-media-platform-' . $socialMediaPlatform];
                $link = $request['social-media-key-platform-' . $socialMediaPlatform];

                // Checks the current platform index if exist on users wallets table.
                $userSocialMedia = userSocialMedia::where( 
                    [ 
                        'user_id' => $user_id,
                        'platform' => $platform, 
                    ] 
                )->first();

                // Checks the current platform index if exist on other users.
                $otherSocialMedia = userSocialMedia::where( 
                    [ 
                        'platform' => $platform, 
                        'link' => $link 
                    ] 
                )->first();

                if( isset( $user_id ) ){

                    if( !empty( $userSocialMedia ) ){
                        $userSocialMedias[] = [
                            'status' => 'update', 
                            'platform' =>  $platform,
                            'user_id' => $user_id,
                            'link' => $link
                        ];

                    } else{

                        if( empty( $otherSocialMedia ) ){

                            $userSocialMedias[] = [
                                'status' => 'create',
                                'platform' =>  $platform,
                                'link' => $link,
                                'user_id' => $user_id
                            ];

                        } else{

                            $this->throwValidationError( 'social-media', 'Social media account already exist.' );
                        }
                    }

                } else{

                    if( empty( $otherSocialMedia ) ){

                        $userSocialMedias[] = [
                            'platform' =>  $platform,
                            'key' => $key
                        ]; 

                    } else{

                        $this->throwValidationError( 'social-media', 'Social media account already exist.' );
                    }
                }
            }
        }

        // Check if the user exist. Create if false. Update if true.
        $user = User::find( $user_id );

        if( $user == null ){
            
            $userDetails = $this->validate($request,  [
                'name' => 'required|string|max:255',
                'username' => 'string|max:255|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'avatar' => 'image|mimes:jpeg,png,jpg|max:1048',
            ]);

        } else{

            $userEmail = [];
            $userUsername = [];
            $userPassword = [];

            if( $request['email'] !== $user->email ){
                $userEmail = $this->validate( $request, ['email' => 'required|string|email|max:25|unique:users'] );
            }

            if( $request['username'] !== $user->username ){
                $userUsername = $this->validate( $request, ['username' => 'required|string|max:25|unique:users'] );
            }

            if( !empty( $request['password'] ) ){
                $userPassword = $this->validate( $request, ['password' => 'required|string|min:6|confirmed'] );
            }

            $userName = $this->validate($request, [
                'name' => 'required|string|max:30',
            ]);
            
            $userDetails = array_merge( $userEmail, $userUsername, $userPassword, $userName );
        }
        
        if($request->hasFile('avatar')) {
            
            $image = $request->file('avatar');
            $avatar = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $avatar);
            
            $userDetails['avatar'] = $avatar;
        }
        
        $userRoles = $this->checkRole( $request );

        $userRequest = [
            'wallets' => $userWallets,
            'socialMedias' => $userSocialMedias,
            'roles' => $userRoles,
            'details' => $userDetails
        ];

        return $userRequest;
    }

    private function cryptoWalletPlatforms(){

        $wallets =  [
            'erc-20',
            'komodo',
            'omni',
            'neo',
            'stellar',
            'ardor',
            'waves',
            'agama'
        ];

        return $wallets;
    }

    private function socialMediaPlatforms(){
        
        $medias = [
            'facebook',
            'twitter',
            'linkedin',
            'medium',
            'reddit',
            'telegram',
            'bitcointalks',
            'altcointalks'
        ];

        return $medias;
    }

    private function checkRole( $request ){
        
        $userRoles = [];

        $this->validate($request, [

            'role' => 'required'
        ]);

        foreach( $request['role'] as $key => $role ){

            if( in_array($role, Role::all()->pluck('name')->toArray() ) === true ){
                
                $userRoles[] = $role;
                
                continue;

            } else{
                $error = ValidationException::withMessages([ 'permission' => 'No such role exist.' ]);

                throw $error;

                exit;
            }
        }

        return $userRoles;
    }

    protected function throwValidationError( $type, $message ){

        throw ValidationException::withMessages( [ $type => $message ] );

        exit;
    }

    public function array_flatten($array) { 
        if (!is_array($array)) { 
          return FALSE; 
        } 
        $result = array(); 
        foreach ($array as $key => $value) { 
          if (is_array($value)) { 
            $result = array_merge($result, array_flatten($value)); 
          } 
          else { 
            $result[$key] = $value; 
          } 
        } 
        return $result; 
    }

    public function deleteSocialMedia(){
        
    }
}