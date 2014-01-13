<?php namespace Workflow\Library;

/**
 * Support UI flow elements
 */
class WikiPages
	implements IMachineLibrary
{
	function getActions() {
		return array(
			'redirect',
		);
	}

	function handleAction( IStateMachine $machine, $action, $params ) {
		switch ( $action ) {
		case 'redirect':
			$this->handle_redirect( $machine, $params );
			break;
		default:
			throw new InvalidActionException( $action );
		}
	}

	/**
	 * @param array $params (
	 *     string $titleVar - name of the configuration variable holding the target page title
	 * );
	 *
	 * TODO: whitelist page review status
	 */
	function handle_redirect( $machine, $params ) {
		list( $titleVar ) = $params;

		$output = RequestContext::getMain()->getOutput();
		$key = $machine->getValue( $titleVar );
		$url = Title::newFromText( $key )->getFullURL();
		$output->redirect( $url );
	}
}
