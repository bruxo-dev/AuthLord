<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        // This method is used to define the schema of the 'roles' table.
        // It will be executed when you run the migration.

        // We check if the table doesn't exist to avoid errors if the migration is run multiple times.
        if (!Schema::hasTable('roles')) {
            Schema::create('roles', function (Blueprint $table) {
                // 'id' is an auto-incrementing primary key for the 'roles' table.
                $table->id(); // Creates an 'id' column (bigint, auto-increment)

                // 'name' is the name of the role, like 'admin', 'user', etc.
                // It is unique to prevent duplicate roles.
                $table->string('name')->unique();

                // 'description' is a text column to store any additional information about the role.
                // It is nullable because not all roles may require a description.
                $table->text('description')->nullable();

                // The 'timestamps()' method will automatically add 'created_at' and 'updated_at' columns.
                $table->timestamps(); // Adds 'created_at' and 'updated_at' columns automatically
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
}
