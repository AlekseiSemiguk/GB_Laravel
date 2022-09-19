<?php

namespace Tests\Browser\Forms;

use App\Models\Feedback;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FeedbackTest extends DuskTestCase
{

    /**
     *
     * @return void
     */
    public function testVisitPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/contacts')
                ->assertSee('Обратная связь')
                ->assertSee('Ваше имя')
                ->assertSee('Ваши комментарии');
        });
    }

    /**
     *
     * @return void
     */
    public function testSendForm()
    {
        $feedback = Feedback::factory()->create();

        $this->browse(static function (Browser $browser) use($feedback) {
            $browser->visit('/contacts')
                ->type('name', $feedback->name)
                ->type('comments', $feedback->comments)
                ->press('Отправить')
                ->assertPathIs('/contacts');
        });
    }
}
