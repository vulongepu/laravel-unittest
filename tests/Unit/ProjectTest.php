<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class ProjectTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_it_has_a_path()
    {
        $project = Project::factory()->create();

        $this->assertEquals('/projects/' . $project->id, $project->path());
    }

    public function test_it_belongs_to_an_owner()
    {
        $project = Project::factory()->create();

        $this->assertInstanceOf('App\Models\User', $project->owner);
    }

    public function test_it_add_a_task()
    {
        $project = Project::factory()->create();

        $task = $project->addTask('Test Task');

        $this->assertCount(1, $project->tasks);

        $this->assertTrue($project->tasks->contains($task));
    }
}
