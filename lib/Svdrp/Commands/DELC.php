<?php
namespace Svdrp\Commands;

/**
 *
 * Enter description here ...
 * @author Ghardo
 *
 */
class DELC extends Command {

	/**
	 *
	 * Enter description here ...
	 * @param unknown_type $channel
	 */
	public function __construct($channel) {
		$this->setParam($channel);
	}

	protected function _prepareParam() {
	}
}