<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProspectContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospect_contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('prospect_id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('website')->nullable();
            $table->string('eemail')->nullable();
            $table->string('phone')->nullable();
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
        Schema::dropIfExists('prospect_contacts');
    }
}
