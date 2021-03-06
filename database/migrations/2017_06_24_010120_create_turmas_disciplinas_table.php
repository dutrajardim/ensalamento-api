<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurmasDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplinas_turmas', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('turmas_id')->unsigned()->nullable();
            $table->foreign('turmas_id')
                ->references('id')
                ->on('turmas')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('disciplinas_id')->unsigned()->nullable();
            $table->foreign('disciplinas_id')
                ->references('id')
                ->on('disciplinas')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('alunos_qtd');
            $table->smallInteger('ano')->unsigned();
            $table->enum('semestre', ['1','2']);

            $table->unique(['turmas_id', 'disciplinas_id']);
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
        Schema::dropIfExists('disciplinas_turmas');
    }
}
