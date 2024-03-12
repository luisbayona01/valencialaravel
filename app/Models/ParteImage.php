<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParteImage extends Model
{
    use HasFactory;

    // En la migración de ParteImage
public function up()
{
    Schema::create('parte_images', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('parte_id');
        $table->string('image_path');
        $table->timestamps();

        $table->foreign('parte_id')->references('id')->on('partes')->onDelete('cascade');
    });
}


}


