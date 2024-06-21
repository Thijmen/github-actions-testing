<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Process;
class DevCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dev:init';

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
        if (empty(env('APP_KEY'))) {
            echo "Generating APP_KEY.\n";
            Artisan::call('key:generate');
        }
        // Seed database if it's empty
//        $settings = InstanceSettings::find(0);
//        if (! $settings) {
//            echo "Initializing instance, seeding database.\n";
//            Artisan::call('migrate --seed');
//        } else {
//            echo "Instance already initialized.\n";
//        }
        // Set permissions
        Process::run(['chmod', '-R', 'o+rwx', '.']);
    }
}
