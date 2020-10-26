<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TaskControllerTest extends TestCase
{

    use DatabaseTransactions;
    
    public function testGetAllTasksPath(){
    
        $response = $this->get('/tasks');

        $response->assertStatus(200);
    }

    public function testGetTasksPath(){
    
        $response = $this->get('/tasks/1');

        $response->assertStatus(200);
    }

    public function testPutTaskPath(){

        $data = [
            'title' => 'test title',
        ];
        
        $this->assertDatabaseMissing('tasks', $data);

        $response = $this->put('/tasks/1', $data);

        $response->assertStatus(302)
            ->assertRedirect('/tasks/1');

        $this->assertDatabaseHas('tasks', $data);
    }

    public function testPutTaskPath2(){
    
        $data = [
            'title' => 'テストタスク2',
            'executed' => true,
        ];
        $this->assertDatabaseMissing('tasks', $data);

        $response = $this->put('/tasks/2', $data);

        $response->assertStatus(302)
            ->assertRedirect('/tasks/2');

        $this->assertDatabaseHas('tasks', $data);
    }

    //存在しないIDが指定された時
    public function testGetTaskPathNotExists(){

        $response = $this->get('task/0');

        $response->assertStatus(404);
    }
}
