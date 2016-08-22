<?php

namespace MauroMoreno\AutoLeadDataFormat\Tests;

use DateTime;
use JMS\Serializer\SerializerBuilder;
use MauroMoreno\AutoLeadDataFormat\Document;
use MauroMoreno\AutoLeadDataFormat\Element\Lead;
use MauroMoreno\AutoLeadDataFormat\Element\LeadBag;

class DocumentXmlTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $serializer = SerializerBuilder::create()->build();
        $this->document = new Document($serializer);
    }

    public function testEmptyXml()
    {
        $xml = $this->document->generate(new LeadBag);
        $this->assertEquals($this->getXml('empty.xml'), $xml);
    }

    public function testDefaultXml()
    {
        $xml_string = $this->document
            ->generate((new LeadBag)->setLeads([new Lead]));
        $xml_object = simplexml_load_string($xml_string);

        $xml_string_for_comparision = $this->getXml('default.xml');
        $xml_object_for_comparision = simplexml_load_string($xml_string_for_comparision);

        $this->assertTrue(DateTime::createFromFormat(
            DateTime::ATOM,
            $xml_object->prospect->requestdate
        ) !== false);
        $this->assertEquals(
            $xml_object_for_comparision->prospect->attributes(),
            $xml_object->prospect->attributes()
        );
    }

    private function getXml($file_name)
    {
        return file_get_contents(__DIR__ . '/xml_samples/' . $file_name);
    }
}
