<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Luigel\Paymongo\Facades\Paymongo;

class CreatePaymongoWebhook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'paymongo-webhook:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a webhook';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        try {
            Paymongo::webhook()->create([
                'url' => route(config('services.paymongo.webhook_url')),
                'events' => [
                    'source.chargeable'
                ]
            ]);

            $this->info('Webhook successfully created.');
        } catch (\Exception $exception) {
            $this->info('Error creating webhook ' . $exception->getMessage());
        }
    }
}
