<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $project = Project::query()->inRandomOrder()->first();

        return [
            'project_id' => $this->faker->boolean ? ($project->id ?? Project::factory()) : Project::factory(),
            'body' => $this->faker->sentence
        ];
    }
}
