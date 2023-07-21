<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Log;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ClearStorageCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clearstorage:cron';

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
        Log::info('Log successfully');
        Storage::deleteDirectory(public_path('storage/images/tmp'));
        // unlink(public_path('storage/img/tmp'));
        // File::deleteDirectory(public_path('storage/img/tmp'));
        File::deleteDirectories(public_path('storage/images/tmp'));
    }
}
