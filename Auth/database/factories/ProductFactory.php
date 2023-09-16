<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [


        'product_name' =>$this->faker->productName,
        'product_code' =>$this->productCode,
        'details' => $this->faker->productDetails,
        'logo' =>$this->faker->logo,


        


    ];
});
