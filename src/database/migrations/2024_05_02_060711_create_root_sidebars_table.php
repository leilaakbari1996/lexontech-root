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
         if(!Schema::hasTable('root_sidebars'))
        {
            Schema::create('root_sidebars', function (Blueprint $table) {
                $table->id();
                $table->string('Name');
                $table->string('Url')->nullable();
                $table->boolean('PermissionToSeeMember')->default(false);
                $table->unsignedBigInteger('parent_id')->nullable();

                $table->foreign('parent_id')
                    ->references('id')
                    ->on('root_sidebars')
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();

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
        Schema::dropIfExists('root_sidebars');
    }
};
