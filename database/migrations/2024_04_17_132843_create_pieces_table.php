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
            $table->string('reference oem');
            $table->string('reference');
            $table->string('designation');
            $table->string('marque');
            $table->string('quantity');
            $table->string('prix');
            $table->string('prix_total');
            $table->string('prix_remiser');
            $table->string('fournisseur');
            $table->date('date');
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
