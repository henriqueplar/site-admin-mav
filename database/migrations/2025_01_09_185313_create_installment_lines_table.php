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
        Schema::create('installment_lines', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('description')->nullable();
            $table->decimal('value', 10, 2);

            //contract
            $table->unsignedBigInteger('installment_id');
            $table->foreign('installment_id')->references('id')->on('installments')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('installment_lines');
    }
};
