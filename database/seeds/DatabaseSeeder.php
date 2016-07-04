<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carter = factory(App\User::class)->create(['name' => 'Carter', 'email' => 'carter.fort@gmail.com']);
        $christina = factory(App\User::class)->create(['name' => 'Christina', 'email' => 'christina.m.hoenig@gmail.com']);

        $giantEagle = factory(App\ListCategory::class)->create(['name' => 'Giant Eagle', 'type' => 'Store']);
        factory(App\ListCategory::class)->create(['name' => 'Lowes', 'type' => 'Store']);
        factory(App\ListCategory::class)->create(['name' => 'Target', 'type' => 'Store']);

        factory(App\ListCategory::class)->create(['name' => 'Grocery', 'type' => 'Type']);

        $lists = factory(App\ListContainer::class, 5)->create(['title' => 'Shopping List']);
        $lists->each(function($list) use($giantEagle) {
        	$list->addItems( factory(App\ListItem::class, 10)->make(['list_id' => $list->id]) );
	        $giantEagle->addList($list);
        });

        factory(App\Biller::class)->create([
            'name' => 'Duquesne Light',
            'summary' => 'Electricity'
        ]);

        factory(App\Biller::class)->create([
            'name' => 'PGH2O',
            'summary' => 'Water'
        ]);

        $rentBiller = factory(App\Biller::class)->create([
            'name' => 'Dina',
            'summary' => 'Rent',
            'auto_creates' => true,
            'auto_create_day' => 15,
            'auto_create_amount' => 300000
        ]);

        factory(App\Biller::class)->create([
            'name' => 'Verizon',
            'summary' => 'Internet'
        ]);

        factory(App\Biller::class)->create([
            'name' => 'People\'s Gas',
            'summary' => 'Gas'
        ]);

        factory(App\Chore::class)->create([
            'name' => 'Load the dishwasher',
            'summary' => 'Put any used dishes in the dishwasher. Hand-wash anything that needs to go in the drying rack',
            'repeats_every' => null,
            'best_time_to_do' => null
        ]);

        factory(App\Chore::class)->create([
            'name' => 'Empty the dishwasher',
            'summary' => 'Take the dishes out of the dish washer and put them into the cupboards',
            'repeats_every' => null,
            'best_time_to_do' => null
        ]);

        factory(App\Chore::class)->create([
            'name' => 'Empty the kitchen bins',
            'summary' => 'Take the garbage bags in the kitchen bins to the garage',
            'repeats_every' => null,
            'best_time_to_do' => null
        ]);

        factory(App\Chore::class)->create([
            'name' => 'Take the garbage out to the curb',
            'summary' => 'Take the garbage and recycling from the garage out to the curb',
            'repeats_every' => "Thursday",
            'best_time_to_do' => '17:00'
        ]);

        factory(App\BillApportionment::create([
            'biller_id' => $rentBiller->id,
            'user_id' => $christina->id,
            'percentage' => 40
        ]));

        factory(App\BillApportionment::create([
            'biller_id' => $rentBiller->id,
            'user_id' => $carter->id,
            'percentage' => 60
        ]));

    }
}
