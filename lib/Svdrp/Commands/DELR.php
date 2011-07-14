<?php
namespace Svdrp\Commands;

/**
 *
 * Enter description here ...
 * @author Ghardo
 *
 */
class DELR extends Command {

	/**
	 * TODO Type Hints
	 * @param int $number
	 */
	public function __construct($number) {
		$this->setParam($number);
	}

	protected function _prepareParam() {
	}
}