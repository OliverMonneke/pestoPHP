<?php

/**
 * Class for logging to file
 */
namespace Codersqad\Pestophp\Log\Types;
use Codersquad\Filesystem\File;
use Codersquad\Log\ILog;
use Codersquad\Pestophp\Classmanagement\IObserveAble;
use Codersquad\Pestophp\Classmanagement\IObserver;

/**
 * Class FileLog
 *
 * @package Codersqad\Pestophp\Log\Types
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class FileLog implements ILog, IObserveAble
{

    /**
     * Path to log file
     *
     * @var string
     */
    private $_path = 'log';

    /**
     * Name of log file
     *
     * @var string
     */
    private $_fileName = 'log.txt';

    /**
     * @var File
     */
    private $_file = NULL;

    /**
     * Observers
     *
     * @var array
     */
    private $_observers = [];

    /**
     * Default constructor
     */
    public function __construct()
    {
        $file = BASE_PATH . DIRECTORY_SEPARATOR . $this->_path . DIRECTORY_SEPARATOR . $this->_fileName;
        $this->_file = new File($file);
    }

    /**
     * Write to file
     *
     * @param string $string String to write
     *
     * @return void
     */
    public function write($string)
    {
        $this->_file->write($string);
    }

    /**
     * Getter for path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->_path;
    }

    /**
     * Getter for filename
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->_fileName;
    }

    /**
     * Setter for path
     *
     * @param string $_path The path
     *
     * @return FileLog
     */
    public function setPath($_path)
    {
        $this->_path = $_path;

        return $this;
    }

    /**
     * Setter for filename
     *
     * @param string $_fileName The filename
     *
     * @return FileLog
     */
    public function setFileName($_fileName)
    {
        $this->_fileName = $_fileName;

        return $this;
    }

    /**
     * Attach observer
     *
     * @param IObserver $observer The observer
     *
     * @return void
     */
    public function attach(IObserver $observer)
    {
        $this->_observers[] = $observer;
    }

    /**
     * Detach observer
     *
     * @param IObserver $observer The observer
     *
     * @return void
     */
    public function detach(IObserver $observer)
    {
        $this->_observers = array_diff($this->_observers, [$observer]);
    }

    /**
     * Notify observers
     *
     * @return void
     */
    public function notify()
    {
        /** @var $_observer IObserver */
        foreach ($this->_observers as $_observer)
        {
            $_observer->update();
        }
    }
}
