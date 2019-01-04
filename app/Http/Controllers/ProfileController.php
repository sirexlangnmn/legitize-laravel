<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\UserSocialMedia;
use App\UserCryptoWallet;
use Illuminate\Http\Request;
use App\Traits\UserTrait;
use Spatie\Permission\Models\Role;

class ProfileController extends Controller
{
    use UserTrait;

    public function show( $idOrUsername ){

        $authUserId = Auth::user()->id;
        $authUserUsername = Auth::user()->username;

        if( $authUserId ==  $idOrUsername || $authUserUsername ==  $idOrUsername ){

            $user = User::where('id', '=', $idOrUsername)->orWhere('username', $idOrUsername)->firstOrFail();

            $data = [
                'user' => User::find( $authUserId ),
                'roles' => Role::all(),
                'wallets' => $user->userCryptoWallets()->pluck('key','platform')->toArray(),
                'medias' => $user->userSocialMedias()->pluck('link','platform')->toArray(),
            ];

            return view('modules.users.view')->with($data);

        } else{
            abort(404);

            exit;
        }
    }

    public function edit( $idOrUsername ){

        $authUserId = Auth::user()->id;
        $authUserUsername = Auth::user()->username;

        if( $authUserId ==  $idOrUsername || $authUserUsername ==  $idOrUsername ){

            $user = User::where('id', '=', $idOrUsername)->orWhere('username', $idOrUsername)->firstOrFail();

            $data = [
                'user' => $user,
                'medias' => $user->userSocialMedias()->pluck('link','platform')->toArray(), 
                'wallets' => $user->userCryptoWallets()->pluck('key','platform')->toArray(), 
                'roles' => Role::all()
            ];

            return view('modules.users.edit')->with( $data );

        } else{
            abort(404);

            exit;
        }
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        
        $validated = $this->validator( $request, $id );

        if( !empty( $validated['socialMedias'] ) ){
            
            foreach( $validated['socialMedias'] as $socialMedia ){

                if( $socialMedia['status'] == 'update' ){    

                    $updateSocialMedia = UserSocialMedia::where( [ 'user_id' => $user->id, 'platform' => $socialMedia['platform'] ] )->first();

                } else{

                    $updateSocialMedia = (new UserSocialMedia);
                    $updateSocialMedia->user_id = $id;
                    $updateSocialMedia->platform = $socialMedia['platform'];
                }

                $updateSocialMedia->link = $socialMedia['link'];

                $updateSocialMedia->save();

            }
        }

        if( !empty( $validated['wallets'] ) ){
            
            foreach( $validated['wallets'] as $wallet ){

                if( $wallet['status'] == 'update' ){

                    $updateCryptoWallet = UserCryptoWallet::where( [ 'user_id' => $user->id, 'platform' => $wallet['platform'] ] )->first();
                } else{

                    $updateCryptoWallet = (new UserCryptoWallet);
                    $updateCryptoWallet->user_id = $id;
                    $updateCryptoWallet->platform = $wallet['platform'];
                }

                $updateCryptoWallet->key = $wallet['key'];

                $updateCryptoWallet->save();
            }
        }

        if( $this->checkRole( $request ) == true ){
            
            foreach($user->getRoleNames()->toArray() as $key => $role){
                $user->removeRole($role);
            }
            
            foreach( $request['role'] as $key => $role ){
                $user->assignRole($role);
            }
        }

        $user->name = $request->name;
        
        if( isset( $validated['details']['username'] ) ){
            $user->username = $request->username;
        }
        
        if( isset( $validated['details']['email'] ) ){
            $user->email = $request->email;
        }

        if( isset( $validated['details']['avatar'] ) ){
            $user->avatar = $validated['details']['avatar'];
        }
        
        if( isset( $validated['password'] ) ){
            $user->password = Hash::make( $validated['password'] );
        }
        
        $user->save();

        if( isset( $user->username ) ){
            $profileParam = $user->username;
        } else{
            $profileParam = $user->id;
        }

        return redirect()->route('profile', $profileParam)->with('success', 'Profile updated successfully.');
    }
}
