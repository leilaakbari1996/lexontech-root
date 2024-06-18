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
        if (!Schema::hasTable('root_services'))
        {
            Schema::create('root_services', function (Blueprint $table) {
                $table->id();
                $table->string('Title');
                $table->string('Link');
                $table->integer('Order')->default(1);
                $table->string('LogoURL');
                $table->longText('Text')->nullable();
                $table->enum('Type',['expertise','services'])->nullable();
                $table->boolean('Status')->default(true);
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('root_services');
    }
};
