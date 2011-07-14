<?php
namespace Svdrp;

/**
 *
 * Enter description here ...
 * @author Ghardo
 *
 */
class Response {

	/**
	 *
	 * Enter description here ...
	 * @var unknown_type
	 */
	protected $_code = null;

	/**
	 *
	 * Enter description here ...
	 * @var unknown_type
	 */
	protected $_data = null;

	/**
	 *
	 * Enter description here ...
	 * @param unknown_type $code
	 * @param unknown_type $data
	 */
	public function __construct($code, $data) {
		$this->_code = $code;
		$this->_data = $data;
	}

	/**
	 *
	 * Enter description here ...
	 */
	public function getCode() {
		return $this->_code;
	}

	/**
	 *
	 * Enter description here ...
	 */
	public function getRawData() {
		return $this->_message;
	}
}
