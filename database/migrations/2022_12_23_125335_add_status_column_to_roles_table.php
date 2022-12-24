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
        //::table: cap nhat lai bang
        Schema::table('roles', function (Blueprint $table) {
            $table->tinyInteger('status')->default(1)->after('description');
            
        });
    }
    //public function down()
    // {
    //     //::table: cap nhat lai bang
    //     Schema::table('roles', function (Blueprint $table) {
    //         $table->dropColumn('status');
            
    //     });
    // }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
