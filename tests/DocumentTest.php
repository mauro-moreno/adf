<?php

namespace MauroMoreno\AutoLeadDataFormat\Tests;

use JMS\Serializer\SerializerInterface;
use MauroMoreno\AutoLeadDataFormat\Document;
use MauroMoreno\AutoLeadDataFormat\Element\LeadBag;
use TypeError;

class DocumentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException TypeError
     */
    public function testGenerateWrongType()
    {
        $serializer = $this->mockSerializer();
        (new Document($serializer))->generate('');
    }

    public function testGenerateOk()
    {
        $serializer = $this->mockSerializer();
        $serializer->expects(
            new \PHPUnit_Framework_MockObject_Matcher_InvokedCount(1)
        )->method('serialize')->willReturn('<?xml version "1.0" ?>');
        $response = (new Document($serializer))->generate(new LeadBag);
        $this->assertEquals('<?xml version "1.0" ?>', $response);
    }

    private function mockSerializer()
    {
        return $this->getMockBuilder(SerializerInterface::class)->getMock();
    }
}
