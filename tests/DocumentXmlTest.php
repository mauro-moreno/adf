<?php

namespace MauroMoreno\AutoLeadDataFormat\Tests;

use DateTime;
use JMS\Serializer\SerializerBuilder;
use MauroMoreno\AutoLeadDataFormat\Document;
use MauroMoreno\AutoLeadDataFormat\Element\Lead;
use MauroMoreno\AutoLeadDataFormat\Element\LeadBag;
use MauroMoreno\AutoLeadDataFormat\Element\Vehicle;

class DocumentXmlTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $serializer = SerializerBuilder::create()
            ->addMetadataDir(__DIR__ . '/../resources/config/serializer')
            ->build();
        $this->document = new Document($serializer);
    }

    public function testBasicXml()
    {
        $xml_string = $this->document
            ->generate((new LeadBag)->setLeads([
                (new Lead)->setVehicles([
                    new Vehicle
                ])
            ]));
        $xml_object = simplexml_load_string($xml_string);

        $xml_string_for_comparision = $this->getXml('basic.xml');
        $xml_object_for_comparision = simplexml_load_string($xml_string_for_comparision);

        $this->assertTrue(DateTime::createFromFormat(
            DateTime::ATOM,
            $xml_object->prospect->requestdate
        ) !== false);
        $this->assertEquals(
            $xml_object_for_comparision->prospect->attributes(),
            $xml_object->prospect->attributes()
        );
        $this->assertEquals(1, count($xml_object->xpath('prospect[1]/vehicle')));
        $this->assertEquals(
            count($xml_object_for_comparision->xpath('prospect[1]/vehicle')),
            count($xml_object->xpath('prospect[1]/vehicle'))
        );
        $this->assertEquals(
            $xml_object_for_comparision->xpath('prospect[1]/vehicle'),
            $xml_object->xpath('prospect[1]/vehicle')
        );
    }

    private function getXml($file_name)
    {
        return file_get_contents(__DIR__ . '/xml_samples/' . $file_name);
    }
}
