<?php

/**
 * Class for logging to file
 */
namespace Codersquad\Log\Types;
use Codersquad\Log\ILog;
use Codersquad\Classmanagement\IObserveAble;

/**
 * Class FileLog
 *
 * @package Codersquad\Log\Types
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
     * FileLog handle
     *
     * @var resource
     */
    private $_handle = NULL;

    /**
     * Observers
     *
     * @var array
     */
    private $_observers = [];

    /**
     * Default constructor
     *
     * @return \Codersquad\Log\Types\FileLog
     */
    public function __construct()
    {
        $this->_openHandle();
    }

    /**
     * Default destructor
     *
     * @return void
     */
    public function __destruct()
    {
        $this->_closeHandle();
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
        fwrite($this->_handle, $string);
    }

    /**
     * Open file handle
     *
     * @return void
     */
    private function _openHandle()
    {
        if (NULL === $this->_handle)
        {
            $this->_handle = fopen($this->_handle . DIRECTORY_SEPARATOR . $this->_fileName, 'a+');
        }
    }

    /**
     * Close file handle
     *
     * @return void
     */
    private function _closeHandle()
    {
        if (NULL !== $this->_handle)
        {
            fclose($this->_handle);
        }
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
        foreach ($this->_observers as $_observer)
        {
            $_observer->update();
        }
    }
}
