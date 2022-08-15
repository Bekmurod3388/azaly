<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Matcher\Not;
use Psy\Util\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:category-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(CategoryRequest $request)
    {

        $category = new Category();
        $category['name'] = $request['name'];

        if ($request->file('img')) {
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/categories/'), $filename);
            $category['img'] = $filename;
        }

        $data = $request['name'];
        $data = strtolower($data);
        $slug = str_slug($data, '-');

        $bormi = Category::all()->where('slug', $slug);
        if (count($bormi) > 0) {
            return redirect()->route('admin.categories.index')
                ->withErrors("Bu nomdagi kategoriyadan oldin foydalanilgan. Iltimos boshqa nomdan foydalaning !");
        }

        $category['slug'] = $slug;
        $category['parent_id'] = $request['parent_id'];
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('admin.categories.show', [
            'category' => $category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $c = Category::all();
        $category = Category::find($id);
        return view('admin.categories.edit', [
            'category' => $category,
            'categories' => $c
        ]);
    }


    public function update(CategoryRequest $request, $id)
    {

//        dd($request->validated());
        $category = Category::find($id);

        if ($category['name'] != $request['name']) {

            $category['name'] = $request['name'];
            $data = $request['name'];
            $slug = str_slug($data, '-');


            $bormi = Category::all()->where('slug', $slug);
            if (count($bormi) > 0) {
                return redirect()->back()
                    ->withErrors("Bu nomdagi kategoriyadan oldin foydalanilgan. Iltimos boshqa nomdan foydalaning !");
            }
            $category['slug'] = $slug;
        }
        $category['parent_id'] = (int)$request['parent_id'];
        if($request->hasFile('img')){
            $img=public_path('images/categories/').$category->img;
            if(\Illuminate\Support\Facades\File::exists($img)){
                File::delete($img);
            }

            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/categories/'), $filename);
            $category['img'] = $filename;

        }
        $category->update();

        return redirect()->route('admin.categories.index')->with('success', 'category updated successfully');
    }


    public function destroy(Category $category)
    {

        \Illuminate\Support\Facades\File::delete(public_path('Image/' . $category['img']));
        $id = $category->id;
        $eski = Category::all()->where('parent_id', $id);
        foreach ($eski as $e) {
            $t = Category::find($e->id);
            $t->parent_id = 0;
            $t->save();
        }
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'category created successfully');

    }
}


