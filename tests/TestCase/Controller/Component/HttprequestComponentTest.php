<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\HttprequestComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\HttprequestComponent Test Case
 */
class HttprequestComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\HttprequestComponent
     */
    public $Httprequest;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Httprequest = new HttprequestComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Httprequest);

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
