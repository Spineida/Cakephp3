<?php
use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;
/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id'        => '1',
                'name'      => 'Administrador',
                'lastname'  => 'Prueba',
                'phone'     => '56946268074',
                'email'     => 'administrador@prueba.cl',
                'password'  => (new DefaultPasswordHasher)->hash('clave.admin'),
                'role_id'   => 1,
                'created'   => date('Y-m-d H:i:s'),
                'modified'  => NULL
            ],
            [
                'id'        => '2',
                'name'      => 'Visita',
                'lastname'  => 'Prueba',
                'phone'     => '56948868756',
                'email'     => 'visita@prueba.cl',
                'password'  => (new DefaultPasswordHasher)->hash('clave.visita'),
                'role_id'   => 2,
                'created'   => date('Y-m-d H:i:s'),
                'modified'  => NULL
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
