<?php
namespace Svdrp\Commands;

/**
 *
 * Enter description here ...
 * @author Ghardo
 *
 */
class CLRE extends Command {

	/**
	 *
	 * Enter description here ...
	 * @var unknown_type
	 */
	protected $_command = 'CLRE';

	/**
	 *
	 * Enter description here ...
	 * @param unknown_type $channel
	 */
	public function __construct($channel = null) {
		if ($channel !== null)
			$this->setParam((string)$channel);
	}

	protected function _prepareParam() {}
}