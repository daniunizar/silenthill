<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relationships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personOrig'); //Foreign key from residents or contacts
            $table->unsignedBigInteger('origType');
            $table->unsignedBigInteger('personTarg'); //Foreign key from residents or contacts
            $table->unsignedBigInteger('targType');
            $table->unsignedBigInteger('relationship'); //Foreign key from types_of_relationships

            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relationships');
    }
};
