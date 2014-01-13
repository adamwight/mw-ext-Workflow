<?php namespace Workflow;

use \Exception;

/**
 * Special exception which can be safely thrown from an enterState action
 *
 * This exception will rollback the last transition.
 */
class TransitionNotPossibleException extends Exception {
}
