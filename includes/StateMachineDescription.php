<?php namespace Workflow;

use Symfony\Component\Yaml\Parser as YamlParser;

/**
 * Graph and configuration for a state machine
 *
 * The description contains all the information needed to instantiate a
 * job.
 */
class StateMachineDescription {
	// TODO: Entities as objects
	protected $data;

	static function loadFromFile( $path ) {
		// TODO store hash?
		return self::loadFromYaml( file_get_contents( $path ) );
	}

	// FIXME: untested
	static function loadFromWiki( $title ) {
		// TODO store revision ID
		$page = new WikiPage( Title::newFromText( $title ) );
		$data = $page->getContent();
		return self::loadFromYaml( $data );
	}

	static function loadFromYaml( $str ) {
		$parser = new YamlParser();
		$data = $parser->parse( $str );

		return new StateMachineDescription( $data );
	}

	static function validateDescriptionData( $data ) {
		// TODO
	}

	protected function __construct( $data ) {
		self::validateDescriptionData( $data );

		// Apply defaults
		$this->data = $data + array(
			'configuration' => array(),
			'exceptions' => array(),
			'libraries' => array(),
		);

		foreach ( $this->data['states'] as $state => &$info ) {
			$info = (array)$info + array(
				'actions' => array(),
				'transitions' => array(),
			);
		}
	}

	function getInitialState() {
		// ick. Relies on PHP's schizo internal representation of a map
		reset( $this->data['states'] );
		return key( $this->data['states'] );
	}

    function getTransitionsForState( $state ) {
		$this->assertStateExists( $state );

		return array_keys( $this->data['states'][$state]['transitions'] );
	}

	function getActionsForState( $state ) {
		$this->assertStateExists( $state );

		return $this->data['states'][$state]['actions'];
	}

    function getDestinationState( $state, $transition ) {
		$this->assertStateExists( $state );
		$this->assertTransitionExists( $state, $transition );

		return $this->data['states'][$state]['transitions'][$transition];
	}

    function getTitle() {
		return $this->data['title'];
	}

	function getLibraries() {
		return $this->data['libraries'];
	}

    function getExceptions() {
		return array_keys( $this->data['exceptions'] );
	}

	function getExceptionDestination( $name ) {
		return $this->data['exceptions'][$name];
	}

	function getConfigurationValue( $key ) {
		$this->assertConfigurationExists( $key );

		return $this->data['configuration'][$key];
	}

	protected function assertConfigurationExists( $key ) {
		if ( !array_key_exists( $key, $this->data['configuration'] ) ) {
			throw new InvalidVariableException( $key );
		}
	}

	protected function assertStateExists( $state ) {
		if ( !array_key_exists( $state, $this->data['states'] ) ) {
			throw new InvalidStateException( $state );
		}
	}

	protected function assertTransitionExists( $state, $transition ) {
		if ( !array_key_exists( $transition, $this->data['states'][$state]['transitions'] ) ) {
			throw new InvalidTransitionException( $state, $transition );
		}
	}
}
