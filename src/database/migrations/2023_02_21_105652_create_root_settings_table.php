<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if(!Schema::hasTable('root_settings'))
        {
            Schema::create('root_settings', function (Blueprint $table) {
                $table->id();
                $table->string("Key")->nullable();
                $table->longText("Value")->nullable();
                $table->longText('Field')->nullable();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
