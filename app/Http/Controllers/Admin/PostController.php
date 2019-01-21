<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DestroyPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User as User;
use App\Services\PostFormFields;
use DB;
use Illuminate\Http\Request;

class PostController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {

		$users = User::all();
		$posts = Post::with('tags')
			->orderBy('id', 'desc')
			->paginate(config('admin.posts_per_page'));

		$data = [
			'posts' => $posts, 'users' => $users,
		];

		return view('admin.post.index')->with($data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$users = User::get();
		$service = new PostFormFields();
		$this->data = $service->handle();
		$this->data['categories'] = DB::table('categories')->get();
		return view('admin.post.create', $this->data);
	}

	/**
	 * Store a newly created post in storage.
	 *
	 * @param \App\Http\Requests\StorePostRequest $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store(StorePostRequest $request) {
		$post = Post::create($request->postFillData());

		$post->syncTags($request->get('tags', []));

		return redirect()->route('editpost', [$post])
			->withSuccess(trans('messages.success.post-created'));
	}

	/**
	 * Show the form for editing the specified post.
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$service = new PostFormFields($id);
		$this->data = $service->handle();
		$this->data['categories'] = DB::table('categories')->get();

		return view('admin.post.edit', $this->data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \App\Http\Requests\UpdatePostRequest $request
	 * @param int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdatePostRequest $request, $id) {
		$post = Post::findOrFail($id);
		$post->fill($request->postFillData());
		$post->save();
		$post->syncTags($request->get('tags', []));

		return redirect()
			->back()
			->withSuccess(trans('messages.success.post-updated'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Http\Requests\DestroyPostRequest $request
	 * @param int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(DestroyPostRequest $request, $id) {
		$post = Post::findOrFail($id);
		$post->tags()->detach();
		$post->delete();

		return redirect()
			->route('admin.posts')
			->withSuccess(trans('messages.success.post-deleted'));
	}
}
