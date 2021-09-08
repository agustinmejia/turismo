<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsDetailsEmptiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels_details_empties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->nullable()->constrained('hotels');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->date('date')->nullable();
            $table->text('observations')->nullable();
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
        Schema::dropIfExists('hotels_details_empties');
    }
}
