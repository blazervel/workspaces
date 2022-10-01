<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workspace_user_invites', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->bigInteger('workspace_id');
            $table->bigInteger('invited_by');
            $table->string('email');
            $table->timestamp('accepted_at')->nullable();
            $table->bigInteger('accepted_by')->nullable();
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
        Schema::dropIfExists('workspace_user_invites');
    }
};
