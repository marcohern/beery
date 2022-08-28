<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_ex', function (Blueprint $table) {
            $table->id();
            $table->boolean('invoice')->default(false);
            $table->dateTime('effective_date')->nullable(true);
            $table->decimal('total_price', 18, 4)->default(0.0);
            $table->string('name', 64);
            $table->string('phone', 32);
            $table->string('email',255);
            $table->string('suite',128);
            $table->string('address',255);
            $table->string('zone',255);
            $table->string('zip',32);
            $table->string('city',64);
            $table->string('state',64);
            $table->string('country',64);
            $table->string('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_ex');
    }
};
