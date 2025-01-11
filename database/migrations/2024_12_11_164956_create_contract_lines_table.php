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
        Schema::create('contract_lines', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('type'); // taxa de incêndio, condomínio, etc.
            $table->string('value_type'); // valor cheio, percentual
            $table->decimal('value', 10, 2)->nullable(); // valor da linha
            $table->decimal('percentage', 5, 2)->nullable(); // percentual do valor total
            $table->string('payment_frequency'); // anual, mensal
            $table->integer('installments')->nullable(); // número de parcelas (para IPTU)
            $table->timestamps();
            $table->softDeletes();

            //contract
            $table->unsignedBigInteger('contract_id');
            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_lines');
    }
};