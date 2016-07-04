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

        $obligations = collect([]);

        foreach($users as $user)
        {
            $obligations = $obligations->merge($user->obligations);
        }

        //There should be three obligations between these three users
        $this->assertEquals(3, $obligations->count());

        //Each obligation should be 333
        $obligations->each(function($obligation){
            $this->assertEquals(333, $obligation->amount);
        });
    }

    /** @test */
    function it_honors_override_apportionments()
    {
    	$bill = factory(App\Bill::class)->create(['amount' => 300000]);
		$users = factory(App\User::class, 2)->create();
		
		factory(App\BillApportionment::class)->create([
			'user_id' => $users->first()->id,
			'biller_id' => $bill->biller->id,
			'percentage' => 40
		]);

		factory(App\BillApportionment::class)->create([
			'user_id' => $users[1]->id,
			'biller_id' => $bill->biller->id,
			'percentage' => 60
		]);

        $apportioner = new ApportionsBills($bill, $users);
        $apportioner->go();

        //180000 is 60% of 300000

        $this->assertEquals(180000, $users[1]->obligations->first()->amount);
    }

    /** @test
    * @expectedException App\Exceptions\InvalidApportionment
     */
    function it_throws_an_exception()
    {
        $bill = factory(App\Bill::class)->create(['amount' => 300000]);
        $users = factory(App\User::class, 2)->create();
        
        factory(App\BillApportionment::class)->create([
            'user_id' => $users->first()->id,
            'biller_id' => $bill->biller->id,
            'percentage' => 40
        ]);

        $apportioner = new ApportionsBills($bill, $users);
        $apportioner->go();
    }
}
