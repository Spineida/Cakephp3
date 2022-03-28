<?php
namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $lastname
 * @property string|null $phone
 * @property string $email
 * @property string $password
 * @property bool $active
 * @property int $role_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Role $role
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
     * @var array
     */
    // protected $_accessible = [
    //     'name' => true,
    //     'lastname' => true,
    //     'phone' => true,
    //     'email' => true,
    //     'password' => true,
    //     'password_confirmation' => true,
    //     'active' => true,
    //     'role_id' => true,
    //     'created' => true,
    //     'modified' => true,
    //     'role' => true,
    // ];

    protected $_accessible = [
        '*' => true,
        'id' => false
    ];


    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];

    protected function _setPassword($password){
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }

    public function getFullName(){
        return $this->name. ' ' . $this->lastname;
    }

    public function getParamterForChangeStatus(){
        $parameter = [
            'icon' => '<i class="fas fa-eye"></i>', 
            'message' => '¿Estás seguro que deseas cambiar el espado del {0} {1} a desactivado?'
        ];

        if($this->active == 0){
            $parameter = [
                'icon' => '<i class="fas fa-eye-slash"></i>', 
                'message' => '¿Estás seguro que deseas cambiar el espado del {0} {1} a activo?'
            ]; 
        }

        return $parameter;
    }

    public function getNameStatus(){
        return $this->active == 1 ? 'Activo': 'Desactivado';
    }
}
