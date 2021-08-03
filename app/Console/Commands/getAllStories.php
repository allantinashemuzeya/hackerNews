<?php

namespace App\Console\Commands;

use App\Exceptions\CannotSaveToModel;
use App\Http\Services\Stories\ItemsActions;
use Illuminate\Console\Command;
use Symfony\Component\HttpFoundation\Exception\JsonException;

class getAllStories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getAllStories';

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
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     * @throws JsonException|\JsonException
     * @throws CannotSaveToModel
     */
    public function handle(): void
    { (new ItemsActions)->getBestStories();
        (new ItemsActions)->getAskStories();
        (new ItemsActions)->getJobStories();
        (new ItemsActions)->getShowStories();
        (new ItemsActions)->getNewStories();
        (new ItemsActions)->getTopStories();
        (new ItemsActions)->comments();


    }
}
