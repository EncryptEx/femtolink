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
        // Rename the original table
        Schema::rename('links', 'temp_table_name');

        // Create the new table with the updated column type
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->integer('ownerId');
            $table->longText('long_url');
            $table->string('short_url');
            $table->timestamps();
        });

        // Copy data from the old table to the new table
        DB::table('links')->insert(
            DB::table('temp_table_name')->select('id', 'ownerId', 'long_url', 'short_url', 'created_at', 'updated_at')->get()->toArray()
        );

        // Drop the temporary table
        Schema::drop('temp_table_name');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Rename the new table to temporary table
        Schema::rename('links', 'temp_table_name');

        // Recreate the original table with the original column type
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->integer('ownerId');
            $table->string('long_url');
            $table->string('short_url');
            $table->timestamps();
        });

        // Copy data back from the temp table to the original table
        DB::table('links')->insert(
            DB::table('temp_table_name')->select('id', 'column_name', 'other_column', 'created_at', 'updated_at')->get()->toArray()
        );

        // Drop the temporary table
        Schema::drop('temp_table_name');
    }
};
