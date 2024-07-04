<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Logbook;
use Illuminate\Console\Command;

class FillEmptyLogbooks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fill-empty-logbooks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fill empty logbooks for the day';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today()->format('Y-m-d');
        $users = User::all();

        foreach ($users as $user) {
            $logbook = $user->logbook->where('tanggal', $today)->first();

            if ($logbook) {
                Logbook::create([
                    'user_id' => $user->id,
                    'tanggal' => $today,
                    'aktivitas' => 'Tidak ada aktivitas',
                    'bukti' => '',
                    'presensi' => 'bolos',
                    'status' => 'diterima',
                ]);
            }
        }

        $this->info('Empty logbooks filled.');
    }
}
