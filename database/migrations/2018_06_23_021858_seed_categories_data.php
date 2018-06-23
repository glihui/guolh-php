<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = [
          [
              'name' => '编程',
              'description' => '技术改变世界，成就梦想',
          ],
          [
              'name' => '读书',
              'description' => '读书，净化心灵，丰富内涵',
          ],
          [
              'name' => '健身',
              'description' => '健身，强身健体',
          ],
          [
              'name' => '旅游',
              'description' => '世界这么大，我要出去看看',
          ],
        ];

        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->truncate();
    }
}
