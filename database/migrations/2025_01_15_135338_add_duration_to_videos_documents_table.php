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
                $table->integer('duration')->nullable(); // Add the 'duration' column as an integer (nullable)
            });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
            Schema::table('videosDocument', function (Blueprint $table) {
                $table->dropColumn('duration'); // Drop the 'duration' column if rolled back
            });
 
    }
};
