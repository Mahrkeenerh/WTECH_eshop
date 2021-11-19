<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveImagePaths extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('items', 'image_100_path'))
        {
            Schema::table('items', function (Blueprint $table)
            {
                $table->dropColumn('image_100_path');
            });
        }

        if (Schema::hasColumn('items', 'image_200_path'))
        {
            Schema::table('items', function (Blueprint $table)
            {
                $table->dropColumn('image_200_path');
            });
        }

        if (Schema::hasColumn('items', 'image_500_path'))
        {
            Schema::table('items', function (Blueprint $table)
            {
                $table->dropColumn('image_500_path');
            });
        }

        if (Schema::hasColumn('categories', 'image_path'))
        {
            Schema::table('categories', function (Blueprint $table)
            {
                $table->dropColumn('image_path');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
