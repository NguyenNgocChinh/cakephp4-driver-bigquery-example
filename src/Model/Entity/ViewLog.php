<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'id' => true,
        'name' => true,
        'email' => true,
    ];

    /**
    * Support for big query connection
    */
    protected $_dataTypes = [
        'id' => [
            'type' => 'string',
            'length' => 36,
            'null' => false,
            'default' => null,
        ],
        'name' => [
            'type' => 'string',
            'null' => true,
            'default' => null,
            'comment' => null,
        ],
        'email' => [
            'type' => 'string',
            'null' => true,
            'default' => null,
            'comment' => null,
        ],
    ];

    /**
     * Returns the data types for each field in the entity.
     *
     * @return array<string, string> An associative array where the keys are field names and the values are data types.
     */
    public function getDataTypes(): array
    {
        return $this->_dataTypes;
    }
}
