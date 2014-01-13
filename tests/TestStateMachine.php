<?php namespace Workflow\Tests;

/**
 * @group Workflow
 */
class TestStateMachine extends BaseWorkflowTestCase {

	protected function setUp() {
		parent::setUp();

		$this->machine->begin();
	}

	function testInitialState() {
		$this->assertEquals( 'inside', $this->machine->getState() );
	}

	function testTransition() {
		$this->machine->signal( 'walk' );

		$this->assertEquals( 'at_threshold', $this->machine->getState() );
	}

	/**
	 * @expectedException Workflow\InvalidTransitionException
	 */
	function testInvalidTransition() {
		$this->machine->signal( 'bogon' );
	}

	function testExceptionSignal() {
		$this->machine->signal( 'give_up' );

		$this->assertEquals( 'trapped', $this->machine->getState() );
	}

	function testConfiguration() {
		$this->assertSame( false, $this->machine->getValue( 'door_locked' ) );
	}

	function testAction() {
		$this->machine->signal( 'walk' );
		$this->machine->signal( 'use_key' );

		$this->assertEquals( true, $this->machine->getValue( 'door_locked' ) );
	}

	function testCompletion() {
		$this->machine->signal( 'walk' );
		$this->machine->signal( 'open_door' );
		$this->machine->signal( 'exit' );

		$this->assertTrue( $this->machine->isFinished() );
	}
}
