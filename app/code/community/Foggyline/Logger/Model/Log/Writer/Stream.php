<?php

class Foggyline_Logger_Model_Log_Writer_Stream extends Zend_Log_Writer_Stream
{
    /* foggyline logger file path */
    private static $_flfp;

    public function __construct($streamOrUrl, $mode = NULL)
    {
        self::$_flfp = $streamOrUrl;
        return parent::__construct($streamOrUrl, $mode);
    }

    protected function _write($event)
    {
		$logger = Mage::getModel('foggyline_logger/logger');

		$logger->setTimestamp($event['timestamp']);
		$logger->setMessage($event['message']);
		$logger->setPriority($event['priority']);
		$logger->setPriorityName($event['priorityName']);

		if (is_string(self::$_flfp)) {
			$logger->setFile(self::$_flfp);
		}

		try {
			$logger->save();
		} catch (Exception $e) {
                    //echo $e->getMessage(); exit;
                    /* Silently die... */
		}

        /* Now pass the execution to original parent code */
        return parent::_write($event);
    }
}
