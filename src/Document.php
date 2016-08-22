<?php
/*
 * This file is part of the adf package.
 *
 * (c) Mauro Moreno <moreno.mauro.emanuel@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MauroMoreno\AutoLeadDataFormat;

use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\SerializerInterface;
use MauroMoreno\AutoLeadDataFormat\Element\LeadBag;

AnnotationRegistry::registerLoader('class_exists');

/**
 * Class Document
 * @package MauroMoreno\AutoLeadDataFormat
 * @author  Mauro Moreno <moreno.mauro.emanuel@gmail.com>
 */
class Document
{
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function generate(LeadBag $leadBag)
    {
        return $this->serializer->serialize($leadBag, 'xml');
    }
}
