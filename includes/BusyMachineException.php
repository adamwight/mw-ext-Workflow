<?php namespace Workflow;

use \Exception;

class BusyMachineException extends Exception {
	function __construct() {
		parent::__construct();

		$this->message = wfMessage( 'workflow-busy-error' )->text();
	}
}
