<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsfeatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msfeature', function (Blueprint $table) {
            $table->id();
            $table->String('FeatureName');
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
        Schema::dropIfExists('msfeature');
    }
}
