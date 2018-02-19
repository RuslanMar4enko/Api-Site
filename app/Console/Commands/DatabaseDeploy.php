<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class DatabaseDeploy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deploy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Makes first application settings';

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
        \Artisan::call('migrate');

        User::create([
            'name'=>'admin',
            'email'=>'admin@mail.com',
            'password'=>bcrypt('admin')
        ]);
    }
}
