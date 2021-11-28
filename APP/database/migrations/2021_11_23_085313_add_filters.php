<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Filter;

class AddFilters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Filters
        Schema::create('filters', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            // values string array (treba parsnut na array v controlleri)
            // "white;black;orange;..."
            // new_array = explode(";", string_z_databazy);
            $table->text('values')->nullable(false);
            $table->timestamps();
        });

        // Fill data
        Filter::create([
            'id'=>1,
            'name'=>"Brand",
            'values'=>"abc_inc;makers;creators;aaasus"
        ]);

        Filter::create([
            'id'=>2,
            'name'=>"Color",
            'values'=>"white;black;orange;magenta"
        ]);

        Filter::create([
            'id'=>3,
            'name'=>"Material",
            'values'=>"metal;aluminium;copper"
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('filters');
    }
}
