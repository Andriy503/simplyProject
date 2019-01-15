<?php
use Migrations\AbstractSeed;

/**
 * AdminUsers seed.
 */
class AdminUsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'email' => 'support_admin@gmail.com',
                'password' => (new \Cake\Auth\DefaultPasswordHasher())->hash('sdffLsfdO*#&Ysdf'),
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ]
        ];

        foreach ($data as $item) {
            try {
                $table = $this->table('admin_users');
                $table->insert($item)->save();
            } catch (\Exception $e) {
                continue;
            }
        }
    }
}
