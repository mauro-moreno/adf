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
use MauroMoreno\AutoLeadDataFormat\Exception\InvalidArgumentException;
use MauroMoreno\AutoLeadDataFormat\Exception\LogicException;

/**
 * Class Lead
 * @package MauroMoreno\AutoLeadDataFormat\Element
 * @author  Mauro Moreno <moreno.mauro.emanuel@gmail.com>
 */
class Lead
{
    /**
     * @var DateTime
     */
    private $request_date;

    /**
     * @var string
     */
    private $status = 'new';

    /**
     * @var Vehicle[]
     */
    private $vehicles = [];

    /**
     * @return DateTime
     */
    public function getRequestDate()
    {
        if (empty($this->request_date)) {
            $this->request_date = new DateTime;
        }
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

    /**
     * @return Vehicle[]
     */
    public function getVehicles(): array
    {
        if (count($this->vehicles) === 0) {
            throw new LogicException(
                'Vehicles must contain at least a Vehicle.'
            );
        }
        return $this->vehicles;
    }

    /**
     * @param Vehicle[] $vehicles
     *
     * @return $this
     */
    public function setVehicles(array $vehicles)
    {
        foreach ($vehicles as $vehicle) {
            if (!$vehicle instanceof Vehicle) {
                throw new InvalidArgumentException(
                    'Vehicles must be an array of Vehicle.'
                );
            }
        }
        $this->vehicles = $vehicles;
        return $this;
    }
}
