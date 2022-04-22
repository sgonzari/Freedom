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
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->increments("id_bookmark");
            $table->integer("fk_user")->unsigned();
            $table->integer("fk_post")->unsigned();
            $table->timestamps();
        });

        Schema::table('bookmarks', function (Blueprint $table) {
            $table->foreign("fk_user")->references("id_user")->on("users")->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("fk_post")->references("id_post")->on("posts")->constrained()->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookmarks');
    }
};
