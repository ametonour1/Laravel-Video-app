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
        Schema::table('videosDocument', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(false)->after('id'); // Add nullable user_id column
        });
    
        // Optional: Update existing rows with a default user_id
       // DB::table('videos_documents')->update(['user_id' => 1]); // Assuming user with ID 1 exists
    
        Schema::table('videosDocument', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Add foreign key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('videosDocument', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Drop the foreign key constraint
            $table->dropColumn('user_id');    
        });
    }
};
