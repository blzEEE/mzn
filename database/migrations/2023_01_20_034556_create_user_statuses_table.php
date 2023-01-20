<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    static $statuses = [
        ['id' => 1, 'name' => 'Активный'],
        ['id' => 2, 'name' => 'Заблокированный'],
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_statuses', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('name');

            $table->unique('id');
        });

        foreach(self::$statuses as $status){
            DB::table('user_statuses')->insert($status);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_statuses');
    }
};
