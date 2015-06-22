<?php

use App\Blog;
use App\Comment;
use App\Contact;
use App\Post;
use App\PostTag;
use App\Role;
use App\Tag;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

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


        // Création des roles
        $roles = [
            ['title' => 'Administrator', 'slug' => 'admin'],
            ['title' => 'User', 'slug' => 'user']
        ];
        foreach ($roles as $role) {
            Role::create($role);
        }

        // Création des users
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@admin.fr',
                'password' => Hash::make('admin'),
                'seen' => true,
                'role_id' => 1,
                'valid' => true
            ],[
                'name' => 'user',
                'email' => 'user@user.fr',
                'password' => Hash::make('admin'),
                'seen' => true,
                'role_id' => 1,
                'valid' => true
            ]
        ];
        foreach ($users as $user) {
            User::create($user);
        }

        // Création des Contact
        $contacts = [
            [
                'name' => 'user',
                'email' => 'user@user.fr',
                'text' => 'Lorem ipsum inceptos malesuada leo fusce tortor sociosqu semper, facilisis semper class tempus faucibus tristique duis eros, cubilia quisque habitasse aliquam fringilla orci non. Vel laoreet dolor enim justo facilisis neque accumsan, in ad venenatis hac per dictumst nulla ligula, donec mollis massa porttitor ullamcorper risus. Eu platea fringilla, habitasse.'
            ],[
                'name' => 'user',
                'email' => 'user@user.fr',
                'text' => 'Lorem ipsum inceptos malesuada leo fusce tortor sociosqu semper, facilisis semper class tempus faucibus tristique duis eros, cubilia quisque habitasse aliquam fringilla orci non. Vel laoreet dolor enim justo facilisis neque accumsan, in ad venenatis hac per dictumst nulla ligula, donec mollis massa porttitor ullamcorper risus. Eu platea fringilla, habitasse.',
                'seen' => true
            ]
        ];
        foreach ($contacts as $contact) {
            Contact::create($contact);
        }

        // Création des Tags
        $tags = [
            ['tag' => 'Tag1'],
            ['tag' => 'Tag2'],
            ['tag' => 'Tag3'],
            ['tag' => 'Tag4'],
        ];
        foreach ($tags as $tag) {
            Tag::create($tag);
        }

        // Création des blog
        $blogs = [
            [
                'title' => 'Post 1',
                'summary' => $lipsum,
                'user_id' => 1
            ],[
                'title' => 'Post 2',
                'summary' => $lipsum,
                'user_id' => 2
            ],[
                'title' => 'Post 3',
                'summary' => $lipsum,
                'user_id' => 2
            ]
        ];
        foreach ($blogs as $blog) {
            Blog::create($blog);
        }

        // Création des Post
        $posts = [
            [
                'title' => 'Post 1',
                'slug' => 'post-1',
                'summary' => $lipsum,
                'content' => $lipsum,
                'active' => true,
                'user_id' => 1
            ],[
                'title' => 'Post 2',
                'slug' => 'post-2',
                'summary' => $lipsum,
                'content' => $lipsum,
                'active' => true,
                'user_id' => 2
            ],[
                'title' => 'Post 3',
                'slug' => 'post-3',
                'summary' => $lipsum,
                'content' => $lipsum,
                'active' => false,
                'user_id' => 2
            ]
        ];
        foreach ($posts as $post) {
            Post::create($post);
        }

        // Association des tag au post
        $posttags = [
            [
                'post_id' => 1,
                'tag_id' => 1
            ],[
                'post_id' => 1,
                'tag_id' => 2
            ],[
                'post_id' => 2,
                'tag_id' => 1
            ],[
                'post_id' => 2,
                'tag_id' => 2
            ],[
                'post_id' => 2,
                'tag_id' => 3
            ],[
                'post_id' => 3,
                'tag_id' => 1
            ],[
                'post_id' => 3,
                'tag_id' => 2
            ]
        ];
        foreach ($posttags as $posttag) {
            PostTag::create($posttag);
        }

        // Ajout des commentaires
        $comments = [
            [
                'content' => $lipsum,
                'user_id' => 2,
                'post_id' => 1
            ],[
                'content' => $lipsum,
                'user_id' => 1,
                'post_id' => 1
            ],[
                'content' => $lipsum,
                'user_id' => 2,
                'post_id' => 1
            ]
        ];
        foreach ($comments as $comment) {
            Comment::create($comment);
        }

        Model::reguard();
    }
}
?>