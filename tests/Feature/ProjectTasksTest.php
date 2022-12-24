<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;

class ProjectTasksTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_project_can_have_tasks()
    {
        $this->signIn();

        $project = auth()->user()->projects()->create(
            Project::factory()->raw()
        );

        $this->post($project->path() . '/tasks', ['body' => 'Lolem congchua'] );

        $this->get($project->path())->assertSee('Lolem congchua');
    }

    public function test_requires_a_body()
    {
        $this->signIn();

        $project = auth()->user()->projects()->create(
            Project::factory()->raw()
        );

        $attributes = Task::factory()->create(['body' => ''])->toArray();

//        dd($attributes);

//        $this->actingAs($project->user)
//            ->post($project->path() . '/tasks', $attributes)
//            ->assertSessionHasErrors('body');

        $this->post($project->path() . '/tasks', $attributes)->assertSessionHasErrors('body');
    }
}
