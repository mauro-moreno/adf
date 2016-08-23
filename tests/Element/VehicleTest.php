<?php

namespace MauroMoreno\AutoLeadDataFormat\Tests;

use MauroMoreno\AutoLeadDataFormat\Element\Vehicle;
use MauroMoreno\AutoLeadDataFormat\Exception\InvalidArgumentException;
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