<?php namespace Workflow\Library;

use Workflow\IStateMachine;

/**
 * Container for any PHP code that will be executed by a workflow.
 *
 * Multiple libraries can be mixed into a workflow.
 *
 * A library should not manage any data internally, but the machine context can
 * be used for static storage.
 */
interface IMachineLibrary {
	/**
	 * @return array list of actions provided by this library
	 */
	function getActions();

	/**
	 * Dispatch an action to this library
	 *
	 * @param IStateMachine $machine 
	 * @param string $action name of action to be dispatched
	 * @param array $params Map or list of arguments.  It is recommended to always
	 * pass references to configuration and context variable names, rather than raw
	 * string constant data.
	 */
	function handleAction( IStateMachine $machine, $action, $params );
}
