<?php

use App\Enums\Order\Status;
use App\Models\Client;
use App\Models\Product;
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
        $statuses = [];

        foreach (Status::cases() as $status) {
            $statuses[] = $status->value;
        }

        Schema::create('orders', function (Blueprint $table) use ($statuses) {
            $table->id();
            $table->enum('status', $statuses)->default(Status::NEW->value);
            $table->unsignedInteger('quantity')->default(1);
            $table->text('comment')->nullable();
            $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Client::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
