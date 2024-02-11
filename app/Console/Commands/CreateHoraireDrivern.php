<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\horire;
use App\Models\driver_taxi;
use App\Models\horaire_drivern;
use Illuminate\Console\Command;

class CreateHoraireDrivern extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-horaire-drivern';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
               $startDate = Carbon::now()->subWeek()->startOfWeek();
        $endDate = Carbon::now()->subWeek()->endOfWeek(); 
        $horires = horire::whereBetween('created_at', [$startDate, $endDate])->get();
        $driver=driver_taxi::all();
        if ($driver->count() > 0 && $horires->count() > 0) {
            foreach ($horires as $key => $value) {
                $driver = $driver->get($key % $driver->count());
                horaire_drivern::create([
                    'horaire' => $value->id,
                    'driver' => $driver->id,
                ]);
            }
        }
        
    }
}
