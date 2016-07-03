<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/


$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Bill::class, function (Faker\Generator $faker) {
    return [
        'biller_id' => function(){
            return factory(App\Biller::class)->create()->id;
        },
        'amount' => $faker->numberBetween(100, 10000)
    ];
});

$factory->define(App\BillPayment::class, function (Faker\Generator $faker) {
    return [
    	'user_id' => function(){
    		return factory(App\User::class)->create()->id;
    	},
    	'bill_id' => function(){
    		return factory(App\Bill::class)->create()->id;
    	}
    ];
});

$factory->define(App\Biller::class, function(Faker\Generator $faker){
    return [
        'name' => $faker->name,
        'summary' => implode(' ', $faker->words(10)),
        'phone_number' => $faker->phoneNumber,
        'website_url' => $faker->url
    ];
});

$factory->define(App\ListContainer::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
    ];
});

$factory->define(App\ListItem::class, function (Faker\Generator $faker) {
    return [
    	'title' => $faker->text(25),
    	'summary' => $faker->text,
        'list_id' => function(){
        	return factory(App\ListContainer::class)->create()->id;
        }
    ];
});

$factory->define(App\ListCategory::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Chore::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'summary' => $faker->text,
        'repeats_every' => 'Week',
        'best_time_to_do' => 'Morning'
    ];
});

$factory->define(App\Project::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'summary' => $faker->text,
        'owner_id' => function(){
        	return factory(App\User::class)->create()->id;
        }
    ];
});

$factory->define(App\BillApportionment::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function(){
            return factory(App\User::class)->create()->id;
        },
        'biller_id' => function(){
            return factory(App\Biller::class)->create()->id;
        },
        'percentage' => 50
    ];
});