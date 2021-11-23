<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFilters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function($table) {
            $table->enum('brand', ['abc_inc', 'makers', 'creators', 'aaasus']);
            $table->enum('color', ['abc_inc', 'makers', 'creators', 'aaasus']);
            $table->enum('material', ['abc_inc', 'makers', 'creators', 'aaasus']);
        });

        // ENUMS
        Schema::create('enums', function (Blueprint $table) {
            $table->id();
            // somehow link item enum
            $table->string('type')->nullable(false);
            // name string array (treba parsnut na array v controlleri)
            // "white;black;orange;..."
            // new_array = explode(";", string_z_databazy);
            $table->string('names')->nullable(false);
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
        //
    }
}
