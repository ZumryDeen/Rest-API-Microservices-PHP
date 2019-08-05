<?php

namespace App\Console\Commands;

use App\Services\QueryService;
use Illuminate\Console\Command;

class QuearyWeatherStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getAll:stat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */


    protected $qryService ;


    public function __construct(QueryService $qryService)
    {

        $this->qryService = $qryService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Query started');

        try{
            $this->qryService->queryAll();

        } catch (\Exception $exception){
            $this->error($exception->getMessage());
            return 1;

        }

        $this->info('query End');

        //
    }
}
