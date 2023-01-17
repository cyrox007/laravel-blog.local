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
        if (Schema::hasTable("posts")) {
            Schema::dropIfExists('posts');
        }

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable();
            $table->text("body")->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();

            $table->foreign("user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
