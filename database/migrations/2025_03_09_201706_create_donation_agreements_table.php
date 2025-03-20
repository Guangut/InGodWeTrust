<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationAgreementsTable extends Migration
{
    public function up()
    {
        Schema::create('donation_agreements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supporter_id');
            $table->string('donation_type')->nullable();
            $table->decimal('donation_amount', 8, 2)->nullable();
            $table->string('recurring_interval')->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->text('signed_agreement_pdf')->nullable();
            $table->text('summary_pdf')->nullable();
            $table->timestamps();

            $table->foreign('supporter_id')->references('id')->on('supporters')->onDelete('cascade');
            // Uncomment if you have a bank_forms table:
            // $table->foreign('bank_id')->references('id')->on('bank_forms')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('donation_agreements');
    }
}
