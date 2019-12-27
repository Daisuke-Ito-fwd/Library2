<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GraphDataMigrate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('graphData', function (Blueprint $table) {
            $table->bigInteger('dataId');
            $table->date('startDate');
            $table->date('endDate');   
            $table->float('ave', 3, 1);
            $table->float('max', 3, 1);
            $table->float('min', 3, 1);
            $table->float('dayTime', 3, 1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}


// LOAD DATA LOCAL INFILE "/Users/伊藤太亮/Desktop/気温データ カンマ区切り.csv"
// INTO TABLE graphdata 
// FIELDS TERMINATED BY ','
// OPTIONALLY ENCLOSED BY '"';