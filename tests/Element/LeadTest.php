<?php

namespace MauroMoreno\AutoLeadDataFormat\Tests;

use DateTime;
use MauroMoreno\AutoLeadDataFormat\Element\Lead;
use MauroMoreno\AutoLeadDataFormat\Exception\InvalidArgumentException;
use TypeError;

class LeadTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException TypeError
     */
    public function testRequestDateWrongType()
    {
        (new Lead)->setRequestDate('');
    }

    public function testRequestDateOk()
    {
        $lead = new Lead;
        $this->assertEquals($lead, $lead->setRequestDate(new DateTime('01/01/2016')));
        $this->assertInstanceOf(DateTime::class, $lead->getRequestDate());
        $this->assertEquals(
            "2016-01-01T00:00:00+00:00",
            $lead->getRequestDate()->format(DateTime::ATOM)
        );
    }

    /**
     * @expectedException TypeError
     */
    public function testStatusWrongType()
    {
        (new Lead)->setStatus([]);
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Status can only be new or resend.
     */
    public function testStatusWrongValue()
    {
        (new Lead)->setStatus('wrong-status');
    }

    /**
     * @dataProvider statusOkDataProvider
     */
    public function testStatusOk($status)
    {
        $lead = new Lead;
        $this->assertEquals($lead, $lead->setStatus($status));
        $this->assertEquals($status, $lead->getStatus());
    }

    public function statusOkDataProvider()
    {
        return [
            ['new'],
            ['resend'],
        ];
    }
}
