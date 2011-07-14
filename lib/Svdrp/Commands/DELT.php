<?php
namespace Svdrp\Commands;

/**
 *
 * Enter description here ...
 * @author Ghardo
 *
 */
class DELT extends Command {

	/**
	 *
	 * Enter description here ...
	 * @param unknown_type $channel
	 */
	public function __construct($timer) {
		$this->setParam($timer);
	}

	protected function _prepareParam() {
	}
}