<?php
namespace Svdrp\Commands;

/**
 *
 * Enter description here ...
 * @author Ghardo
 *
 */
class CHAN extends Command {

	/**
	 *
	 * Enter description here ...
	 * @var unknown_type
	 */
	protected $_command = 'CHAN';

	/**
	 *
	 * Enter description here ...
	 * @param unknown_type $channel
	 */
	public function __construct($channel) {
		$this->setParam($channel);
	}

	protected function _prepareParam() {}
}