<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNormalisasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('keputusan', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('alternatif_id')->unsigned();
          $table->integer('kriteria_id')->unsigned();
          $table->integer('sub_kriteria_id')->unsigned();
          $table->double('bobot_kriteria')->default(0);
          $table->double('bobot_sub_kriteria')->default(0);
          $table->double('r_hasil')->default(0);
          $table->double('normalisasi_berbobot_hasil')->default(0);

          //
          $table->timestamps();
      });

        Schema::create('normalisasi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('alternatif_id')->unsigned();
            $table->integer('kriteria_id')->unsigned();
            $table->string('jenis')->nullable();
            $table->double('nilai')->default(0);
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
        Schema::dropIfExists('normalisasi');
        Schema::dropIfExists('keputusan');
    }
}
