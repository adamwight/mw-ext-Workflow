<?php namespace Workflow;

class Hooks {
	static function onUnitTestsList( array& $files ) {
		$dir = __DIR__ . '/tests';
		$files[] = $dir . '/TestStateMachine.php';
		$files[] = $dir . '/TestStateMachineDescription.php';

		return true;
	}
}
