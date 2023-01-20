<?php

use App\Models\Company;
use App\Models\MetricCategory;
use App\Models\MetricDocumentStatus;
use App\Models\MetricPeriod;
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
        Schema::create('metric_documents', function (Blueprint $table) {
            $table->id()->unique();
            $table->foreignIdFor(MetricDocumentStatus::class)->constrained();
            $table->foreignIdFor(Company::class)->constrained();
            $table->foreignIdFor(MetricCategory::class)->constrained();
            $table->foreignIdFor(MetricPeriod::class)->constrained();
            $table->integer('year');
            $table->integer('quarter');
            $table->integer('month');
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
        Schema::dropIfExists('metric_documents');
    }
};
