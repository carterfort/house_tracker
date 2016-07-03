<?php

use App\Billing\ApportionsBills;

class ApportionmentTest extends TestCase
{
    /** @test **/
    public function it_evenly_divides_between_users()
    {
        $bill = factory(App\Bill::class)->create(['amount' => 1000]);
		$users = factory(App\User::class, 3)->create();

        $apportioner = new ApportionsBills($bill, $users);
        $apportioner->go();

        //This bill should be equally apportioned among the users
        $this->assertEquals(3, $bill->obligations->count());
    }

    /** @test */
    function it_honors_override_apportionments()
    {
    	$bill = factory(App\Bill::class)->create(['amount' => 1000]);
		$users = factory(App\User::class, 2)->create();
		
		factory(App\BillApportionment::class)->create([
			'user_id' => $users->first()->id,
			'biller_id' => $bill->biller->id,
			'percentage' => 35
		]);

        $apportioner = new ApportionsBills($bill, $users);
        $apportioner->go();

        dd($bill->obligations->toArray());
    }
}
