<?php
namespace Svdrp\Commands;

/**
 *
 * Enter description here ...
 * @author Ghardo
 *
 */
class GRAB extends Command {

	/**
	 *
	 * Enter description here ...
	 * @var unknown_type
	 */
	protected $_command = 'GRAB';

	protected $_filename = null;

	protected $_quality = null;

	protected $_width = null;

	protected $_height = null;

	/**
	 *
	 * @param string $filename
	 * @param int $quality
	 * @param int $width
	 * @param int $height
	 */
	public function __construct($filename, $quality = null, $width = null, $height = null) {

		$this->_filename = $filename;
		if ($quality !== null)
			$this->_quality = filter_var($quality, FILTER_VALIDATE_INT,
								array(
									'options' => array(
										'min_range' => 1,
										'max_range' => 100
								)));

		if ($width !== null) $this->_width = $width;
		if ($height !== null) $this->_height = $height;
	}

	protected function _prepareParam() {
		$param = $this->_filename;

		if ($this->_quality !== null && $this->_quality !== false)
			$param .= ' ' . $this->_quality;

		if ($this->_width !== null)
			$param .= ' ' . $this->_width;

		if ($this->_height !== null)
			$param .= ' ' . $this->_height;

		$this->setParam($param);
	}
}