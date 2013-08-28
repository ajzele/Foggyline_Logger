<?php

class Foggyline_Logger_Block_Adminhtml_Edit extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'foggyline_logger';
        $this->_controller = 'adminhtml_edit';
        $this->_headerText = Mage::helper('foggyline_logger')->__('Logger - Log entries of everything that passed through Mage::log();');

        parent::__construct();

        $this->_removeButton('add');
    }
}
