<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHotelsTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotels_types', function (Blueprint $table) {
            $table->foreignId('hotels_types_group_id')->nullable()->constrained('hotels_types_groups')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hotels_types', function (Blueprint $table) {
            $table->dropColumn('hotels_types_group_id');
        });
    }
}
