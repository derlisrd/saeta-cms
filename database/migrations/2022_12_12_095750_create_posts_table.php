<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            //$table->unsignedBigInteger('image_id')->nullable();
            //$table->unsignedBigInteger('user_id')->nullable();

            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnUpdate()->nullOnDelete();
            //$table->unsignedBigInteger('category_id')->nullable();

            $table->foreignId('category_id')->nullable()->constrained('categories')->cascadeOnUpdate()->nullOnDelete();

            $table->unsignedBigInteger('post_id')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('tags')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('url')->nullable();
            $table->longText('text')->nullable();
            $table->string('type')->default('post');
            $table->string('reference')->nullable();
            $table->tinyInteger('status')->comment('1 public 2 private 3 hide 4 pass 5 trash');
            $table->integer('menu_order')->nullable();
            $table->boolean('comment_status')->default(1);
            $table->string('password')->nullable();
            $table->timestamps();
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
}
