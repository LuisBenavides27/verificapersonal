<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class eliminar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Vamos a eliminar los token almacenados el dia de hoy';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::table('tokens')->delete();
    }
}
