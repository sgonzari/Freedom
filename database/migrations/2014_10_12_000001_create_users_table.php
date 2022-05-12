<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments("id_user");
            $table->integer("fk_rol")->unsigned()->default(1);
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->date("birthday")->nullable();
            $table->timestamps();
            $table->string("profile_image")->default('users/user.png');
            $table->string("description")->nullable();
            $table->softDeletes();
            $table->boolean("banned")->default(false);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign("fk_rol")->references("id_rol")->on("rols")->constrained()->onUpdate("cascade")->onDelete("cascade");
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
    }
};
