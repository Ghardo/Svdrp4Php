<?php
namespace Svdrp\Commands;

/**
 *
 * Enter description here ...
 * @author Ghardo
 *
 */
class MOVC extends Command {

	public function __construct($channel, $after) {
		$this->setParam($channel . ' ' . $after);
	}

	protected function _prepareParam() {
	}
}