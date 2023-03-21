<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AutoDeleteDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       // return Command::SUCCESS;
        DB::table('nombre_de_la_tabla')->where('created_at', '<', Carbon::now()->subMicroseconds(50000))->delete();
       // DB::table('tokens')->where('created_at', '<', Carbon::now()->subMinutes(5))->delete();
    }
}
