<?php

namespace Database\Seeders;

use App\Models\Monitoring;
use Illuminate\Contracts\Queue\Monitor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MonitoringSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Monitoring::query()
            ->updateOrCreate(
                [
                    "id" => 1
                ],
                [
                    'status_pakan' => 0
                ]
            );
    }
}
