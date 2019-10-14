<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index()
    {
        /** Setup post query arguments */
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $posts_args = [
            'posts_per_page' => 10,
            'paged' => $paged,
            'post_type' => 'post',
            'order' => 'DESC',
            'orderby' => 'post_date'
        ];
        $posts = new \WP_Query($posts_args);

        return view('blog.index', compact('posts', 'paged'));
    }

    public function showPost($postName)
    {
        /** Load specific post by name */
        $posts_args = [
            'name' => $postName,
            'post_type' => 'post',
        ];

        $posts = new \WP_Query($posts_args);

        /** If postName doesn't exist trigger 404 */
        if (!$posts->have_posts()) {
            abort(404);
        }

        return view('blog.post', compact('posts'));
    }
}
