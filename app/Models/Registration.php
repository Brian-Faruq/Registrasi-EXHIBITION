<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    //
    public function up()
{
    Schema::create('registrations', function (Blueprint $table) {
        $table->id();
        $table->string('reference_code')->unique();
        $table->foreignId('ticket_id')->constrained('tickets')->onDelete('cascade');
        $table->string('full_name');
        $table->string('email');
        $table->string('whatsapp');
        $table->string('payment_method')->nullable();
        $table->decimal('amount', 10, 2);
        $table->string('checkout_url')->nullable();
        $table->string('qr_url')->nullable();
        $table->string('pay_code')->nullable();
        $table->enum('status', ['UNPAID', 'PAID', 'EXPIRED'])->default('UNPAID');
        $table->timestamps();
    });
}
}
