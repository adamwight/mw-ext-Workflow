<?php namespace Workflow;

use \Exception;

class InvalidLibraryException extends Exception {
	function __construct( $library ) {
		parent::__construct();

		$this->message = wfMessage( 'workflow-library-action', $library )->text();
	}
}
