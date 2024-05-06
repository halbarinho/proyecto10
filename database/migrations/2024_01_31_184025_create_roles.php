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
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleDoc = Role::create(['name' => 'docente']);
        $roleAlum = Role::create(['name' => 'alumno']);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
