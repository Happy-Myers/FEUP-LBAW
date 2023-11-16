<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->unsignedInteger('stock');
            $table->unsignedFloat('price');
            $table->string('image')->nullable();
            $table->unsignedFloat('score');
            $table->longText('description')->nullable();
            $table->boolean('hardware');
            $table->date('publication_date')->default(now());
            $table->unsignedBigInteger('platform_id');

            $table->foreign('platform_id')->references('id')->on('platforms')->onDelete('cascade');
        });

        DB::statement('ALTER TABLE products ADD CONSTRAINT score_check CHECK(score > 0 AND score <=5)');
        DB::statement('ALTER TABLE products ADD CONSTRAINT price_check CHECK(price > 0)');
        DB::statement('ALTER TABLE products ADD CONSTRAINT publication_date_check CHECK(publication_date <= now())');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
