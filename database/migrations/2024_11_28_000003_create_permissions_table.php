<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id(); // Primary key 'id'
            $table->string('nome')->unique(); // Permission name
            $table->text('descricao')->nullable(); // Permission description
            $table->timestamps(); // Created and updated timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
