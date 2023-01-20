<?php

use App\Models\Metric;
use App\Models\MetricDocument;
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
        Schema::create('metric_document_values', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MetricDocument::class)->constrained();
            $table->foreignIdFor(Metric::class)->constrained();
            $table->float('value', 10, 2);
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
        Schema::dropIfExists('metric_document_values');
    }
};
