<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    static $periods = [
        ['id' => 1, 'name' => 'Год', "system_name" => "year"],
        ['id' => 2, 'name' => 'Квартал', "system_name" => "quarter"],
        ['id' => 3, 'name' => 'Месяц', "system_name" => "month"]
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metric_periods', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('name');
            $table->string('system_name');

            $table->unique('id');
        });

        foreach(self::$periods as $period){
            DB::table('metric_periods')->insert($period);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metric_periods');
    }
};
