<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->nullable();
            $table->integer('subcategory_id')->nullable();
            $table->integer('inner_category_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_bn')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('slug_bn')->nullable();
            $table->string('code')->nullable();
            $table->string('tag_en')->nullable();
            $table->string('tag_bn')->nullable();
            $table->string('color_en')->nullable();
            $table->string('color_bn')->nullable();
            $table->string('size_en')->nullable();
            $table->string('size_bn')->nullable();
            $table->string('selling_price')->nullable();
            $table->string('discount_price')->nullable();
            $table->longText('short_desc_en')->nullable();
            $table->longText('short_desc_bn')->nullable();
            $table->longText('long_desc_en')->nullable();
            $table->longText('long_desc_bn')->nullable();
            $table->string('thumb_image')->nullable();
            $table->string('multi_images')->nullable();
            $table->boolean('hot_deal')->default(false);
            $table->boolean('featured')->default(false);
            $table->boolean('spacial_offer')->default(false);
            $table->boolean('spacial_deals')->default(false);
            $table->boolean('is_active')->default(false);
            $table->string('qty')->nullable();
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
        Schema::dropIfExists('products');
    }
}
