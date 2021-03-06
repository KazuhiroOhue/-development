<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeVarietiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //カラム“status”を追加
        Schema::table('varieties', function (Blueprint $table) {
            $table->string('status');
        });
        //stringテーブルの長さを1000に
        Schema::table('varieties', function (Blueprint $table) {
            $table->string('body', 1000)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //statusカラムを削除
        Schema::table('varieties', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        //bodyカラムをもとに戻す
        Schema::table('varieties', function (Blueprint $table) {
            $table->string('body', 255)->change();
        });
    }
}
