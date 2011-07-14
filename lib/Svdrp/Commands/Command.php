<?php
namespace Svdrp\Commands;

/**
 *
 * Enter description here ...
 * @author Ghardo
 *
 */
abstract class Command {

	/**
	 *
	 * Enter description here ...
	 * @var unknown_type
	 */
	protected $_param = null;

	/**
	 *
	 * Enter description here ...
	 * @var unknown_type
	 */
	protected $_command = null;

	/**
	 *
	 * Enter description here ...
	 */
	public function getCommand() {
		$this->_prepareParam();

		if ($this->getParam() !== null) {
			return $this->_command . ' ' . $this->getParam();
		}
		return $this->_command;
	}

	/**
	 *
	 * Enter description here ...
	 */
	public function getParam() {
		return $this->_param;
	}

	/**
	 *
	 * Enter description here ...
	 * @param unknown_type $param
	 */
	public function setParam($param) {
		$this->param = (string)$param;
	}

	/**
	 *
	 * Enter description here ...
	 */
	abstract protected function _prepareParam();

	/**
	 *
	 * Enter description here ...
	 */
	public function __toString() {
		return $this->getCommand();
	}
}