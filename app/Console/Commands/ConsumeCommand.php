<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ConsumeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'consume';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Consume rabbitmq messages';

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
        \Amqp::consume(
            'test',
            function ($message, $resolver) {

                var_dump($message->body);

                $resolver->acknowledge($message);
            },
            [
                'persistent' => true
            ]
        );
    }
}
