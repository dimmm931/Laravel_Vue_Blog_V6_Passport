<?php
//CONFIRM DELETE
//my Rest api token auth implementation (without Passport)

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateAuthToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'GenerateAuthToken'; //'make:token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates a new api client auth token to consume our api';


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
        //
        // Generate a new long token
        // Be sure to import Illuminate\Support\Str at the top
        $token = Str::random(60);

        // Delete existing tokens, maybe we lost the token
        // so we don't want existing ones floating around somewhere
        DB::table('api_clients')->whereNotnull('api_token')->delete();

        // Create a new entry with the hashed token value
        // so we don't store the token in plain text
        DB::table('api_clients')->insert([
            'api_token' => hash('sha256', $token),
        ]);

        // Spit out the token so we can use it
        $this->info($token);

        return 0;
    }
}
