<?php

use App\Blog;
use App\Comment;
use App\Post;
use App\PostTag;
use App\Role;
use App\Tag;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;


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

        $nbUser = 15;
        $nbBlog = 100;
        $nbPost = 500;
        $nbComment = 1000;
        $nbTag = 5;

        // Create a Faker object
        $faker = Faker::create();

        // Création des roles
        $roles = [
            ['title' => 'User', 'slug' => 'user'],
            ['title' => 'Administrator', 'slug' => 'admin']
        ];
        foreach ($roles as $role) {
            Role::create($role);
        }

        // Création des users
        User::create([
            'name' => str_slug('mickael'),
            'email' => 'mickael.villers@epitech.eu',
            'password' => Hash::make('password'),
            'seen' => true,
            'role_id' => 2,
            'valid' => true
        ]);
        foreach (range(0, $nbUser) as $number) {
            User::create([
                'name' => str_slug($faker->name),
                'email' => $faker->email,
                'password' => Hash::make('password'),
                'seen' => true,
                'role_id' => 1,
                'valid' => true
            ]);
        }

        // Création des Tags
        $tags = ['game','video','music','cinema', 'internet'];
        foreach ($tags as $tag) {
            Tag::create(['tag' => $tag]);
        }

        // Creation des blogs
        foreach (range(0, $nbBlog) as $number) {
            Blog::create([
                'title' => $faker->sentence(4),
                'summary' => $faker->sentence(10),
                'user_id' => $faker->randomElement(range(1, $nbUser))
            ]);
        }

        // Création des posts
        foreach (range(0, $nbPost) as $number) {
            Post::create([
                'title' => $faker->sentence(4),
                'slug' => $faker->slug,
                'summary' => $faker->sentence(10),
                'content' => $faker->text,
                'active' => false,
                'blog_id' => $faker->randomElement(range(1, $nbBlog)),
                'user_id' => $faker->randomElement(range(1, $nbUser))
            ]);
        }

        // Association des tag au post
        foreach (range(1, $nbPost) as $number) {
            PostTag::create([
                'post_id' => $faker->randomElement(range(1 ,$nbPost)),
                'tag_id' => $faker->randomElement(range(1, 5))
            ]);
        }

        // Ajout des commentaires
        foreach (range(0, $nbComment) as $number) {
            Comment::create([
                'content' => $faker->text,
                'user_id' => $faker->randomElement(range(1, $nbUser)),
                'post_id' => $faker->randomElement(range(1, $nbPost))
            ]);
        }

        Model::reguard();
    }
}
?>