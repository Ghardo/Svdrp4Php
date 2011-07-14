<?php
namespace Svdrp\Commands;

/**
 *
 * Enter description here ...
 * @author Ghardo
 *
 */
class MODC extends Command {

	protected $_channel = null;

	protected $_settings = null;

	public function __construct($channel, $settings) {
		$this->_channel = $channel;
		$this->_settings = $settings;
	}

	protected function _prepareParam() {
		$this->setParam($this->_channel . ' ' . $this->_settings);
	}
}