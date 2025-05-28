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
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('short_desc');
            $table->integer('plan_id');
            $table->text('long_desc');
            $table->text('summary');
            $table->float('price', 12, 2);
            $table->float('deal_price', 12, 2);
            $table->string('status');
            $table->string('video');
            $table->string('affiliate_url');
            $table->string('code')->nullable();
            $table->string('api_secret')->nullable();
            $table->string('api_user')->nullable();
            $table->date('deal_ends')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
