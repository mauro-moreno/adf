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
use MauroMoreno\AutoLeadDataFormat\Exception\LogicException;

/**
 * Class LeadBag
 * @package MauroMoreno\AutoLeadDataFormat\Element
 * @author  Mauro Moreno <moreno.mauro.emanuel@gmail.com>
 */
class LeadBag
{
    /**
     * @var Lead[]
     */
    private $leads;

    /**
     * @return Lead[]
     */
    public function getLeads(): array
    {
        if (count($this->leads) === 0) {
            throw new LogicException(
                'Leads must contain at least one Lead.'
            );
        }
        return $this->leads;
    }

    /**
     * @param Lead[] $leads
     *
     * @return $this
     */
    public function setLeads(array $leads)
    {
        foreach ($leads as $lead) {
            if (!$lead instanceof Lead) {
                throw new InvalidArgumentException(
                    'Leads must be an array of Lead.'
                );
            }
        }
        $this->leads = $leads;
        return $this;
    }
}
