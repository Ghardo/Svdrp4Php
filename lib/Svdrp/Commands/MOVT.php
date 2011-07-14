<?php
namespace Svdrp\Commands;

/**
 *
 * Enter description here ...
 * @author Ghardo
 *
 */
class MOVC extends Command {

	public function __construct($timer, $after) {
		$this->setParam($timer . ' ' . $after);
	}

	protected function _prepareParam() {
	}
}