<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Students;
use App\Models\Prof;
use App\Models\Admin;
use App\Models\Card;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {


        // Define roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'prof']);
        Role::create(['name' => 'student']);
    
        // Define permissions
        Permission::create(['name' => 'access_private_card']);
        Permission::create(['name' => 'manage users']);
    
        // Assign permissions to roles
        Role::findByName('admin')->givePermissionTo('manage users');
        Role::findByName('student')->givePermissionTo('access_private_card');

        $user = User::find(2); 
        $role = Role::where('name', 'student')->first();
        $user->assignRole($role);

        $user = User::find(1); 
        $role = Role::where('name', 'admin')->first();
        $user->assignRole($role);

        $user = User::find(3); 
        $role = Role::where('name', 'prof')->first();
        $user->assignRole($role);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
