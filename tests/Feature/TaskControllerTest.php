<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskControllerTest extends TestCase
{
    
    public function testGetAllTasksPath(){
    
        $response = $this->get('/tasks');

        $response->assertStatus(200);
    }

    public function testGetTasksPath(){
    
        $response = $this->get('/tasks/1');

        $response->assertStatus(200);
    }
}
