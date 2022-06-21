<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\FullcalendarController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\FullcalendarController Test Case
 *
 * @uses \App\Controller\FullcalendarController
 */
class FullcalendarControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Fullcalendar',
    ];
}
