<?php namespace Workflow\Library;

/**
 * Supports subtasks which are themselves a state machine
 */
class MachineHierarchy
	implements IMachineLibrary
{
	protected $actions = array(
		'submachine',
	);

	function handle_submachine( IStateMachine $machine, $params ) {
		// TODO design. message passing.
	}
}
