<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\CheckAuthenComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\CheckAuthenComponent Test Case
 */
class CheckAuthenComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\CheckAuthenComponent
     */
    public $CheckAuthen;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->CheckAuthen = new CheckAuthenComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CheckAuthen);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
