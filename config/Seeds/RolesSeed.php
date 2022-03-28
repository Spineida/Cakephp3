<?php
use Migrations\AbstractSeed;

/**
 * Roles seed.
 */
class RolesSeed extends AbstractSeed
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
                'name'   =>  "Admin"
            ],
            [
                'name'   =>  "Visita",
            ]
        ];

        $this->table('roles')
            ->insert($data)
            ->save();
    }
}
