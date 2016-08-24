<?php

namespace MauroMoreno\AutoLeadDataFormat\Tests;

use MauroMoreno\AutoLeadDataFormat\Element\Vehicle;
use MauroMoreno\AutoLeadDataFormat\Exception\InvalidArgumentException;
use MauroMoreno\AutoLeadDataFormat\Exception\LogicException;
use TypeError;

class VehicleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException TypeError
     */
    public function testInterestWrongType()
    {
        (new Vehicle)->setInterest([]);
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Status can only be buy, lease, sell, trade-in or test-drive.
     */
    public function testInterestWrongValue()
    {
        (new Vehicle)->setInterest('wrong-status');
    }

    /**
     * @dataProvider interestOkDataProvider
     */
    public function testInterestOk($interest)
    {
        $vehicle = new Vehicle;
        $this->assertEquals($vehicle, $vehicle->setInterest($interest));
        $this->assertEquals($interest, $vehicle->getInterest());
    }

    /**
     * @expectedException TypeError
     */
    public function testMakeWrongType()
    {
        (new Vehicle)->setMake([]);
    }

    /**
     * @expectedException LogicException
     * @expectedExceptionMessage Make cannot be an empty value.
     */
    public function testMakeEmptyValue()
    {
        (new Vehicle)->setMake('')->getMake();
    }

    public function testMakeOk()
    {
        $vehicle = new Vehicle;
        $this->assertEquals($vehicle, $vehicle->setMake('Test'));
        $this->assertEquals('Test', $vehicle->getMake());
    }

    /**
     * @expectedException TypeError
     */
    public function testModelWrongType()
    {
        (new Vehicle)->setModel([]);
    }

    /**
     * @expectedException LogicException
     * @expectedExceptionMessage Model cannot be an empty value.
     */
    public function testModelEmptyValue()
    {
        (new Vehicle)->setModel('')->getModel();
    }

    public function testModelOk()
    {
        $vehicle = new Vehicle;
        $this->assertEquals($vehicle, $vehicle->setModel('Test'));
        $this->assertEquals('Test', $vehicle->getModel());
    }

    /**
     * @expectedException TypeError
     */
    public function testStatusWrongType()
    {
        (new Vehicle)->setStatus([]);
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Status can only be new or resend.
     */
    public function testStatusWrongValue()
    {
        (new Vehicle)->setStatus('wrong-status');
    }

    /**
     * @dataProvider statusOkDataProvider
     */
    public function testStatusOk($status)
    {
        $vehicle = new Vehicle;
        $this->assertEquals($vehicle, $vehicle->setStatus($status));
        $this->assertEquals($status, $vehicle->getStatus());
    }

    /**
     * @expectedException TypeError
     */
    public function testYearWrongType()
    {
        (new Vehicle)->setYear([]);
    }

    /**
     * @expectedException LogicException
     * @expectedExceptionMessage Year cannot be an empty value.
     */
    public function testYearEmptyValue()
    {
        (new Vehicle)->setYear(0)->getYear();
    }

    public function testYearOk()
    {
        $vehicle = new Vehicle;
        $this->assertEquals($vehicle, $vehicle->setYear(2016));
        $this->assertEquals(2016, $vehicle->getYear());
    }

    public function interestOkDataProvider()
    {
        return [
            ['buy'],
            ['lease'],
            ['sell'],
            ['trade-in'],
            ['test-drive'],
        ];
    }

    public function statusOkDataProvider()
    {
        return [
            ['new'],
            ['resend'],
        ];
    }
}