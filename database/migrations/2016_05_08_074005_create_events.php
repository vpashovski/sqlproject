<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("DROP EVENT IF EXISTS `archive`");
        DB::connection()->getPdo()->exec("CREATE EVENT `archive` ON SCHEDULE EVERY 1 DAY STARTS '2016-01-01 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
            INSERT INTO `car_archives` (`id`, `brand`, `model`, `number`, `image_id`, `in_garage`, `created_at`, `updated_at`, `deleted_at`)
            SELECT `id`, `brand`, `model`, `number`, `image_id`, `in_garage`, `created_at`, `updated_at`, `deleted_at` FROM `cars` WHERE `deleted_at` IS NOT NULL;
            DELETE FROM `cars` WHERE `deleted_at` IS NOT NULL;
            INSERT INTO `owner_archives` (`id`, `firstname`, `lastname`, `email`, `image_id`, `created_at`, `updated_at`, `deleted_at`)
            SELECT `id`, `firstname`, `lastname`, `email`, `image_id`, `created_at`, `updated_at`, `deleted_at` FROM `owners` WHERE `deleted_at` IS NOT NULL;
            DELETE FROM `owners` WHERE `deleted_at` IS NOT NULL;
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
        DB::connection()->getPdo()->exec("DROP EVENT IF EXISTS `archive`");
    }
}
