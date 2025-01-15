<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videosDocument', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('title'); // Video title
            $table->string('file_path'); // Path to the video file
            $table->text('description')->nullable(); // Video description (optional)
            $table->string('thumbnail')->nullable(); 
            $table->integer('views')->default(0); // View count (optional)
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videosDocument');
    }
}
