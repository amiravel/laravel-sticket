<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Sticket\Src\Enums\TicketPriority;
use Sticket\Src\Enums\TicketStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('operator_id')->nullable()->constrained('users');
            $table->foreignId('category_id')->constrained();
            $table->text('body');
            $table->string('title');
            $table->string('status', 50)->default(TicketStatus::OPEN->value);
            $table->unsignedInteger('priority')->default(TicketPriority::LOW->order());
            $table->timestamp('closed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
