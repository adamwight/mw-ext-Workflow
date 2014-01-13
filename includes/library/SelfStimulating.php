<?php namespace Workflow\Library;

/**
 * Use this mixin to implement a machine which can send itself signals.  Without
 * this, control flow is always relinquished after entering a state.
 */
class SelfStimulating
	extends BaseMachineLibrary
{
	protected $actions = array(
		'signal',
	);

	/**
	 * @param array $params (
	 *     string $signal - name of the signal to send
	 * );
	 */
	function handle_signal( $machine, $params ) {
		list( $signal ) = $params;

		$machine->signal( $signal );
	}
}
