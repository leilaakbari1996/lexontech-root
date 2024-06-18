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
        if(!Schema::hasTable('root_menus'))
        {
            Schema::create('root_menus', function (Blueprint $table) {
                $table->id();
                $table->string('Title');
                $table->string('Link')->nullable();
                $table->unsignedBigInteger('parent_id')->nullable();
                $table->string('IconURL')->nullable();
                $table->enum('Type',['header','footer']);
                $table->boolean('Status')->default(true);
                $table->integer('Order')->default(1);

                $table->foreign('parent_id')
                    ->references('id')
                    ->on('root_menus')
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
        Schema::dropIfExists('menus');
    }
};
