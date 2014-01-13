<?php namespace Workflow\Tests;

/**
 * @group Workflow
 */
class TestStateMachineDescription extends BaseWorkflowTestCase {

	function testLoadYamlDescription() {
		$this->assertNotNull( $this->description );
	}

	function testInitialState() {
		$this->assertEquals( 'inside', $this->description->getInitialState() );
	}

	function testGetTransitionsForState() {
		$this->assertEquals( array( 'walk', 'fidget' ), $this->description->getTransitionsForState( 'inside' ) );
	}

	function testGetDestinationState() {
		$this->assertEquals( 'at_threshold', $this->description->getDestinationState( 'inside', 'walk' ) );
	}

	function testGetExceptions() {
		$this->assertEquals( array( 'give_up' ), $this->description->getExceptions() );
	}

	function testGetActionsForState() {
		$this->assertEquals( array( 'lock' => null, 'signal' => 'turned_key' ), $this->description->getActionsForState( 'key_in_cylinder' ) );
		$this->assertSame( array(), $this->description->getActionsForState( 'at_liberty' ) );
	}

	function testGetConfigurationValue() {
		$this->assertSame( false, $this->description->getConfigurationValue( 'door_locked' ) );
	}
}
