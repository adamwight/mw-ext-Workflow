<?php namespace Workflow;

use \Exception;

class InvalidActionException extends Exception {
	function __construct( $action ) {
		parent::__construct();

		$this->message = wfMessage( 'workflow-invalid-action', $action )->text();
	}
}
