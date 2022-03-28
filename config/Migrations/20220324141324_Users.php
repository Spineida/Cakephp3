<?php
use Migrations\AbstractMigration;

class Users extends AbstractMigration
{
    public function up()
    {
        $this->table('users')
            ->addColumn('name', 'string', [
                'limit' => 80,
                'null'  => false,
            ])
            ->addColumn('lastname', 'string', [
                'limit' => 80,
                'null'  => false,
            ])
            ->addColumn('phone', 'string', [
                'limit' => 12,
                'null'  => true
            ])
            ->addColumn('email', 'string', [
                'limit' => 80,
                'null'  => false,
            ])
            ->addColumn('password', 'string', [
                'limit' => 255,
                'null'  => false,
            ])
            ->addColumn('active', 'boolean', [
                'default'   => '1',
                'limit'     => 1,
                'null'      => false,
            ])
            ->addColumn('role_id', 'integer', [
                'limit' => 3,
                'null'  => false,
            ])
            ->addColumn('created', 'datetime', [
                'default'   => null,
                'limit'     => null,
                'null'      => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default'   => null,
                'limit'     => null,
                'null'      => true,
            ])
            ->addIndex(
                [
                    'role_id',
                ]
            )
            ->create();
    }
}
