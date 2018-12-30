<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimonialsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'testimonials';

    /**
     * Run the migrations.
     * @table testimonials
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('title', 100);
            $table->string('text')->nullable();
            $table->integer('period_id');

            $table->index(["period_id"], 'fk_testimonials_1_idx');

            $table->index(["user_id"], 'fk_testimonials_2_idx');
        });

        Schema::table($this->set_schema_table, function ($table) {
            $table->foreign('user_id', 'fk_testimonials_2_idx')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('period_id', 'fk_testimonials_1_idx')
                ->references('id')->on('period')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
