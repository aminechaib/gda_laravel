<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pieces', function (Blueprint $table) {
            $table->id();
            $table->string('reference oem')->nullable();
            $table->string('reference')->nullable();
            $table->string('designation')->nullable();
            $table->string('marque')->nullable();
            $table->string('quantity')->nullable();
            $table->string('prix')->nullable();
            $table->string('prix_total')->nullable();
            $table->string('prix_remiser')->nullable();
            $table->string('fournisseur')->nullable();
            $table->date('date')->nullable();
            $table->timestamps();
        });
    }
    
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pieces');
    }
};
