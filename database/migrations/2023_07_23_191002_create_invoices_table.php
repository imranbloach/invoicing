<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Customer;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string("invoice_number");
            $table->foreignIdFor(Customer::class);
            $table->float("discount",8,2);
            $table->float("tax",8,2);
            $table->enum("status", ["pending", "cancelled", "paid"]);
            $table->float("total_amount", 8, 2);
            $table->dateTime("due_date");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
