<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Project;

class ProjectsTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->withoutExceptionHandling();

        $arr = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
        ];
        $this->post('/projects', $arr);

        $this->assertDatabaseHas('projects', $arr);

        $this->get('/projects')->assertSee($arr['title']);
    }

    public function test_user_can_view_project()
    {
        $this->withoutExceptionHandling();

        $project = Project::factory()->create();

        $this->get('/projects/' . $project->id)
            ->assertSee($project->title)
            ->assertSee($project->description);
    }
}
