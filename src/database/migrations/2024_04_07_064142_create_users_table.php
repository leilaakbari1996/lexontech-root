<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up(): void
    {
        Schema::dropIfExists('wb_users');

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('FullName')->nullable();
            $table->string('ProfileURL')->nullable();
            $table->enum('Type',['admin','member'])->default('member');
            $table->string('lex_PhoneNumber')->unique();
            $table->string('password');
            $table->boolean('Status')->default(true);
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
