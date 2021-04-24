<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $projects = [
            'E-Commerce Website',
            'Websocket Updates',
            'Angular Upgrade'
        ];

        return [
            'project_name' => $this->faker->unique()->randomElement($projects),
        ];
    }
}
