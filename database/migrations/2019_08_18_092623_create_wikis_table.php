<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWikisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wikis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('cat_id')->index();
            $table->longText('intro');
            $table->longText('advantage');
            $table->longText('types');
            $table->longText('qa');
            $table->string('image');
            $table->string('brief');
            $table->boolean('featured')->default(0);
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
        Schema::dropIfExists('wikis');
    }
}
