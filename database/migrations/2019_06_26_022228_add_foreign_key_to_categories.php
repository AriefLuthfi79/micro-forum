<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('forum_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('forum_id')->references('id')->on('forums')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $columns = [];

        if (Schema::hasColumn('categories', 'user_id')) {
            array_push($columns, 'user_id');
        }
        
        if (Schema::hasColumn('categories', 'forum_id')) {
            array_push($columns, 'forum_id');
        }

        if (count($columns)) {
            Schema::table('categories', function (Blueprint $table) use ($columns) {
                $table->dropColumn($columns);
            });
        }
    }
}
