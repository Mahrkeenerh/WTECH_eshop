<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE items RENAME COLUMN price TO new_price');
        DB::statement('ALTER TABLE items RENAME COLUMN sale TO old_price');
        
        Schema::table('items', function (Blueprint $table) {
            $table->float('old_price')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE items RENAME COLUMN new_price TO price');
        DB::statement('ALTER TABLE items RENAME COLUMN old_price TO sale');
        
        Schema::table('items', function (Blueprint $table) {
            $table->integer('old_price')->change();
        });
    }
}
