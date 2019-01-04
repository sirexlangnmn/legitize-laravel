<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\UserSocialMedia;
use App\UserCryptoWallet;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\ValidationException;
use App\Traits\UserTrait;

class UserController extends Controller
{
    use UserTrait;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'users' =>  User::all(),
            'roles' => Role::all()
        ]; 

        return view('modules.users.index')->with( $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'roles' => Role::all()
        ];

        return view('modules.users.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check for propert data validations. Throws back error if failed. Returns form array of datas if valid.
        $validated = $this->validator($request);

        // Overides and hash the key validated key password.
        $validated['details']['password'] =  Hash::make( $validated['details']['password'] );

        $newUser = User::create( $validated['details'] );

        // Creates role for the newly created user from validator method.
        foreach( $validated['roles'] as $key => $role ){

            $newUser->assignRole($role);
        }

        // Creates user crypto wallet.
        foreach( $validated['wallets'] as $wallet ){

            $userCyptoWallet = new UserCryptoWallet;
            $userCyptoWallet->platform = $wallet['platform'];
            $userCyptoWallet->key = $wallet['key'];
            $userCyptoWallet->user_id = $newUser->id;

            $userCyptoWallet->save();
        }

        foreach( $validated['socialMedias'] as $socialMedia ){

            $userSocialMedia = new UserSocialMedia;
            $userSocialMedia->platform = $socialMedia['platform'];
            $userSocialMedia->link = $socialMedia['link'];
            $userSocialMedia->user_id = $newUser->id;

            $userSocialMedia->save();
        }

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail( $id );

        $data = [
            'user' => User::find( $id ),
            'roles' => Role::all(),
            'wallets' => $user->userCryptoWallets()->pluck('key','platform')->toArray(),
            'medias' => $user->userSocialMedias()->pluck('link','platform')->toArray(),

        ];

        return view('modules.users.view')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail( $id );

        $data = [
            'user' => $user,
            'medias' => $user->userSocialMedias()->pluck('link','platform')->toArray(), 
            'wallets' => $user->userCryptoWallets()->pluck('key','platform')->toArray(), 
            'roles' => Role::all()
        ];

        return view('modules.users.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail( $id )->delete();

        return redirect()->route('users.index')->with('success', 'User deleted succesfuly.');
    }
}
