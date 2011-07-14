<?php
namespace Svdrp\Commands;

/**
 *
 * Enter description here ...
 * @author Ghardo
 *
 */
class MODT extends Command {

	protected $_timer = null;

	protected $_settings = null;


	public function __construct($timer, $settings) {
		$this->_timer = $channel;
		$this->_settings = $settings;
	}

	protected function _prepareParam() {
		$this->setParam($this->_timer . ' ' . $this->_settings);
	}
}