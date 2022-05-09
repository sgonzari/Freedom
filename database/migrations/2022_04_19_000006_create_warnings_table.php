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
        Schema::create('warnings', function (Blueprint $table) {
            $table->increments("id_warning");
            $table->integer("fk_admin")->unsigned();
            $table->integer("fk_user")->unsigned();
            $table->string("reason");
            $table->boolean("opened")->default(false);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('warnings', function (Blueprint $table) {
            $table->foreign("fk_user")->references("id_user")->on("users")->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("fk_admin")->references("id_user")->on("users")->constrained()->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warnings');
    }
};
