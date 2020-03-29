<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeMemosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //カラム“status”,“rank2”,“number”を追加
        Schema::table('memos', function (Blueprint $table) {
            $table->string('status');
            $table->string('rank2')->nullable();
            $table->string('number')->nullable();
        });
        //stringテーブルの長さを1000に
        Schema::table('memos', function (Blueprint $table) {
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
        //追加したカラムの削除
        Schema::table('memos', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('rank2');
            $table->dropColumn('number');
        });
        //bodyカラムをもとに戻す
        Schema::table('memos', function (Blueprint $table) {
            $table->string('body', 255)->change();
        });
    }
}
