<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msgroup', function (Blueprint $table) {
            $table->id();
            $table->Integer('userId');
            $table->String('groupName');
            $table->Integer('historyId');
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
        Schema::dropIfExists('tr_group');
    }
}
