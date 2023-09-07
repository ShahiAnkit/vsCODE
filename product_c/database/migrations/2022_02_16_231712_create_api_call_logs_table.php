<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiCallLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_call_logs', function (Blueprint $table) {
            $table->id();
            $table->string('request_call')->nullable();
            $table->longText('request_fields')->nullable();
            $table->integer("created_by")->nullable();
            $table->integer("updated_by")->nullable();
            $table->integer("deleted_by")->nullable();
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
        Schema::dropIfExists('api_call_logs');
    }
}
