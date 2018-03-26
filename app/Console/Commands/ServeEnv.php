<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ServeEnv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'serve:env';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It serves the project on a specific host and port defined in .env';

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
        $host = env('SERVE_HOST');
        $port = env('SERVE_PORT');
        $this->call('serve',[
            '--host' => $host,
            '--port' => $port,
        ]);
    }
}