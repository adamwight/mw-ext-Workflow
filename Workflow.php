<?php

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'Workflow',
	'author' => array(
		'Adam Roses Wight',
	),
	'version' => '0.1',
	'url' => 'https://www.mediawiki.org/wiki/Extension:Workflow',
	'descriptionmsg' => 'workflow-desc',
);

$dir = __DIR__;

$wgExtensionMessagesFiles['Workflow'] = $dir . '/Workflow.i18n.php';

$wgAutoloadClasses['Workflow\Hooks'] = $dir . '/Workflow.hooks.php';

$includedir = __DIR__ . '/includes/';
$wgAutoloadClasses['Workflow\BusyMachineException'] = $includedir . 'BusyMachineException.php';
$wgAutoloadClasses['Workflow\Context'] = $includedir . 'Context.php';
$wgAutoloadClasses['Workflow\InvalidActionException'] = $includedir . 'InvalidActionException.php';
$wgAutoloadClasses['Workflow\InvalidLibraryException'] = $includedir . 'InvalidLibraryException.php';
$wgAutoloadClasses['Workflow\InvalidStateException'] = $includedir . 'InvalidStateException.php';
$wgAutoloadClasses['Workflow\InvalidTransitionException'] = $includedir . 'InvalidTransitionException.php';
$wgAutoloadClasses['Workflow\IStateMachine'] = $includedir . 'IStateMachine.php';
$wgAutoloadClasses['Workflow\StateMachine'] = $includedir . 'StateMachine.php';
$wgAutoloadClasses['Workflow\StateMachineDescription'] = $includedir . 'StateMachineDescription.php';
$wgAutoloadClasses['Workflow\TransitionNotPossibleException'] = $includedir . 'TransitionNotPossibleException.php';

$librarydir = __DIR__ . '/includes/library/';
$wgAutoloadClasses['Workflow\Library\BaseMachineLibrary'] = $librarydir . 'BaseMachineLibrary.php';
$wgAutoloadClasses['Workflow\Library\IMachineLibrary'] = $librarydir . 'IMachineLibrary.php';
$wgAutoloadClasses['Workflow\Library\MachineHierarchy'] = $librarydir . 'MachineHierarchy.php';
$wgAutoloadClasses['Workflow\Library\SelfStimulating'] = $librarydir . 'SelfStimulating.php';
$wgAutoloadClasses['Workflow\Library\WikiPages'] = $librarydir . 'WikiPages.php';

# FIXME: isn't there another variable only used during testing?
$testdir = __DIR__ . '/tests/';
$wgAutoloadClasses['Workflow\Tests\BaseWorkflowTestCase'] = $testdir . 'BaseWorkflowTestCase.php';
$wgAutoloadClasses['Workflow\Tests\DoorLibrary'] = $testdir . 'DoorLibrary.php';

define( 'NS_WORKFLOW', 204 );
define( 'NS_WORKFLOW_TALK', 205 );

$wgExtraNamespaces['NS_WORKFLOW'] = 'Workflow';
$wgExtraNamespaces['NS_WORKFLOW_TALK'] = 'Workflow_talk';

# TODO
# $wgNamespaceContentModels[NS_WORKFLOW] = 'StateMachineDescription';
# $wgContentHandlers['StateMachineDescription'] = 'StateMachineDescriptionContentHandler';

$wgHooks['UnitTestsList'][] = 'Workflow\Hooks::onUnitTestsList';

# FIXME: move to a setup hook
require_once __DIR__ . '/vendor/autoload.php';
