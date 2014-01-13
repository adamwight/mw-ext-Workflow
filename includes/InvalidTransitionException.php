<?php namespace Workflow;

use \Exception;

class InvalidTransitionException extends Exception {
	function __construct( $state, $transition ) {
		parent::__construct();

		$this->message = wfMessage( 'workflow-invalid-transition', $state, $transition )->text();
	}
}
