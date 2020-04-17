<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Tag;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::latest()->paginate(6);
        return view('posts.index', compact('posts'));
    }

    public function userIndex(User $user)
    {
        // dd($slug);
        $userId = $user->id;
        $posts = Post::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('posts.userIndex', compact(  'user', 'posts'));
    }

    public function create(Tag $tags)
    {
        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }

    public function store(User $user, Post $post)
    {
        $data = request()->validate([
            'title' => 'required',
            'image' => 'required|image',
            'content' => 'required',
            'tags.*.name' => 'exists'
        ]);

        $imagePath = request('image')->store('posts', 'public');

        $image = Image::make(public_path("/storage/{$imagePath}"))->fit(1000, 2000);
        $image->save();

        $created_post = auth()->user()->posts()->create([
            'title' => $data['title'],
            'image' => $imagePath,
            'content' => $data['content'],
        ]);
        //attaching an array of tags' id to created post
        $created_post->tags()->attach(request('tags'));


        return redirect("/posts");
    }

    public function show(Post $post)
    {
        $post->load('user.profile');
        return view('posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/posts');
    }

}
