<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Project;

class ProjectTest extends TestCase
{
    public function test_fillable_attributes()
    {
        $project = new Project();
        $this->assertEquals(
            ['title', 'description', 'image_url', 'link'],
            $project->getFillable()
        );
    }
}
