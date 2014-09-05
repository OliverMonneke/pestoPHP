<?php

/**
 * Class for dae management
 */
namespace Codersquad\Pestophp\Time;

/**
 * Class Date
 *
 * @package Codersquad\Pestophp\Time
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
    private $formatDate = 'Y-m-d';

    /**
     * Format of the time
     *
     * @var string
     */
    private $formatTime = 'H:i:s';

    /**
     * Format of date and time
     *
     * @var string
     */
    private $formatDateTime = 'Y-m-d H:i:s';

    /**
     * The year
     *
     * @var int
     */
    private $year = null;

    /**
     * The month
     *
     * @var int
     */
    private $month = null;

    /**
     * The day
     *
     * @var int
     */
    private $day = null;

    /**
     * The hour
     *
     * @var int
     */
    private $hour = null;

    /**
     * The minute
     *
     * @var int
     */
    private $minute = null;

    /**
     * The second
     *
     * @var int
     */
    private $second = null;

    /**
     * Timestamp
     *
     * @var int
     */
    private $timestamp = null;

    /**
     * Add a specific period
     *
     * @param string $string The period to add
     *
     * @return DateTime
     */
    public function add($string)
    {
        $this->timestamp = $this->getTimestamp() + $this->evaluateDateString($string);

        return $this;
    }

    /**
     * Subtract a specific period
     *
     * @param string $string The period
     *
     * @return DateTime
     */
    public function sub($string)
    {
        $this->timestamp = $this->getTimestamp() - $this->evaluateDateString($string);

        return $this;
    }

    /**
     * Convert string to seconds
     *
     * @param string $string The string
     *
     * @return int
     */
    private function evaluateDateString($string)
    {
        $seconds = 1;
        $matches = [];
        preg_match('/^([0-9]*)([s|M|h|d|m|y])$/', $string, $matches);

        switch($matches[2]) {
            case 's':
                $seconds = $matches[1];
                break;
            case 'M':
                $seconds = $this->evaluateDateString(60*$matches[1].'s');
                break;
            case 'h':
                $seconds = $this->evaluateDateString(60*$matches[1].'M');
                break;
            case 'd':
                $seconds = $this->evaluateDateString(24*$matches[1].'h');
                break;
            case 'm':
                $seconds = $this->evaluateDateString(30*$matches[1].'d');
                break;
            case 'y':
                $seconds = $this->evaluateDateString(12*$matches[1].'m');
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
        return date($this->formatDate, $this->getTimestamp());
    }

    /**
     * Get the time
     *
     * @return bool|string
     */
    public function getTime()
    {
        return date($this->formatTime, $this->getTimestamp());
    }

    /**
     * Get the date and time
     *
     * @return bool|string
     */
    public function getDateTime()
    {
        return date($this->formatDateTime, $this->getTimestamp());
    }

    /**
     * Set the day
     *
     * @param int $day The day
     *
     * @return DateTime
     */
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Set the month
     *
     * @param int $month The month
     *
     * @return DateTime
     */
    public function setMonth($month)
    {
        $this->month = $month;

        return $this;
    }

    /**
     * Set the year
     *
     * @param int $year The year
     *
     * @return DateTime
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get the timestamp
     *
     * @return int
     */
    private function getTimestamp()
    {
        if (null === $this->timestamp) {
            $timestamp = mktime($this->hour, $this->minute, $this->second, $this->month, $this->day, $this->year);
        } else {
            $timestamp = $this->timestamp;
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
        $this->formatDate = $formatDate;

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
        $this->hour = $hour;

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
        $this->minute = $minute;

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
        $this->second = $second;

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
        $this->formatTime = $formatTime;

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
        $this->formatDateTime = $formatDateTime;

        return $this;
    }
}
