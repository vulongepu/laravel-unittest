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

    public function test_guests_cannot_add_tasks_to_projects()
    {
        $project = Project::factory()->create();

        $this->post($project->path() . '/tasks')->assertRedirect('login');
    }

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

    public function test_the_owner_of_a_project_may_add_tasks()
    {
        $this->signIn();

        $project = Project::factory()->create();

        $this->post($project->path() . '/tasks', ['body' =>'Test Task' ])
            ->assertStatus(403);

        $this->assertDatabaseMissing('tasks', ['body' => 'Test Task']);
    }

    public function test_a_task_can_be_updated()
    {
        $this->signIn();

        $project = auth()->user()->projects()->create(
            Project::factory()->raw()
        );

        $task = $project->addTask('test task');

        $this->patch($project->path() . '/tasks/' . $task->id, [
            'body' => 'changed',
            'completed' => true
        ]);

        $this->assertDatabaseHas('tasks', [
            'body' => 'changed',
            'completed' => true
        ]);
    }
}
