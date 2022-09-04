<?php

namespace Tests\Browser\Forms;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class OrderTest extends DuskTestCase
{
    /**
     *
     * @return void
     */
    public function testVisitPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/make-order')
                ->assertSee('Новый заказ')
                ->assertSee('Ваше имя')
                ->assertSee('Ваш телефон')
                ->assertSee('Email')
                ->assertSee('Url-адрес')
                ->assertSee('Данные');
        });
    }
}
