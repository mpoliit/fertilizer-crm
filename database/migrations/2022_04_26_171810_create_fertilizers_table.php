<?php

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
        Schema::create('fertilizers', function (Blueprint $table) {
            $table->id();

            $table->string('title')->comment('Наименование');
            $table->float('azot')->nullable()->comment('Норма Азот');
            $table->float('phosphor')->nullable()->comment('Норма Фосфор');
            $table->float('potassium')->nullable()->comment('Норма Калий');
            $table->unsignedBigInteger('crop_id')->comment('Группа культур');
            $table->string('region')->nullable()->comment('Регион');
            $table->float('price')->comment('Стоимость');
            $table->text('description')->nullable()->comment('Описание');
            $table->string('purpose')->nullable()->comment('Назначение');

            $table->timestamps();
            $table->softDeletes();

            $table->index('crop_id', 'fertilizer_crop_idx');
            $table->foreign('crop_id', 'fertilizer_crop_fk')
                ->on('crops')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fertilizers');
    }
};
