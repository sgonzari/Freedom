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
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments("id_notification");
            $table->integer("fk_user")->unsigned();
            $table->integer("fk_notifier")->unsigned();
            $table->integer("fk_post")->unsigned()->nullable();
            $table->integer("fk_typeNot")->unsigned();
            $table->boolean("watched")->default(false);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('notifications', function (Blueprint $table) {
            $table->foreign("fk_user")->references("id_user")->on("users")->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("fk_notifier")->references("id_user")->on("users")->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("fk_post")->references("id_post")->on("posts")->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("fk_typeNot")->references("id_typeNot")->on("types-notifications")->constrained()->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
};
