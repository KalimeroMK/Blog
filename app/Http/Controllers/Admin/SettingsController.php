<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings as Settings;
use App\Models\User as User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class SettingsController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		$settings = Settings::first();
		$users = User::all();

		$data = ['users' => $users, "settings" => $settings];
		if (empty($settings)) {

			return view('admin.settings.settings')->with($data);
		} else {
			$settings = Settings::first()->get();
			$data = ['users' => $users, "settings" => $settings];
			return view('admin.settings.index')->with($data);
		}
	}

	public function store(Request $request) {

		$errors = Validator::make($request->all(), [
			'title' => 'required|max:255',
			'description' => 'required',
			'mainurl' => 'required',
			'email' => 'required',
			'address' => 'required',
			'phone' => 'required',
			'logo' => 'required',
		]);

		if ($errors->fails()) {
			return redirect()->back()
				->withErrors($errors)
				->withInput();
		}

		$input = $request->all();

		if ($request->hasFile('logo')) {

			$image = $request->file('logo');
			$path = public_path() . '/images/logo';
			$pathThumb = public_path() . '/images/logo/thumbnails/';
			$pathMedium = public_path() . '/images/logo/medium/';
			$ext = $image->getClientOriginalExtension();
			$imageName = 'logo.' . $ext;

			$image->move($path, $imageName);

			$findimage = public_path() . '/images/logo/' . $imageName;
			$imagethumb = Image::make($findimage)->resize(200, null, function ($constraint) {
				$constraint->aspectRatio();
			});

			$imagemedium = Image::make($findimage)->resize(600, null, function ($constraint) {
				$constraint->aspectRatio();
			});

			$imagethumb->save($pathThumb . $imageName);
			$imagemedium->save($pathMedium . $imageName);

			$image = $request->imagethumb = $imageName;
			$imagethumb = $request->image = $imageName;
			$imagemedium = $request->image = $imageName;

			$input['logo'] = $image;
			$input['logomedium'] = $imagemedium;
			$input['logothumb'] = $imagethumb;

		}

		Settings::create($input);

		Session::flash('flash_message', 'Settings successfully created!');

		return redirect()->back();
	}

	public function edit($id) {
		$settings = Settings::FindOrFail($id);
		$users = User::all();
		$data = ['users' => $users, "settings" => $settings];
		return view('admin.settings.editsettings')->with($data);
	}

	public function update(Request $request) {

		$errors = Validator::make($request->all(), [
			'title' => 'required|max:255',
			'description' => 'required',
			'mainurl' => 'required',
			'email' => 'required',
			'address' => 'required',
			'phone' => 'required',
		]);

		if ($errors->fails()) {
			return redirect()->back()
				->withErrors($errors)
				->withInput();
		}

		$input = $request->all();
		$settings = Settings::FindOrFail($request->id);

		$settings->fill($input)->save();

		if ($request->hasFile('logo')) {

			$image = $request->file('logo');
			$path = public_path() . '/images/logo';
			$pathThumb = public_path() . '/images/logo/thumbnails/';
			$pathMedium = public_path() . '/images/logo/medium/';
			$ext = $image->getClientOriginalExtension();
			$imageName = 'logo.' . $ext;

			$image->move($path, $imageName);

			$findimage = public_path() . '/images/logo/' . $imageName;
			$imagethumb = Image::make($findimage)->resize(200, null, function ($constraint) {
				$constraint->aspectRatio();
			});

			$imagemedium = Image::make($findimage)->resize(600, null, function ($constraint) {
				$constraint->aspectRatio();
			});

			$imagethumb->save($pathThumb . $imageName);
			$imagemedium->save($pathMedium . $imageName);

			$image = $request->imagethumb = $imageName;
			$imagethumb = $request->image = $imageName;
			$imagemedium = $request->image = $imageName;

			$input['logo'] = $image;
			$input['logomedium'] = $imagemedium;
			$input['logothumb'] = $imagethumb;
		}

		$settings->fill($input)->save();

		Session::flash('flash_message', 'Settings successfully edited!');

		return redirect()->back();
	}
}
