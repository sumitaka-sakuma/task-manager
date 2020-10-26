<?php

namespace Tests\Feature;

use App\Task;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TaskControllerTest extends TestCase
{

    use RefreshDatabase;

    private $task;

    protected function setUp(){
    
        parent::setUp();
        $this->task = Task::create([
            'title' => 'テストタスク',
            'executed' => false,
        ]);
    }
    
    public function testGetAllTasksPath(){
    
        $response = $this->get('/tasks');

        $response->assertStatus(200);
    }

    public function testGetTasksPath(){
    
        $response = $this->get('/tasks/' . $this->task->id);

        $response->assertStatus(200);
    }

    public function testPutTaskPath(){

        $data = [
            'title' => 'test title',
        ];

        $this->assertDatabaseMissing('tasks', $data);

        $response = $this->put('/tasks/' . $this->task->id, $data);

        $response->assertStatus(302)
            ->assertRedirect('/tasks/' . $this->task->id);

        $this->assertDatabaseHas('tasks', $data);
    }

    public function testPutTaskPath2(){
    
        $data = [
            'title' => 'テストタスク2',
            'executed' => true,
        ];
        $this->assertDatabaseMissing('tasks', $data);

        $response = $this->put('/tasks/' . $this->task->id, $dataa);

        $response->assertStatus(302)
            ->assertRedirect('/tasks/' . $this->task->id);

        $this->assertDatabaseHas('tasks', $data);
    }

    //存在しないIDが指定された時
    public function testGetTaskPathNotExists(){

        $response = $this->get('task/0');

        $response->assertStatus(404);
    }
}
