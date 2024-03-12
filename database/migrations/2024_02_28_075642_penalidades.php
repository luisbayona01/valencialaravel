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
        //
        Schema::create('penalidades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('fechaCreacion');
            $table->bigint('creadoPor');
            $table->varchar('obsCreacion');
            $table->float('estadopenalidad_Id');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
