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
use MauroMoreno\AutoLeadDataFormat\Exception\LogicException;

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
    private $make = '';

    /**
     * @var string
     */
    private $model = '';

    /**
     * @var string
     */
    private $status = 'new';

    /**
     * @var int
     */
    private $year = 0;

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
    public function getMake(): string
    {
        if (empty($this->make)) {
            throw new LogicException('Make cannot be an empty value.');
        }
        return $this->make;
    }

    /**
     * @param string $make
     *
     * @return $this
     */
    public function setMake(string $make)
    {
        $this->make = $make;
        return $this;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        if (empty($this->model)) {
            throw new LogicException('Model cannot be an empty value.');
        }
        return $this->model;
    }

    /**
     * @param string $model
     *
     * @return $this
     */
    public function setModel(string $model)
    {
        $this->model = $model;
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

    /**
     * @return int
     */
    public function getYear(): int
    {
        if (empty($this->year)) {
            throw new LogicException('Year cannot be an empty value.');
        }
        return $this->year;
    }

    /**
     * @param int $year
     *
     * @return $this
     */
    public function setYear(int $year)
    {
        $this->year = $year;
        return $this;
    }
}
