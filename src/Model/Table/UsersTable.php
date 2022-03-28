<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\RolesTable&\Cake\ORM\Association\BelongsTo $Roles
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER',
        ]);

        $this->addBehavior('Search.Search');
        $this->searchManager()
            ->add('fullname', 'Search.Like', [
                'before' => true,
                'after' => true,
                'field' => ['name', 'lastname']
            ])
            ->add('email', 'Search.Like', [
                'before' => true,
                'after' => true
            ])
            ->add('role_id', 'Search.Like')
            ->add('status', 'Search.Like', [
                'field' => ['active']
            ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 80, 'Máximo de 80 caracteres')
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('lastname')
            ->maxLength('lastname', 80, 'Máximo de 80 caracteres')
            ->requirePresence('lastname', 'create')
            ->notEmptyString('lastname');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 12, 'Máximo de 12 números')
            ->allowEmptyString('phone')
            ->add('phone', 'valid_Format', [
                'rule' => ['custom', '/\A(\+?56)?(\s?)(0?9)(\s?)[9876543]\d{7}\z/'],
                'message' => 'Número no valido'
            ]);

        $validator
            ->email('email', false , 'Tiene que tener formato de email')
            ->maxLength('name', 80, 'Máximo de 80 caracteres')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->allowEmptyString('password', 'update')
            ->add('password', 'minLength', [
                'rule' => ['minLength', 6],
                'message' => 'La contraseña debe tener un mínimo de 6 caracteres.'
            ])
            ->add('password', 'maxLength', [
                'rule' => ['maxLength', 20],
                'message' => 'La contraseña no puede tener más de 20 caracteres.'
            ]);

        $validator
            ->sameAs('password', 'password_confirmation', 'Las contraseñas no coinciden.');
            
        $validator
            ->boolean('active')
            ->notEmptyString('active');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email'], 'El correo ya esta en uso'));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));

        return $rules;
    }
}
