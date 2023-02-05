<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->nullable()->constrained('posts')->cascadeOnUpdate()->nullOnDelete();
            $table->string('position')->nullable();
            $table->string('name');
            $table->integer('height')->nullable();
            $table->integer('width')->nullable();
            $table->text('code')->nullable();
            $table->text('code_mobile')->nullable();
            $table->boolean('movil')->default(0);
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
        Schema::dropIfExists('ads');
    }
}
