<?php

namespace App\Console\Commands\Billing;

use App\Biller;
use Illuminate\Console\Command;

class AutoCreateBills extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'billing:auto-create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks to see if any bills need to be auto-created this month';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $today = date('d');
        Biller::autoCreatesOnDay($today)
            ->get()
            ->each(function($biller){
                $biller->createBillForThisMonth();
            });
    }
}
