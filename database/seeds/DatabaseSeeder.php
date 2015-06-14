<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $lipsum = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, aperiam dignissimos distinctio exercitationem fugit harum in inventore maiores molestias mollitia officiis, perferendis quibusdam quisquam, ratione recusandae reprehenderit temporibus tenetur unde?";

        Role::create([
            'title' => 'Administrator',
            'slug' => 'admin'
        ]);

        Model::reguard();
    }
}
?>