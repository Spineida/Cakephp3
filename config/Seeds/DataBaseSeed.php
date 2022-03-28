<?php
use Migrations\AbstractSeed;

/**
 * DataBase seed.
 */
class DataBaseSeed extends AbstractSeed
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
        $this->call('RolesSeed');
        $this->call('UsersSeed');
    }
}
