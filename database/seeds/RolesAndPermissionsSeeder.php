<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        $permissions = [
            'admin-assign' => 'Allowed to assign a new admin.',
            'admin-remove' => 'Allowed to remove an admin.',

            'user-create' => 'Allowed to create new user.',
            'user-edit' => 'Allowed to edit user info, credentials and status.', 
            'user-destroy' => 'Allowed to delete a user',
            'user-show' => 'Allowed to view user details and status',
            'user-role-assign' => 'Allowed to assign roles to user. (Except: Admin, Super-Admin).',

            'role-create' => 'Allowed to create new role.',  
            'role-edit' => 'Allowed to edit a role.',  
            'role-destroy' => 'Allowed to delete a role. (Note: Apply this role only to admin).', 
            'role-show' => 'Allowed to view role details.',

            'campaign-create' => 'Allowed to create new campaign.' ,
            'campaign-edit' => 'Allowed to edit campaign details.',
            'campaign-destroy' => 'Allowed to delete campaign.',
            'campaign-show' => 'Allowed to view campaign details.',
 
            ];

        foreach($permissions as $permission => $description){
            Permission::create( [ 'name' => $permission, 'description' => $description ]);
        }

        // create roles and assign created permissions
        Role::create([
            'name' => 'super-admin',
            'description' => 'Who ever has this role, shall be the god of roles. Has all the previlage on this app that has to offer. No one defies a super-admin.'
        ])->givePermissionTo(Permission::all());

        Role::create([
                'name' => 'admin',
                'description' => 'Ruler of all. Well, Except the god or roles of course (super-admin). Can do every thing like super-admin does. Except adding new admin.'
            ])->givePermissionTo([
       
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
        ]);

        Role::create([
            'name' => 'bounty-hunter',
            'description' => 'The bounty hunters are the users who shares and hunts capaigns.'
        ])->givePermissionTo([
            'campaign-show'
        ]);

        Role::create([
                'name' => 'campaign-manager',
                'description' => 'Bounty hunter leader. Manages the bounty-hunters.'
            ])->givePermissionTo([
            'campaign-edit',
            'campaign-show',
        ]);
    }
}
