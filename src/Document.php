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

use JMS\Serializer\SerializerInterface;
use MauroMoreno\AutoLeadDataFormat\Element\LeadBag;

/**
 * Class Document
 * @package MauroMoreno\AutoLeadDataFormat
 * @author  Mauro Moreno <moreno.mauro.emanuel@gmail.com>
 */
class Document
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * Document constructor.
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param LeadBag $leadBag
     * @return string
     */
    public function generate(LeadBag $leadBag)
    {
        return $this->serializer->serialize($leadBag, 'xml');
    }
}
