<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBetsTable extends Migration{

    public function up(){
        Schema::create('bets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('event_id')->constrained('sports_events')->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->decimal('odds', 5, 2);
            $table->enum('status', ['pending', 'won', 'lost'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('bets');
    }
}
