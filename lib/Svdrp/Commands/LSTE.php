<?php
namespace Svdrp\Commands;

/**
 * TODO Overloading
 * @author
 *
 */
class LSTE extends Command {

	/**
	 *
	 * Enter description here ...
	 * @var unknown_type
	 */
	protected $_command = 'LSTE';

	/**
	 *
	 * Enter description here ...
	 * @var unknown_type
	 */
	protected $_channel = null;

	/**
	 *
	 * Enter description here ...
	 * @var unknown_type
	 */
	protected $_time = null;

	/**
	 *
	 * Enter description here ...
	 * @param unknown_type $number
	 */
	public function setChannelNumber($number) {
		$this->_channel = (string) $number;
	}

	/**
	 *
	 * Enter description here ...
	 * @param unknown_type $name
	 */
	public function setChannelName($name) {
		$this->_channel = (string) $name;
	}

	/**
	 *
	 * Enter description here ...
	 * @param unknown_type $time
	 */
	public function setTime($time) {
		$this->_time = (string) $time;
	}

	/**
	 *
	 * Enter description here ...
	 * @param unknown_type $timestamp
	 */
	public function setTimestamp($timestamp) {
		// TODO
	}

	/**
	 * (non-PHPdoc)
	 * @see Command::_prepareParam()
	 */
	protected function _prepareParam() {
		$this->setParam($this->_channel . ' ' . $this->_time);
	}
}