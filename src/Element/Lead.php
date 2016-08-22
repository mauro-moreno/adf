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

use DateTime;
use JMS\Serializer\Annotation as JMS;
use MauroMoreno\AutoLeadDataFormat\Exception\InvalidArgumentException;

/**
 * Class Lead
 * @package MauroMoreno\AutoLeadDataFormat\Element
 * @author  Mauro Moreno <moreno.mauro.emanuel@gmail.com>
 */
class Lead
{
    /**
     * @var DateTime
     *
     * @JMS\SerializedName("requestdate")
     * @JMS\Type("DateTime")
     * @JMS\XmlElement(cdata=false)
     */
    private $request_date;

    /**
     * @var string
     *
     * @JMS\XmlAttribute
     */
    private $status = 'new';

    /**
     * Lead constructor.
     */
    public function __construct()
    {
        $this->request_date = new DateTime;
    }

    /**
     * @return DateTime
     */
    public function getRequestDate()
    {
        return $this->request_date;
    }

    /**
     * @param DateTime $request_date
     *
     * @return $this
     */
    public function setRequestDate(DateTime $request_date)
    {
        $this->request_date = $request_date;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return $this
     */
    public function setStatus(string $status)
    {
        if (!in_array($status, ['new', 'resend'])) {
            throw new InvalidArgumentException(
                'Status can only be new or resend.'
            );
        }
        $this->status = $status;
        return $this;
    }
}
