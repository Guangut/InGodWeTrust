<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportersTable extends Migration
{
    public function up()
    {
        Schema::create('supporters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->string('gender');
            $table->text('address');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('support_type');
            $table->decimal('contribution_amount', 8, 2);
            // For commit_duration, if your DB doesn't support interval type, consider storing it as integer (e.g., in days)
            $table->integer('commit_duration');
            $table->date('start_date');
            $table->text('bank_details');
            $table->text('testimonial_content')->nullable();
            $table->text('photo_url')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('supporters');
    }
}
