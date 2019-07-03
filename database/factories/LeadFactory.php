<?php

use Faker\Generator as Faker;
use App\Lead;

$factory->define(Lead::class, function (Faker $faker) {
    return [
            'id_entity'=>1,
            'id_condicion_pago'=>1,
            'id_giro'=>1,
            'codigo_lead'=> $faker->name,
            'nombre_lead'=> $faker->name,
            'apellido_lead'=> $faker->lastname,
            'razon_social'=> $faker->name,
            'rfc'=> $faker->name,
            'email' => $faker->unique()->safeEmail,
            'contacto_lead'=> $faker->name,
            'obs_lead'=> $faker->sentence,
            'id_status'=> 1,
    	];
});
