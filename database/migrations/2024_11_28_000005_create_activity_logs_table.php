<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityLogsTable extends Migration
{
    public function up()
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id(); // Primary key 'id'
            $table->foreignId('user_id')->constrained('users'); // Foreign key to users table
            $table->string('action'); // Action performed (e.g., login, logout)
            $table->string('ip'); // IP address from where the action was performed
            $table->timestamps(); // Created and updated timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('activity_logs');
    }
}
