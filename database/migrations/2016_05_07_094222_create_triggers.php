<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("DROP Trigger IF EXISTS `cars_au`");
        DB::connection()->getPdo()->exec("CREATE TRIGGER `cars_au` AFTER UPDATE ON `cars`
            FOR EACH ROW BEGIN
            INSERT INTO `logs` SET text = 'Cars updated', created_at = NOW();
            END"
        );

        DB::connection()->getPdo()->exec("DROP Trigger IF EXISTS `owners_au`");
        DB::connection()->getPdo()->exec("CREATE TRIGGER `owners_au` AFTER UPDATE ON `owners`
            FOR EACH ROW BEGIN
            INSERT INTO `logs` SET text = 'Owner updated', created_at = NOW();
            END"
        );

        DB::connection()->getPdo()->exec("DROP Trigger IF EXISTS `users_au`");
        DB::connection()->getPdo()->exec("CREATE TRIGGER `users_au` AFTER UPDATE ON `users`
            FOR EACH ROW BEGIN
            INSERT INTO `logs` SET text = 'User Logged out', created_at = NOW();
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
        DB::connection()->getPdo()->exec("DROP Trigger IF EXISTS `cars_au`");
        DB::connection()->getPdo()->exec("DROP Trigger IF EXISTS `owners_au`");
        DB::connection()->getPdo()->exec("DROP Trigger IF EXISTS `users_au`");
    }
}
