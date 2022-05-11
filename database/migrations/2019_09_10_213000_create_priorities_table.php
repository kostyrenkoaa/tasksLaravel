<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use \Illuminate\Support\Facades\DB;

class CreatePrioritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('priorities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->unique();
        });

        DB::table('priorities')->insert($this->getData());
    }

    protected function getData(): array
    {
        return  [
            [
                'id' => 1,
                'title' => 'Низкий',
            ],
            [
                'id' => 2,
                'title' => 'Средний',
            ],
            [
                'id' => 3,
                'title' => 'Высокий',
            ],
        ];
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('priorities');
    }
}
