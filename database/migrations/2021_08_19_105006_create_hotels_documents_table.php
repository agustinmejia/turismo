<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->nullable()->constrained('hotels');
            $table->foreignId('hotels_documents_type_id')->nullable()->constrained('hotels_documents_types');
            $table->string('code')->nullable();
            $table->date('start')->nullable();
            $table->date('expiration')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('hotels_documents');
    }
}
