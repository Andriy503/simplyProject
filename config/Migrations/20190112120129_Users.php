<?php
use Migrations\AbstractMigration;

class Users extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users');

        if(!$table->exists()) {
            $table
                ->addColumn('full_name', 'string', [
                    'limit' => 50,
                    'null' => true
                ])
                ->addColumn('email', 'string', [
                    'limit' => 40,
                    'null' => true
                ])
                ->addColumn('password', 'string', [
                    'limit' => 255,
                    'null' => true
                ])
                ->addColumn('is_deleted', 'boolean', [
                    'default' => 0
                ])
                ->addColumn('is_banned', 'boolean', [
                    'default' => 0
                ])
                ->addTimestamps('created', 'modified')
                ->create();
        }
    }
}
