<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoredProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("CREATE PROCEDURE `getOwners`(IN `fname` VARCHAR(20) CHARSET utf8)
            BEGIN
                SELECT * FROM owners as o
                WHERE o.firstname LIKE CONCAT('%', fname, '%') COLLATE utf8_general_ci;
            END"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec("DROP PROCEDURE IF EXISTS `getOwners`");
    }
}
