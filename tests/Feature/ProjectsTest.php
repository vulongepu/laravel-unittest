<?php

namespace Tests\Feature;

use App\Models\User;
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
//    public function test_example_one()
//    {
//        $this->withoutExceptionHandling();
//
//        $arr = [
//            'title' => $this->faker->sentence,
//            'description' => $this->faker->paragraph,
//        ];
//        $this->post('/projects', $arr);
//
//        $this->assertDatabaseHas('projects', $arr);
//
//        $this->get('/projects')->assertSee($arr['title']);
//    }
//
//    public function test_user_can_view_project()
//    {
//        $this->withoutExceptionHandling();
//
//        $project = Project::factory()->create();
//
//        $this->get('/projects/' . $project->id)
//            ->assertSee($project->title)
//            ->assertSee($project->description);
//    }

    public function test_project_required_an_owner()
    {


        $attributes = Project::factory()->raw();

        $this->post('/projects', $attributes)->assertRedirect('login');
    }

     public function test_user_can_create_a_project()
     {
         $this->withoutExceptionHandling();

         $this->actingAs(User::factory()->create());
         $arr = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
        ];

         $this->post('/projects', $arr)->assertRedirect('/projects');

         $this->assertDatabaseHas('projects', $arr);

         $this->get('/projects')->assertSee($arr['title']);
     }
}
