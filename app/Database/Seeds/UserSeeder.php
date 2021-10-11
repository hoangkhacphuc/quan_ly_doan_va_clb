<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'blog_title' => 'title',
                'blog_description' => 'ken'
            ],
            [
                'blog_title' => 'title2',
                'blog_description' => 'ken2'
            ]
        ];

        $this->db->table('user')->insertBatch($data);
    }
}
