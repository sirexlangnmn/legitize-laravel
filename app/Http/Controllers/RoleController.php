<?php
namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Validation\ValidationException;

class RoleController extends Controller
{
    use HasRoles;
    
    public function __construct(){
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $permissions = Permission::all()->pluck('name');

        $role_has_permissions = DB::table('role_has_permissions')->get();

        $role_permissions = [];

        foreach( Role::all()->pluck('name') as $role_name ){
         
            $role_permissions[] = [
                'role_id' => Role::where('name', $role_name)->get()->pluck('id')[0],
                'role_name' => $role_name,
                'description' => Role::findByName($role_name)->description,
                'permissions' => Role::findByName($role_name)->permissions->pluck('name'),
                'total_users' => Role::findByName($role_name)->users->count()
            ];
        }
   
        $data = [
            'role_permissions' => $role_permissions,
            'admin_users' => User::role('admin')->get(),
        ];
        
        return view('modules.roles.index', $data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'permissions' => [
                'user-create',
                'user-edit',
                'user-destroy',
                'user-show',
                'user-role-assign',
                
                'role-create',  
                'role-edit',  
                'role-destroy',
                'role-show',
                
                'campaign-create',
                'campaign-edit',
                'campaign-destroy', 
                'campaign-show'
            ]
        ];

        return view('modules.roles.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
            'description' => 'required'
        ]);

        if( $this->check_permission( $validated ) == true ){
            
            $role = Role::create([
                'name' => $validated['name'],
                'description' => $validated['description'],
            ]);

            foreach( $validated['permission'] as $key => $permission ){

                $role->givePermissionTo($permission);
            
            }
        }
        
        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'permissions' => Permission::all(),
            'role' => Role::findOrFail($id)
        ];

        return view('modules.roles.view')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = [
            'permissions' => [
                'user-create',
                'user-edit',
                'user-destroy',
                'user-show',
                'user-role-assign',
                
                'role-create',  
                'role-edit',  
                'role-destroy',
                'role-show',
                
                'campaign-create',
                'campaign-edit',
                'campaign-destroy', 
                'campaign-show'
            ],
            'role' => Role::findOrFail($id)
        ];

        return view('modules.roles.edit')->with($data);
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
        $role = Role::findOrFail($id);

        if( $request->name !== $role->name ){

            $validate = $this->validate($request, [
                'name' => 'required|unique:roles,name',
                'permission' => 'required',
                'description' => 'required'
            ]);

            if( $this->check_permission( $request ) === true ){

                $role->revokePermissionTo(Permission::all())->save();

                $role->name = $validate['name'];
    
                $role->description = $validate['description'];
    
                $role->save();
            }

        } else{

            $validate = $this->validate($request, [
                'permission' => 'required',
                'description' => 'required'
            ]);

            if(  $this->check_permission( $request ) === true  ){

                $role->revokePermissionTo(Permission::all())->save();
            
                $role->description = $validate['description'];
    
                $role->save();
            }
        
        }

        foreach($validate['permission'] as $key => $validated){
            $role->givePermissionTo($validated);
        }

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id)->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted succesfuly.');
    }

    public function check_permission( $request ){
        

        foreach( $request['permission'] as $key => $permission ){

            if( in_array($permission, Permission::all()->pluck('name')->toArray() ) === true ){
                continue;
            } else{
                $error = ValidationException::withMessages([ 'permission' => 'No such permission exist.' ]);

                throw $error;

                exit;
            }
        }

        return true;

    }
}