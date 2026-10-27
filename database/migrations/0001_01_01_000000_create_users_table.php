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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('Username')->unique();
            $table->string('Password');
            $table->string('Email')->unique();
            $table->string('NamaLengkap');
            $table->text('Alamat');
            $table->timestamps();
        });
    }

};
