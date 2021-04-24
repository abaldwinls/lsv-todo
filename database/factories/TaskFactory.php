<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\Project;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        /**
         * User::all() could be resource intensive realistically 
         * but we only have a few users in this example
         */
        
        return [
            'estimated_hours' =>  $this->faker->numberBetween(1, 15),
            'task_assignee'=> User::all()->random()->id,
            'description' => $this->faker->sentence(5, true),
        ];
    }
    
    /**
     * Factory state for tasks belonging to
     * any 'E-Commerce Website' project
     *
     * @return array
     */
    public function eCommerceTasks()
    {
        $taskTitles = [
            'Product Pages',
            'Shopping Cart',
            'My Account'
        ];

        return $this->state([
            'project_id' => Project::where('project_name', 'like', 'E-Commerce Website')->get()->random()->id,
            'title' => $this->faker->unique()->randomElement($taskTitles),
        ]);
    }
    
    /**
     * Factory state for tasks belonging to
     * any 'Websocket Updates' project
     *
     * @return array
     */
    public function websocketUpdates()
    {

        $taskTitles = [
            'Add to Socket.IO',
            'Enable Broadcasting',
            'Adjust Interface'
        ];

        return $this->state([
            'project_id' => Project::where('project_name', 'like', 'Websocket Updates')->get()->random()->id,
            'title' => $this->faker->unique()->randomElement($taskTitles),
        ]);
    }
    
    /**
     * Factory state for tasks belonging to
     * any 'Angular Upgrade' project
     *
     * @return array
     */
    public function angularUpgrade()
    {
        $taskTitles = [
            'Upgrade Angular',
            'Fix Broken Things',
            'Test'
        ];

        return $this->state([
            'project_id' => Project::where('project_name', 'like', 'Angular Upgrade')->get()->random()->id,
            'title' => $this->faker->unique()->randomElement($taskTitles),
        ]);
    }
}
