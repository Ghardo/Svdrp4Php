<?php
namespace Svdrp\Commands;

/**
 *
 * Enter description here ...
 * @author Ghardo
 *
 */
class PLAY extends Command {

	protected $_record = null;
	protected $_position = null;

	public function __construct($record, $position = null) {
		$this->_record = $record;
		$this->_position = $position;
	}

	protected function _prepareParam() {
		$param = $this->_record;

		if ($this->_position !== null)
			$param .= ' ' . $this->_position;

		$this->setParam($param);
	}
}