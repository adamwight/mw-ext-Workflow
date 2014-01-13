<?php

$messages = array();

$messages['en'] = array(
	'workflow-desc' => 'Provides process management',

	'workflow-busy-error' => 'Attempted to operate on a busy machine',
	'workflow-invalid-action' => 'Invalid action "$1"',
	'workflow-invalid-library' => 'Invalid library "$1"',
	'workflow-invalid-state' => 'Invalid state name "$1"',
	'workflow-invalid-transition' => 'No such transition "$2" out of state "$1"',
);

$messages['qqq'] = array(
	'workflow-desc' => '{{desc|name=Workflow|url=http://www.mediawiki.org/wiki/Extension:Workflow}}',

	'workflow-busy-error' => 'Error message thrown when a busy machine receives a signal or serialization is attempted.',
	'workflow-invalid-action' => 'Error message thrown when an invalid action is attempted. Parameters:
$1 - action name',
	'workflow-invalid-library' => 'Error message thrown if an invalid library load is attempted. Parameters:
$1 - library name',
	'workflow-invalid-state' => 'Error message thrown when an invalid state name is detected. Parameters:
$1 - state name',
	'workflow-invalid-transition' => 'Error message thrown when an invalid transition is attempted. Parameters:
$1 - state name
$2 - transition name',
);
