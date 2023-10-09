<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('links', function ($table) {
            $table->string('short_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->dropColumn('short_url');
    }
};
