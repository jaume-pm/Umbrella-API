<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\ConcertController;

class UpdateConcertDiscounts extends Command
{
    protected $signature = 'concert:update-discounts';
    protected $description = 'Update concert discounts hourly';

    protected $concertController;

    public function __construct(ConcertController $concertController)
    {
        parent::__construct();
        $this->concertController = $concertController;
    }

    public function handle()
    {
        try {
            $this->concertController->updateConcertDiscounts();
            $this->info('Concert discounts updated successfully.');
        } catch (\Exception $e) {
            $this->error('An error occurred: ' . $e->getMessage());
        }
    }
}
