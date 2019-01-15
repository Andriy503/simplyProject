<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\SiteAuthComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\SiteAuthComponent Test Case
 */
class SiteAuthComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\SiteAuthComponent
     */
    public $SiteAuth;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->SiteAuth = new SiteAuthComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SiteAuth);

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
