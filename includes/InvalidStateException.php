<?php namespace Workflow;

use \Exception;

class InvalidStateException extends Exception {
	function __construct( $state ) {
		parent::__construct();

		$this->message = wfMessage( 'workflow-invalid-state', $state )->text();
	}
}
