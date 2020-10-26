<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TaskDetailTest extends DuskTestCase
{
    
    public function testShowDetail(){
    
        $this->browse(function (Browser $browser) {
            $browser->visit('/tasks/2')
                    ->assertInputValue('#title', 'テストタスク')
                    ->screenshot("task_detail");
        });
    }

    public function testPost(){

        $this->browse(function (Browser $browser) {
            $browser->visit('/tasks/2')
                ->assertInputValue('#title', 'テストタスク')
                ->type('#title', 'test task')
                ->screenshot('task_post_typed')
                ->press('更新')
                ->pause(1000)
                ->assertPathIs('/tasks/2')
                ->screenshot('task_post_pressed');
        });
    }

}
