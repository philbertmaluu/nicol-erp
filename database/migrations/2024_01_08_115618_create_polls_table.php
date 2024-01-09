<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\PollStatus;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('polls', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('created_by')->constrained('users');
            $table->dateTime('start_at'); // 2022-12-31 15:00
            $table->dateTime('end_at'); // 2022-12-31 15:00
            $table->enum('status', array_column(PollStatus::cases(), 'value'))->default(PollStatus::PENDING->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polls');
    }
};
