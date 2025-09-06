<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_returns_all_projects()
    {
        // Arrange: create 3 projects
        Project::factory()->count(3)->create();

        // Act: call the endpoint
        $response = $this->getJson('/api/projects');

        // Assert: correct structure and count
        $response->assertStatus(200)
                 ->assertJsonCount(3)
                 ->assertJsonStructure([
                     '*' => ['id', 'title', 'description', 'image_url', 'link', 'created_at', 'updated_at']
                 ]);
    }

    public function test_creates_a_project()
    {
        // Arrange: project data
        $data = [
            'title' => 'New Project',
            'description' => 'Project description',
            'image_url' => 'http://example.com/image.jpg',
            'link' => 'http://example.com'
        ];

        // Act: call the endpoint
        $response = $this->postJson('/api/projects', $data);

        // Assert: project created and correct response
        $response->assertStatus(201)
                 ->assertJson([
                     'title' => 'New Project',
                     'description' => 'Project description',
                     'image_url' => 'http://example.com/image.jpg',
                     'link' => 'http://example.com'
                 ]);
    }

    public function test_updates_a_project()
    {
        // Arrange: create a project
        $project = Project::factory()->create();

        // New data
        $data = [
            'title' => 'Updated Project',
            'description' => 'Updated description',
            'image_url' => 'http://example.com/updated_image.jpg',
            'link' => 'http://example.com/updated'
        ];

        // Act: call the endpoint
        $response = $this->putJson("/api/projects/{$project->id}", $data);

        // Assert: project updated and correct response
        $response->assertStatus(200)
                 ->assertJson([
                     'title' => 'Updated Project',
                     'description' => 'Updated description',
                     'image_url' => 'http://example.com/updated_image.jpg',
                     'link' => 'http://example.com/updated'
                 ]);
    }

    public function test_deletes_a_project()
    {
        // Arrange: create a project
        $project = Project::factory()->create();

        // Act: call the endpoint
        $response = $this->deleteJson("/api/projects/{$project->id}");

        // Assert: project deleted and correct response
        $response->assertStatus(204);

        // Check if the project no longer exists
        $this->assertDatabaseMissing('projects', ['id' => $project->id]);
    }

    public function test_returns_404_for_nonexistent_project()
    {
        // Act: call the endpoint with a non-existent project ID
        $response = $this->getJson('/api/projects/999');

        // Assert: 404 status
        $response->assertStatus(404);
    }

    public function test_validation_errors()
    {
        // Act: call the endpoint with invalid data
        $response = $this->postJson('/api/projects', []);

        // Assert: validation errors
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['title', 'description']);
    }

}
