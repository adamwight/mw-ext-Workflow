<?php namespace Workflow\Tests;

use Workflow\IStateMachine;
use Workflow\Library\BaseMachineLibrary;

class DoorLibrary
	extends BaseMachineLibrary
{
	const DOOR_VAR = 'door_locked';

	protected $actions = array(
		'lock',
		'unlock',
	);

	function handle_lock( IStateMachine $machine ) {
		$machine->setValue( self::DOOR_VAR, true );
	}

	function handle_unlock( IStateMachine $machine ) {
		$machine->setValue( self::DOOR_VAR, false );
	}
}
