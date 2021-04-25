<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SyncTimeatable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:sync-timeatabel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cap nhat thoi khoa bieu';

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
        return 0;
    }
}
