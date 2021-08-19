<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kriteria')->nullable();
            $table->string('kode')->nullable();
            $table->string('attribute')->nullable();
            $table->double('bobot')->default(0);
            $table->double('bobot_normalisasi')->default(0);
            $table->double('a_plus')->default(0);
            $table->double('a_min')->default(0);
            $table->timestamps();
        });

        Schema::create('sub_kriteria', function (Blueprint $table) {
            $table->id();
            $table->integer('kriteria_id')->unsigned();
            $table->string('nama')->nullable();
            $table->double('bobot')->default(0);
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
        Schema::dropIfExists('kriteria');
        Schema::dropIfExists('sub_kriteria');
    }
}
