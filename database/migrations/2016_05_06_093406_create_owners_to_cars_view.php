<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnersToCarsView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW ownersToCarsView AS
            SELECT o.firstname, o.lastname, c.brand, c.model, c.number, c.in_garage
            FROM owners as o
            INNER JOIN owner_car as oc
                ON o.id = oc.owner_id
            INNER JOIN cars as c
                ON c.id = oc.car_id"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW ownersToCarsView");
    }
}
