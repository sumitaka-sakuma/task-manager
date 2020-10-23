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

    //存在しないIDが指定された時
    public function testGetTaskPathNotExists(){

        $response = $this->get('task/0');

        $response->assertStatus(404);
    }
}
