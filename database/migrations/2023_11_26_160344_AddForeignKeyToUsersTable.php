<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToUsersTable extends Migration
{
    public function up()
    {   
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('idrol')->nullable()->default(null)->unsigned();
           $table->index(["idrol"], 'idrole_idx');
            $table->foreign('idrol', 'idrole_idx')
                ->references('id')->on('roles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('idrole_idx');
        });
    }
}

