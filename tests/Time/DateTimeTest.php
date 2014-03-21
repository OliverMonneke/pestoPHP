<?php
/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 21.03.2014
 * Time: 15:31
 */

namespace Time;


use Codersquad\Pestophp\Time\DateTime;

class DateTimeTest extends \PHPUnit_Framework_TestCase
{

    public function testAdd()
    {
        $dateTime = new DateTime();
        $dateTime->setDay(30);
        $dateTime->setMonth(8);
        $dateTime->setYear(1980);
        $dateTime->add('2d');

        $this->assertEquals('1980-09-01', $dateTime->getDate());
    }

    public function testSub()
    {
        $dateTime = new DateTime();
        $dateTime->setDay(1);
        $dateTime->setMonth(9);
        $dateTime->setYear(1980);
        $dateTime->sub('2d');

        $this->assertEquals('1980-08-30', $dateTime->getDate());
    }

    public function testGetDate()
    {
        $dateTime = new DateTime();
        $dateTime->setDay(30);
        $dateTime->setMonth(8);
        $dateTime->setYear(1980);

        $this->assertEquals('1980-08-30', $dateTime->getDate());
    }

    public function testGetTime()
    {
        $dateTime = new DateTime();
        $dateTime->setDay(30);
        $dateTime->setMonth(8);
        $dateTime->setYear(1980);
        $dateTime->setHour(15);
        $dateTime->setMinute(36);
        $dateTime->setSecond(12);

        $this->assertEquals('15:36:12', $dateTime->getTime());
    }
    public function testGetDateTime()
    {
        $dateTime = new DateTime();
        $dateTime->setDay(30);
        $dateTime->setMonth(8);
        $dateTime->setYear(1980);
        $dateTime->setHour(15);
        $dateTime->setMinute(36);
        $dateTime->setSecond(12);

        $this->assertEquals('1980-08-30 15:36:12', $dateTime->getDateTime());
    }
}
 