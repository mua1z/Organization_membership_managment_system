<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Organization Plans
        Plan::create(['name' => 'Basic', 'price' => 0, 'billing_cycle' => 'free', 'max_members' => 5, 'type' => 'organAdmin']);
        Plan::create(['name' => 'Pro', 'price' => 25, 'billing_cycle' => 'monthly', 'max_members' => 500, 'type' => 'organAdmin']);
        Plan::create(['name' => 'Enterprise', 'price' => 50, 'billing_cycle' => 'yearly', 'max_members' => 5000, 'type' => 'organAdmin']);

        // Member Plans
        Plan::create(['name' => 'Basic', 'price' => 0, 'billing_cycle' => 'free', 'duration_days' => 5, 'type' => 'member']);
        Plan::create(['name' => 'Pro', 'price' => 25, 'billing_cycle' => 'monthly', 'duration_days' => 30, 'type' => 'member']);
        Plan::create(['name' => 'Enterprise', 'price' => 50, 'billing_cycle' => 'yearly', 'duration_days' => 365, 'type' => 'member']);
    }
}
