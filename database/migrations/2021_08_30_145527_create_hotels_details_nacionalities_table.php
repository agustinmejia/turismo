<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsDetailsNacionalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels_details_nacionalities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotels_detail_id')->nullable()->constrained('hotels_details');
            $table->foreignId('state_id')->nullable()->constrained('states');
            $table->foreignId('province_id')->nullable()->constrained('provinces');
            $table->foreignId('city_id')->nullable()->constrained('cities');
            $table->string('origin')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels_details_nacionalities');
    }
}
