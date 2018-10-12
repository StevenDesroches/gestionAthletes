<?php
namespace App\Model\Entity;

use Cake\ORM\Behavior\Translate\TranslateTrait;
use Cake\ORM\Entity;

/**
 * Athlete Entity
 *
 * @property int $id
 * @property string $firstName
 * @property string $lastName
 * @property string $other
 * @property int $clubs_id
 * @property int $user_id
 * @property int $genres_id
 * @property int $events_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Club $club
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Genre $genre
 * @property \App\Model\Entity\Event $event
 */
class Athlete extends Entity
{
    use TranslateTrait;

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
        'firstName' => true,
        'lastName' => true,
        'other' => true,
        'clubs_id' => true,
        'user_id' => true,
        'genres_id' => true,
        'events_id' => true,
        'created' => true,
        'modified' => true,
        'club' => true,
        'user' => true,
        'genre' => true,
        'event' => true
    ];
}
