<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //Run the migrations.
    public function up()
{
    Schema::create('karlotbl', function (Blueprint $table) {
        $table->id()->startingValue(5000000)->primary(); // Creates an auto-incrementing ID field
        $table->string('name')->required();
        $table->integer('age')->required();
        $table->string('email')->unique();
        $table->string('motto')->nullable(); // Allows null values
        $table->timestamps(); // Adds created_at and updated_at fields
        $table->softDeletes();
    });
}
        //Reverse the migrations.
    public function down(): void
    {
        //Schema::dropIfExists('karlotbl');
        Schema::table('karlotbl', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
