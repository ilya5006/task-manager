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
        Schema::create('task', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_owner');
            $table->unsignedBigInteger('id_responsible');
            $table->unsignedBigInteger('id_status');
            
            $table->string('name');
            $table->text('description');

            $table->foreign('id_owner')->references('id')->on('user');
            $table->foreign('id_responsible')->references('id')->on('user');
            $table->foreign('id_status')->references('id')->on('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task');
    }
};
