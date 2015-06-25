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
            ['title' => 'User', 'slug' => 'user'],
            ['title' => 'Administrator', 'slug' => 'admin']
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
                'title' => 'Blog 1',
                'summary' => $lipsum,
                'user_id' => 1
            ],[
                'title' => 'Blog 2',
                'summary' => $lipsum,
                'user_id' => 2
            ],[
                'title' => 'Blog 3',
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
                'blog_id' => 1,
                'user_id' => 1
            ],[
                'title' => 'Post 2',
                'slug' => 'post-2',
                'summary' => $lipsum,
                'content' => $lipsum,
                'active' => true,
                'blog_id' => 2,
                'user_id' => 2
            ],[
                'title' => 'Post 3',
                'slug' => 'post-3',
                'summary' => $lipsum,
                'content' => $lipsum,
                'active' => false,
                'blog_id' => 2,
                'user_id' => 2
            ],[
                'title' => 'Post 4',
                'slug' => 'post-4',
                'summary' => $lipsum,
                'content' => $lipsum,
                'active' => false,
                'blog_id' => 3,
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
            ],[
                'content' => $lipsum,
                'user_id' => 2,
                'post_id' => 2
            ],[
                'content' => $lipsum,
                'user_id' => 1,
                'post_id' => 3
            ],[
                'content' => $lipsum,
                'user_id' => 2,
                'post_id' => 3
            ]
        ];
        foreach ($comments as $comment) {
            Comment::create($comment);
        }

        Model::reguard();
    }
}
?>