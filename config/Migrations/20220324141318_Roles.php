<?php
use Migrations\AbstractMigration;

class Roles extends AbstractMigration
{
    public function up()
    {
        $this->table('roles')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 60,
                'null' => false,
            ])
            ->create();
    }
}
