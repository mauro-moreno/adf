<?php

namespace MauroMoreno\AutoLeadDataFormat\Tests;

use MauroMoreno\AutoLeadDataFormat\Element\Lead;
use MauroMoreno\AutoLeadDataFormat\Element\LeadBag;
use MauroMoreno\AutoLeadDataFormat\Exception\InvalidArgumentException;
use TypeError;

class LeadBagTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException TypeError
     */
    public function testLeadsWrongType()
    {
        (new LeadBag)->setLeads('');
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Leads should be an array of Lead
     */
    public function testLeadsWrongArrayType()
    {
        (new LeadBag)->setLeads(['', '']);
    }

    public function testLeadsOk()
    {
        $leadBag = new LeadBag;
        $this->assertEquals($leadBag, $leadBag->setLeads([new Lead]));
    }
}
