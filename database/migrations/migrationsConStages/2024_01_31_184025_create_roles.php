<?php

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'docente']);
        $role3 = Role::create(['name' => 'usuario']);

        // $permission = Permission::create(['name' => 'edit articles']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
