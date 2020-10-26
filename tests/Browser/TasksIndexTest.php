<?php

namespace Tests\Browser;

use App\Task;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TasksIndexTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    // public function testIndex()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit('/tasks')
    //                 //->assertSeeLink('テストタスク')
    //                 //->clickLink('テストタスク')
    //                 //->waitForLocation('/tasks/2', 1)
    //                 ->assertPathIs('/tasks/2')
    //                 ->assertInputValue('#title', 'テストタスク');
    //     });
    // }
}
