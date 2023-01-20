<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    static $roles = [
        ['id' => 1, 'name' => 'Администратор'],
        ['id' => 2, 'name' => 'Администратор организации'],
        ['id' => 3, 'name' => 'Пользователь']
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('name');

            $table->unique('id');
        });


        foreach(self::$roles as $role){
            DB::table('user_roles')->insert($role);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_roles');
    }
};
