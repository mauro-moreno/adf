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

use MauroMoreno\AutoLeadDataFormat\Exception\InvalidArgumentException;

/**
 * Class Vehicle
 * @package MauroMoreno\AutoLeadDataFormat\Element
 * @author  Mauro Moreno <moreno.mauro.emanuel@gmail.com>
 */
class Vehicle
{
    /**
     * @var string
     */
    private $interest = 'buy';

    /**
     * @var string
     */
    private $status = 'new';

    /**
     * @return string
     */
    public function getInterest(): string
    {
        return $this->interest;
    }

    /**
     * @param string $interest
     *
     * @return $this
     */
    public function setInterest(string $interest)
    {
        $interests = [ 'buy', 'lease', 'sell', 'trade-in', 'test-drive' ];
        if (!in_array($interest, $interests)) {
            throw new InvalidArgumentException(
                'Status can only be buy, lease, sell, trade-in or test-drive.'
            );
        }
        $this->interest = $interest;
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
        if (!in_array($status, [ 'new', 'resend' ])) {
            throw new InvalidArgumentException(
                'Status can only be new or resend.'
            );
        }
        $this->status = $status;
        return $this;
    }
}
