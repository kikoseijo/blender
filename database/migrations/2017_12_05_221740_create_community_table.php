<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunityTable extends Migration
{
    public function up()
    {
        Schema::create('community', function (Blueprint $table) {
            $table->increments('id');
            $table->json('name')->nullable();
            $table->json('text')->nullable();
            $table->json('slug')->nullable();
            $table->json('meta_values')->nullable();
            $table->datetime('publish_date');
            $table->boolean('draft')->default(true);
            $table->boolean('online')->default(true);
            $table->timestamps();
        });
    }
}
