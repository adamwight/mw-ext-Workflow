<?php namespace Workflow\Tests;

use \MediaWikiTestCase;

use Workflow\StateMachineDescription;
use Workflow\StateMachine;

class BaseWorkflowTestCase extends MediaWikiTestCase {
	protected function setUp() {
		parent::setUp();

		$descriptionPath = __DIR__ . '/ennui_machine.yaml';

		$this->description = StateMachineDescription::loadFromFile( $descriptionPath );
		$this->machine = new StateMachine( $this->description );
	}
}
