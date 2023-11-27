<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('approval_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('request_id');  //Foreign Key referencing PurchaseRequests Table
            $table->integer('step_id'); //Foreign Key referencing WorkflowSteps Table
            $table->integer('approver_id'); // Foreign Key referencing Users Table
            $table->string('comments')->nullable();
            $table->date('approval_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approval_histories');
    }
};
