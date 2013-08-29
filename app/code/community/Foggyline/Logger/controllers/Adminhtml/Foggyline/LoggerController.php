<?php

class Foggyline_Logger_Adminhtml_Foggyline_LoggerController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout()->_setActiveMenu('system/tools/foggyline_logger');
        $this->_addContent($this->getLayout()->createBlock('foggyline_logger/adminhtml_edit'));
        $this->renderLayout();
    }

    public function gridAction()
    {
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('foggyline_logger/adminhtml_edit_grid')->toHtml()
        );
    }
}
