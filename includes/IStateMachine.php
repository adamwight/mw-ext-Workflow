<?php namespace Workflow;

/**
 * 
 */
interface IStateMachine {
	/**
	 * Start the machine in its initial state.  Run any actions on that state.
	 */
	function begin();

	/**
	 * Send this object a signal, causing a transition to begin
	 */
	function signal( $name );

	/**
	 * Doing something atomic?
	 *
	 * @return bool true if there is a transition in progress, or the machine
	 * is being serialized.  I pity the foo who messes with a busy job.
	 */
	function isBusy();

	/**
	 * @return bool true when there are no transitions out of the current state
	 */
	function isFinished();
}
