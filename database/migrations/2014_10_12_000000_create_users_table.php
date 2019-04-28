<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('roles_id');
            $table->text('name');
            $table->string('email')->unique();
            $table->text('password');
            $table->rememberToken();
            $table->timestamps();
        });

        //membuat tabel rules utk verif user/admin
        Schema::create('roles', function (Blueprint $kolom){
            $kolom->increments('id');
            $kolom->text('namaRule');
        });

        //memberitahukan bahwa ada foreignkey dan hapus data jika terjadi penghapusan
        //di tabel user
        Schema::create('users', function (Blueprint $kolom){
           $kolom->foreign('roles_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
    }
}
