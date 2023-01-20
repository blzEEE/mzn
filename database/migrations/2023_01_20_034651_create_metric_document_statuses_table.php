<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    static $statuses = [
        ['id' => 1, 'name' => 'Черновик'],
        ['id' => 2, 'name' => 'Подтвержден'],
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metric_document_statuses', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('name');
            
            $table->unique('id');
        });

        foreach(self::$statuses as $status){
            DB::table('metric_document_statuses')->insert($status);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metric_document_statuses');
    }
};
