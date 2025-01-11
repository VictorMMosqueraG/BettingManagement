<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportsEventsTable extends Migration{

    public function up(){
        Schema::create('sports_events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->dateTime('event_date');
            $table->string('sport_type');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('sports_events');
    }
}
