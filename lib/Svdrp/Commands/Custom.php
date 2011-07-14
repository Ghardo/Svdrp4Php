<?php
namespace Svdrp\Commands;

/**
 *
 * @author Ghardo
 *
 */
class Custom extends Command {

	/**
	 *
	 * @param string $command
	 * @param string $param
	 */
	public function __construct($command, $param = null) {
		$this->_command = $command;
		if ($param !== null)
			$this->setParam($param);
	}

	protected function _prepareParam() {
	}
}