<?php

use App\Models\Company;
use App\Models\UserRole;
use App\Models\UserStatus;
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
        Schema::table('users', function (Blueprint $table) {
            $table->unique('id');
            $table->foreignIdFor(Company::class)->after('id')->constrained();
            $table->foreignIdFor(UserRole::class)->after('company_id')->constrained();
            $table->foreignIdFor(UserStatus::class)->after('user_role_id')->constrained();
            $table->string('surname')->after('user_status_id');
            $table->string('secname')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['id']);
            $table->dropConstrainedForeignIdFor(Company::class);
            $table->dropConstrainedForeignIdFor(UserRole::class);
            $table->dropConstrainedForeignIdFor(UserStatus::class);
            $table->dropColumn('surname');
            $table->dropColumn('secname');
        });
    }
};
