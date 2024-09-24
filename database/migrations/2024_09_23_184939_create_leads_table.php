<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('leads', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description')->nullable();
        $table->decimal('lead_value', 12, 2)->nullable();
        $table->boolean('status')->default(0);  // 0: Open, 1: Closed
        $table->text('lost_reason')->nullable();
        $table->timestamp('closed_at')->nullable();

        // Existing user and lead relationships
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('person_id')->nullable();  // Optional
        $table->unsignedBigInteger('lead_source_id');
        $table->unsignedBigInteger('lead_type_id');
        $table->unsignedBigInteger('lead_pipeline_id')->nullable();
        $table->unsignedBigInteger('lead_stage_id');

        // New: Add the assigned_user_id column
        $table->unsignedBigInteger('assigned_user_id')->nullable(); // Allow null if no one is assigned
        $table->foreign('assigned_user_id')->references('id')->on('users')->onDelete('set null'); // Foreign key reference to users

        // Foreign key constraints
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('lead_source_id')->references('id')->on('lead_sources')->onDelete('cascade');
        $table->foreign('lead_type_id')->references('id')->on('lead_types')->onDelete('cascade');
        $table->foreign('lead_pipeline_id')->references('id')->on('lead_pipelines')->onDelete('cascade');
        $table->foreign('lead_stage_id')->references('id')->on('lead_stages')->onDelete('cascade');

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
        Schema::dropIfExists('leads');
    }
}
