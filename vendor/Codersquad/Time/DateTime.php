<?php

/**
 * Class for dae management
 */
namespace Codersquad\Time;
use Codersquad\Debug\Debug;

/**
 * Class Date
 *
 * @package Codersquad\Time
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class DateTime
{
    /**
     * Format of date
     *
     * @var string
     */
    private $_formatDate = 'Y-m-d';

    /**
     * Format of the time
     *
     * @var string
     */
    private $_formatTime = 'H:M:s';

    /**
     * Format of date and time
     *
     * @var string
     */
    private $_formatDateTime = 'Y-m-d H:M:s';

    /**
     * The year
     *
     * @var int
     */
    private $_year = NULL;

    /**
     * The month
     *
     * @var int
     */
    private $_month = NULL;

    /**
     * The day
     *
     * @var int
     */
    private $_day = NULL;

    /**
     * The hour
     *
     * @var int
     */
    private $_hour = NULL;

    /**
     * The minute
     *
     * @var int
     */
    private $_minute = NULL;

    /**
     * The second
     *
     * @var int
     */
    private $_second = NULL;

    /**
     * Timestamp
     *
     * @var int
     */
    private $_timestamp = NULL;

    /**
     * Add a specific period
     *
     * @param string $string The period to add
     *
     * @return Date
     */
    public function add($string)
    {
        $this->_timestamp = $this->_getTimestamp() + $this->_evaluateDateString($string);

        return $this;
    }

    /**
     * Subtract a specific period
     *
     * @param string $string The period
     *
     * @return Date
     */
    public function sub($string)
    {
        $this->_timestamp = $this->_getTimestamp() - $this->_evaluateDateString($string);

        return $this;
    }

    /**
     * Convert string to seconds
     *
     * @param string $string The string
     *
     * @return int
     */
    private function _evaluateDateString($string)
    {
        $seconds = 1;
        $matches = array();
        preg_match('/^([0-9]*)([s|M|h|d|m|y])$/', $string, $matches);

        switch($matches[2])
        {
            case 's':
                $seconds = $matches[1];
                break;
            case 'M':
                $seconds = $this->_evaluateDateString(60*$matches[1].'s');
                break;
            case 'h':
                $seconds = $this->_evaluateDateString(60*$matches[1].'M');
                break;
            case 'd':
                $seconds = $this->_evaluateDateString(24*$matches[1].'h');
                break;
            case 'm':
                $seconds = $this->_evaluateDateString(30*$matches[1].'d');
                break;
            case 'y':
                $seconds = $this->_evaluateDateString(12*$matches[1].'m');
                break;
            default:
                break;
        }

        return $seconds;
    }

    /**
     * Get the date
     *
     * @return bool|string
     */
    public function getDate()
    {
        return date($this->_formatDate, $this->_getTimestamp());
    }

    /**
     * Get the time
     *
     * @return bool|string
     */
    public function getTime()
    {
        return date($this->_formatTime, $this->_getTimestamp());
    }

    /**
     * Get the date and time
     *
     * @return bool|string
     */
    public function getDateTime()
    {
        return date($this->_formatDateTime, $this->_getTimestamp());
    }

    /**
     * Set the day
     *
     * @param int $day The day
     *
     * @return Date
     */
    public function setDay($day)
    {
        $this->_day = $day;

        return $this;
    }

    /**
     * Set the month
     *
     * @param int $month The month
     *
     * @return Date
     */
    public function setMonth($month)
    {
        $this->_month = $month;

        return $this;
    }

    /**
     * Set the year
     *
     * @param int $year The year
     *
     * @return Date
     */
    public function setYear($year)
    {
        $this->_year = $year;

        return $this;
    }

    /**
     * Get the timestamp
     *
     * @return int
     */
    private function _getTimestamp()
    {
        if (NULL === $this->_timestamp)
        {
            $timestamp = mktime($this->_hour, $this->_minute, $this->_second, $this->_month, $this->_day, $this->_year);
        }
        else
        {
            $timestamp = $this->_timestamp;
        }

        return $timestamp;
    }

    /**
     * The format for the date
     *
     * @param string $formatDate Format for date
     *
     * @return DateTime
     */
    public function setFormatDate($formatDate)
    {
        $this->_formatDate = $formatDate;

        return $this;
    }

    /**
     * Setter for hour
     *
     * @param int $hour The hour
     *
     * @return DateTime
     */
    public function setHour($hour)
    {
        $this->_hour = $hour;

        return $this;
    }

    /**
     * Setter for minute
     *
     * @param int $minute The minute
     *
     * @return DateTime
     */
    public function setMinute($minute)
    {
        $this->_minute = $minute;

        return $this;
    }

    /**
     * Setter for second
     *
     * @param int $second The second
     *
     * @return DateTime
     */
    public function setSecond($second)
    {
        $this->_second = $second;

        return $this;
    }

    /**
     * Setter for time format
     *
     * @param string $formatTime The format
     *
     * @return DateTime
     */
    public function setFormatTime($formatTime)
    {
        $this->_formatTime = $formatTime;

        return $this;
    }

    /**
     * Setter for date and time format
     *
     * @param string $formatDateTime The format
     *
     * @return DateTime
     */
    public function setFormatDateTime($formatDateTime)
    {
        $this->_formatDateTime = $formatDateTime;

        return $this;
    }
}
