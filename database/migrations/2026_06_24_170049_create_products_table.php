<?php

use App\Models\Category;
use App\Models\Supplier;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name', '191');
            $table->foreignIdFor(Category::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Supplier::class)->constrained()->onDelete('cascade');
            $table->string('sku', '100');
            $table->decimal('stock', '12', '2');
            $table->decimal('min_stock', '12', '2')->default('15');
            $table->decimal('purchase_price', '12', '2');
            $table->decimal('selling_price', '12', '2');
            $table->string('product_image', '255');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
