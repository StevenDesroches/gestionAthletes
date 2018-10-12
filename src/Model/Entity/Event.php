<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Event Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $date
 * @property string $name
 * @property string $distance
 * @property string $other
 * @property int $clubs_id
 * @property int $eventTypes_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modifed
 *
 * @property \App\Model\Entity\Club $club
 * @property \App\Model\Entity\Eventtype $eventtype
 */
class Event extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'date' => true,
        'name' => true,
        'distance' => true,
        'other' => true,
        'clubs_id' => true,
        'eventTypes_id' => true,
        'created' => true,
        'modifed' => true,
        'club' => true,
        'eventtype' => true
    ];
}
