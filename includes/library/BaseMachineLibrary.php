<?php namespace Workflow\Library;

use Workflow\InvalidActionException;
use Workflow\IStateMachine;

/**
 * Base class with default dispatch
 *
 * Subclasses should define an $actions member (or override getActions), and
 * a "handle_"- function for each action.
 */
class BaseMachineLibrary
	implements IMachineLibrary
{
	protected $actions = array();

	function handleAction( IStateMachine $machine, $action, $params ) {
		if ( !in_array( $action, $this->getActions() ) ) {
			throw new InvalidActionException( $action );
		}
		$func = "handle_{$action}";
		$this->$func( $machine, (array)$params );
	}

	function getActions() {
		return $this->actions;
	}
}
