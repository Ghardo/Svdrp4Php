<?php
namespace Svdrp;

/**
 *
 * Enter description here ...
 * @author Ghardo
 *
 */
class Svdrp {

	/**
	 *
	 */
	protected $_socket = null;

	/**
	 *
	 * Enter description here ...
	 * @var unknown_type
	 */
	protected $_errno = null;

	/**
	 *
	 * Enter description here ...
	 * @var unknown_type
	 */
	protected $_errstr = null;

	/**
	 *
	 * Enter description here ...
	 * @var unknown_type
	 */
	protected $_host = null;

	/**
	 *
	 * Enter description here ...
	 * @var unknown_type
	 */
	protected $_port = 2001;

	/**
	 *
	 * Enter description here ...
	 * @var unknown_type
	 */
	protected $_timeout = 5;

	protected $_lastResponse = null;

	/**
	 *
	 * Enter description here ...
	 * @var unknown_type
	 */
	const BUFFER_SIZE = 2048;

	/**
	 *
	 * Enter description here ...
	 * @param unknown_type $host
	 * @param unknown_type $port
	 * @param unknown_type $timeout
	 */
	public function __construct($host, $port = 2001, $timeout = 5) {
		$this->setHost($host);
		$this->setPort($port);
		$this->setTimeout($timeout);
	}

	/**
	 *
	 * Enter description here ...
	 * @param unknown_type $host
	 */
	public function setHost($host) {
		$this->_host = $host;
	}

	/**
	 *
	 * Enter description here ...
	 * @param unknown_type $host
	 */
	public function getHost($host) {
		return $this->_host;
	}

	/**
	 *
	 * Enter description here ...
	 * @param unknown_type $port
	 */
	public function setPort($port) {
		$this->_port = $port;
	}

	/**
	 *
	 * Enter description here ...
	 * @param unknown_type $port
	 */
	public function getPort($port) {
		return $this->_port;
	}

	/**
	 *
	 * Enter description here ...
	 * @param unknown_type $timeout
	 */
	public function setTimeout($timeout) {
		$this->_timeout = $timeout;
	}

	/**
	 *
	 * Enter description here ...
	 */
	public function getTimeout() {
		return $timeout;
	}

	/**
	 *
	 * Enter description here ...
	 */
	public function connect() {
		$this->_socket = fsockopen($this->_host, $this->_port, $this->_errno, $this->_errstr, $this->_timeout);
		return $this->recieve();
	}

	/**
	 *
	 * Enter description here ...
	 */
	public function recieve() {
		if(!$this->_socket) return false;
		$finish = false;
		$response = array();
		do {
			$buffer = fgets($this->_socket, self::BUFFER_SIZE);
			$success = preg_match(	'/^(?P<code>\d{3})(?P<test>[\s-])(vdr\s|(?P<number>\d+)?)(?P<data>.*?)$/',
						$buffer,
						$match);

			var_dump($match);
			if (!$success) throw new Exceptions\UnknownResult();

			if (trim($match['test']) != '-') $finish = true;

			switch((int)$match['code']) {
				case 451: throw new Exceptions\ActionAborted($match['data'], (int)$match['code']);
				case 500: throw new Exceptions\SyntaxError($match['data'], (int)$match['code']);
				case 501: throw new Exceptions\SyntaxError($match['data'], (int)$match['code']);
				case 502: throw new Exceptions\NotImplemented($match['data'], (int)$match['code']);
				case 504: throw new Exceptions\NotImplemented($match['data'], (int)$match['code']);
				case 550: throw new Exceptions\ActionAborted($match['data'], (int)$match['code']);
				case 554: throw new Exceptions\ActionAborted($match['data'], (int)$match['code']);
			}

			$response[] = $match['data'];
		} while(!$finish);

		return $response;
	}

	/**
	 *
	 * Enter description here ...
	 * TODO type hinting
	 */
	public function send($command) {
		if(!$this->_socket) return false;
		var_dump($command->getCommand());

		fwrite($this->_socket, $command->getCommand() . "\n");
		return $this->recieve();
	}

	/**
	 *
	 */
	public function disconnet() {
		$quit = new Commands\QUIT();
		$response = $this->send($quit);
		$this->_socket = null;
	}

	/**
	 *
	 */
	public function __destruct() {
		$this->disconnet();
	}
}