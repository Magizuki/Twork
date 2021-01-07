<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrFeatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_feature', function (Blueprint $table) {
            $table->id();
            $table->Integer('featureId');
            $table->Integer('groupId');
            $table->String('AuditUsername');
            $table->datetime('AuditTime');
            $table->char('AuditActivity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_feature');
    }
}
