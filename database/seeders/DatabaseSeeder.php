<?php

namespace Database\Seeders;

use App\Models\Leads;
use App\Models\LeadStatus;
use Database\Factories\LeadsFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        LeadStatus::create([
            'name' => 'Новый',
        ]);
        LeadStatus::create([
            'name' => 'В работе',
        ]);
        LeadStatus::create([
            'name' => 'Завершен',
        ]);
        Leads::factory()->count(60)->create();
    }
}
