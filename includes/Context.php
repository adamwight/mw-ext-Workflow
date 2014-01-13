<?php namespace Workflow;

use \Serializable;
use \JsonSerializable;

/**
 * State data for a workflow instance
 *
 * TODO: contain metadata about the job?
 */
class Context
	implements Serializable, JsonSerializable
{
	protected $data = array();

	function getValue( $key ) {
		if ( array_key_exists( $key, $this->data ) ) {
			return $this->data[$key];
		}
		return null;
	}

	function setValue( $key, $value ) {
		$this->data[$key] = $value;
	}

	function serialize() {
		return $this->data;
		// TODO: freeze self
	}

	function jsonSerialize() {
		return $this->serialize();
	}

	function unserialize( $data ) {
		$this->data = $data;
	}
}
