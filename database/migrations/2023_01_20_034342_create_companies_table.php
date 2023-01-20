<?php

use App\Models\Region;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('companies', function (Blueprint $table) {
            $table->id()->unique();
            $table->foreignIdFor(Region::class)->constrained();
            $table->string('city');
            $table->string('name');
            $table->string('address');
            $table->string('director_position');
            $table->string('director_name');
            $table->boolean('competitive');
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
        Schema::dropIfExists('companies');
    }
};
