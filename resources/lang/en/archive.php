<?php

return [
    'cars'          => [
        'index'         => 'Cars Archive',
        'fields'        => [
            'id'            => 'ID',
            'brand'         => 'Brand',
            'model'         => 'Model',
            'number'        => 'Number',
            'in_garage'     => 'In Garage',
            'created_at'    => 'Created At',
            'updated_at'    => 'Updated At',
            'deleted_at'    => 'Deleted At',
        ],
    ],
    'owners'          => [
        'index'         => 'Owners Archive',
        'fields'        => [
            'id'            => 'ID',
            'firstname'     => 'Firstname',
            'lastname'      => 'Lastname',
            'email'         => 'E-mail',
            'created_at'    => 'Created At',
            'updated_at'    => 'Updated At',
            'deleted_at'    => 'Deleted At',
        ],
    ],
];
