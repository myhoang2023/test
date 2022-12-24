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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();//tu dong tao id, tu dong tang, va kieu du lieu la bigint
            $table->string('name',100)->unique();
            $table->string('description',200)->nullable();
            //$table->tinyInteger('status')->default(1);
            $table->timestamps();//mac dinh tao 2 cot created at va updated at
            $table->softDeletes();//tu dong xoa du lieu theo daleted at (kieu timestamp)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
