<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Image Entity
 *
 * @property string $id
 * @property string $fullpath
 * @property string $path
 * @property string $name
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property string|null $createdby
 *
 * @property \App\Model\Entity\Payment[] $payments
 * @property \App\Model\Entity\ProductImage[] $product_images
 * @property \App\Model\Entity\User[] $users
 */
class Image extends Entity
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
        'fullpath' => true,
        'path' => true,
        'name' => true,
        'created' => true,
        'modified' => true,
        'createdby' => true,
        'payments' => true,
        'product_images' => true,
        'users' => true,
    ];
}
