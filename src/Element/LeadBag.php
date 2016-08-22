<?php
/*
 * This file is part of the adf package.
 *
 * (c) Mauro Moreno <moreno.mauro.emanuel@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MauroMoreno\AutoLeadDataFormat\Element;

use JMS\Serializer\Annotation as JMS;
use MauroMoreno\AutoLeadDataFormat\Exception\InvalidArgumentException;

/**
 * Class LeadBag
 * @JMS\ExclusionPolicy("none")
 * @JMS\XmlRoot("adf")
 * @package MauroMoreno\AutoLeadDataFormat\Element
 * @author  Mauro Moreno <moreno.mauro.emanuel@gmail.com>
 */
class LeadBag
{
    /**
     * @var Lead[]
     *
     * @JMS\Type("array<MauroMoreno\AutoLeadDataFormat\Element\Lead>")
     * @JMS\XmlList(inline = true, entry = "prospect")
     */
    private $leads;

    /**
     * @return Lead[]
     */
    public function getLeads(): array
    {
        return $this->leads;
    }

    /**
     * @param array $leads
     *
     * @return $this
     */
    public function setLeads(array $leads)
    {
        foreach ($leads as $lead) {
            if (!$lead instanceof Lead) {
                throw new InvalidArgumentException(
                    'Leads should be an array of Lead.'
                );
            }
        }
        $this->leads = $leads;
        return $this;
    }
}
