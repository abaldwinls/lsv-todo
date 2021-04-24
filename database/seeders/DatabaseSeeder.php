<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //add users
        \App\Models\User::factory(4)->create();

        //projects
        \App\Models\Project::factory(3)->create();


        //tasks -- called separately to get specific task name association
        $count = 3; //every example project has 3 tasks
        $i = 0;

        while($i < 3){

            $eCommerceTasks = \App\Models\Task::factory()->eCommerceTasks()->create();
            $websocketTasks = \App\Models\Task::factory()->websocketUpdates()->create();
            $angularUpgradeTasks = \App\Models\Task::factory()->angularUpgrade()->create();

            $i++;
        }
        
    }
}
