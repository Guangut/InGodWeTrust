<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('donation_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supporter_id');
            $table->unsignedBigInteger('donation_processing_id')->nullable();
            $table->decimal('amount', 8, 2)->nullable();
            $table->string('payment_method')->nullable();
            $table->timestamp('transaction_date')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('supporter_id')->references('id')->on('supporters')->onDelete('cascade');
            // If the donation_processing table exists, set up the foreign key:
            // $table->foreign('donation_processing_id')->references('id')->on('donation_processings')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('donation_transactions');
    }
}
