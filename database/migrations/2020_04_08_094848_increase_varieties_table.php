<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IncreaseVarietiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //bodyの長さを1000に
        Schema::table('varieties', function (Blueprint $table) {
            $table->string('body', 3000)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //bodyカラムをもとに戻す
        Schema::table('varieties', function (Blueprint $table) {
            $table->string('body', 1000)->change();
        });
    }
}
