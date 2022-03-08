<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the post.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $listPost = Post::orderBy('id', 'DESC');
        return view('query_builder.post.list', compact('listPost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        return view('query_builder.post.list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostRequest $request)
    {
        $postNew = $request->only(
            [
                'title',
                'content'
            ]
        );
        if ($postNew) {
            Post::query()->create($postNew);
            return redirect()->route('post')->with('success', 'Tạo bài đăng thành công.');
        }
        return redirect()->route('post')->with('error', 'Tạo bài đăng thất bại.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|\Illuminate\Http\Response|object
     */
    public function show($id)
    {
        $post = Post::query()
            ->with('comments')
            ->where('id', $id)
            ->first();
        return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only([
           'title',
           'url',
           'content'
        ]);
        Post::query()->where('id', $id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return int
     */
    public function destroy($id)
    {
        Comment::where('post_id', $id)->delete();
        Post::where('id', $id)->delete();
        return 1;
    }
}
