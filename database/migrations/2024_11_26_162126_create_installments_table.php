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
        Schema::create('installments', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->date('dueDate');
            $table->integer('number');
            $table->unsignedBigInteger('contract_id');
            $table->float('amount', 8, 2);
            $table->string('status');
            
            // Define a chave estrangeira
            $table->foreign('contract_id')->references('id')->on('contracts'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('installments');
    }
};
