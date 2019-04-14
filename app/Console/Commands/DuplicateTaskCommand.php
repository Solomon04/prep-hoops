<?php

namespace App\Console\Commands;

use App\Models\TodoItem;
use Illuminate\Console\Command;

class DuplicateTaskCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'duplicate:tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Replicate recurring tasks.';

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
        $todos = TodoItem::where('recurring', '=', true)->get();
        /** @var TodoItem $todo */
        foreach ($todos as $todo){
            $todo->duplicate();
        }
    }
}
