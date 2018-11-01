<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category as Category;
use App\Models\Sliders as Slider;
use App\Models\User as User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{

    public function index()
    {

        $categories = Category::roots()->get();
        $list = Category::getTree($categories);
        $data = ['list' => $list];
        return view('admin.category.categories')->with($data);
    }

    public function create()
    {
        $cat = Category::first();
        if (empty($cat)) {
            return view('admin.category.createcategory')->with(['status' => false]);
        }
        $categories = Category::roots()->with('children')->first()->all();
        $data = ['status' => true, 'categories' => $categories];
        return view('admin.category.createcategory')->with($data);

    }

    public function store(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($errors->fails()) {
            return redirect()->back()
                ->withErrors($errors)
                ->withInput();
        }

        $request['slug'] = str_slug($request['name']);
        $slug = Category::where('name', $request['name'])->get();
        if ($slug) {
            $request['slug'] = $request['slug'] . '-' . count($slug);
        }

        $input = $request->all();

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $path = public_path() . '/images/categories';
            $pathThumb = public_path() . '/images/categories/thumbnails/';
            $pathMedium = public_path() . '/images/categories/medium/';
            $ext = $image->getClientOriginalExtension();

            if ($count > 0) {
                $imageName = str_slug($input['name']) . '-' . $count . '.' . $ext;
            } else {
                $imageName = str_slug($input['name']) . '.' . $ext;
            }

            $image->move($path, $imageName);

            $findimage = public_path() . '/images/categories/' . $imageName;
            $imagethumb = Image::make($findimage)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $imagemedium = Image::make($findimage)->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image = $request->imagethumb = $imageName;
            $imagethumb = $request->image = $imageName;
            $imagemedium = $request->image = $imageName;

            $input['image'] = $image;
            $input['imagemedium'] = $imagemedium;
            $input['imagethumb'] = $imagethumb;

        }
//dd($request);

        if ($input['parent_id'] == "null") {
            if ($request->hasFile('image')) {
                $root = Category::create(['name' => $input['name'], 'slug' => $input['slug'], 'image' => $input['image'], 'decription' => $input['description']]);
            } else {
                $root = Category::create(['name' => $input['name'], 'slug' => $input['slug']]);
            }
        } else {
            if ($request->hasFile('image')) {
                $child = Category::create(['name' => $input['name'], 'slug' => $input['slug'], 'image' => $input['image'], 'decription' => $input['description']]);
            } else {
                $child = Category::create(['name' => $input['name'], 'slug' => $input['slug']]);
            }

            $child->makeChildOf($input['parent_id']);
        }
        Session::flash('flash_message', 'Category was successfully updated!');

        return redirect()->back();

        return redirect('/admin/category/categories');
    }

    public function show($id)
    {
        $category = Category::FindOrFail($id);
        $data = ['category' => $category];
        return view('admin.category.showcategory')->with($data);
    }

    public function edit($id)
    {
        $categories = Category::roots()->with('children')->first()->all();
        $category = Category::FindOrFail($id);
        $data = ['category' => $category, 'categories' => $categories];
        return view('admin.category.editcategory')->with($data);
    }

    public function update(Request $request, $id)
    {
        $errors = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($errors->fails()) {
            return redirect()->back()
                ->withErrors($errors)
                ->withInput();
        }

        $category = Category::FindOrFail($id);
        $request['slug'] = str_slug($request['name']);
        $slug = Category::where('name', $request['name'])->get();

        $input = $request->all();

        (int)$count = count($slug);

        if ($count > 0) {
            $request['slug'] = $request['slug'] . '-' . $count;
        }

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $path = public_path() . '/images/categories';
            $pathThumb = public_path() . '/images/categories/thumbnails/';
            $pathMedium = public_path() . '/images/categories/medium/';
            $ext = $image->getClientOriginalExtension();

            if ($count > 0) {
                $imageName = str_slug($input['name']) . '-' . $count . '.' . $ext;
            } else {
                $imageName = str_slug($input['name']) . '.' . $ext;
            }

            $image->move($path, $imageName);

            $findimage = public_path() . '/images/categories/' . $imageName;
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

            $input['image'] = $image;
            $input['imagemedium'] = $imagemedium;
            $input['imagethumb'] = $imagethumb;
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = public_path() . '/files/categories';
            $ext = $file->getClientOriginalExtension();
            $fileName = str_slug($request->filename) . rand(1000, 10000) . '.' . $ext;
            $file->move($path, $fileName);
            $input['file'] = $request->file = $fileName;
        }

        $category->fill($input)->save();

        Session::flash('flash_message', 'Category successfully edited!');

        return redirect('/admin/categories');
    }

    public function destroy($id)
    {
        $category = Category::FindOrFail($id);
        $category->delete();
        return redirect('/admin/categories');
    }

    public function addslider(Request $request)
    {
        $id = $request->id;
        $category = Category::FindOrFail($id);
        $users = User::all();
        $sliders = Slider::where('category_id', '=', $id)->get();
        $data = ['category' => $category, 'sliders' => $sliders, "users" => $users];
        return view('admin.category.addcategoryslider')->with($data);
    }

    public function sliderstore(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'image' => 'required',
        ]);

        if ($errors->fails()) {
            return redirect()->back()
                ->withErrors($errors)
                ->withInput();
        }

        $input = $request->all();

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $path = public_path() . '/images/sliders';
            $pathThumb = public_path() . '/images/sliders/thumbnails/';
            $pathMedium = public_path() . '/images/sliders/medium/';
            $ext = $image->getClientOriginalExtension();

            $imageName = rand(1003332, 1003332443434) . '.' . strtolower($ext);

            $image->move($path, $imageName);

            $findimage = public_path() . '/images/sliders/' . $imageName;
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

            $input['image'] = $image;
            $input['imagemedium'] = $imagemedium;
            $input['imagethumb'] = $imagethumb;

        }

        Slider::create($input);

        Session::flash('flash_message', 'Slider image successfully created!');

        return redirect()->back();

    }

    public function sliderdestroy(Request $request)
    {
        $slider = Slider::FindOrFail($request['id']);

        // Delete blog images
        $image = public_path() . '/images/sliders/' . $slider->image;
        $imagemedium = public_path() . '/images/sliders/medium/' . $slider->image;
        $imagethumb = public_path() . '/images/sliders/thumbnails/' . $slider->image;

        unlink($image);
        unlink($imagemedium);
        unlink($imagethumb);

        $slider->delete();
        return redirect()->back();
    }
}
