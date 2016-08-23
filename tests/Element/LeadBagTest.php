<?php

namespace MauroMoreno\AutoLeadDataFormat\Tests;

use MauroMoreno\AutoLeadDataFormat\Element\Lead;
use MauroMoreno\AutoLeadDataFormat\Element\LeadBag;
use MauroMoreno\AutoLeadDataFormat\Exception\InvalidArgumentException;
use MauroMoreno\AutoLeadDataFormat\Exception\LogicException;
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
     * @expectedExceptionMessage Leads must be an array of Lead
     */
    public function testLeadsWrongArrayType()
    {
        (new LeadBag)->setLeads(['', '']);
    }

    /**
     * @expectedException LogicException
     * @expectedExceptionMessage Leads must contain at least one Lead.
     */
    public function testLeadsEmptyArray()
    {
        (new LeadBag())->setLeads([])->getLeads();
    }

    public function testLeadsOk()
    {
        $leadBag = new LeadBag;
        $lead_1 = (new Lead)->setStatus('new');
        $lead_2 = (new Lead)->setStatus('resend');
        $this->assertEquals($leadBag, $leadBag->setLeads([$lead_1, $lead_2]));
        $this->assertEquals(2, count($leadBag->getLeads()));
        $this->assertEquals($lead_1, $leadBag->getLeads()[0]);
        $this->assertEquals($lead_2, $leadBag->getLeads()[1]);
    }
}
