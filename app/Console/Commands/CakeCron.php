<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Success;
class CakeCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Payment Command Executed Succesfully!';

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
     * @return int
     */
    public function handle()
    {
        \Log::info("Payment Cron execution!");

        Success::where('status', 0 )
        ->update([
            'status' =>  3
        ]);

        $this->info('Payment:Cron Command is working fine!');
    }
}
