<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index','show']]);
        $this->middleware('permission:category-create', ['only' => ['create','store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
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
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {

        $category = new Category();
        $category['name'] = $request['name'];
        $data=$request['name'];
        $data=strtolower($data);
        $slug='';
        for($i=0;$i<strlen($data);$i++){
            if($data[$i]==' '){
                $slug.='-';
            }else{
                if($data[$i]>='a' && $data[$i]<='z'){
                    $slug.=$data[$i];
                }
            }
        }
        $bormi=Category::all()->where('slug',$slug);
        if(count($bormi)>0){
            return redirect()->route('admin.categories.index')
                ->withErrors("Bu nomdagi kategoriyadan oldin foydalanilgan. Iltimos boshqa nomdan foydalaning !");
        }
        $category['slug'] = $slug;
        $category['parent_id'] = $request['parent_id'];
        $category->save();
        return redirect()->route('admin.categories.index')->with('success','category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('admin.categories.show',[
            'category'=>$category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $c=Category::all();
        $category = Category::find($id);
        return view('admin.categories.edit',[
            'category'=>$category,
            'categories'=>$c
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category =  Category::find($id);
        if($category['name'] != $request['name']) {

            $category['name'] = $request['name'];
            $data = $request['name'];
            $data = strtolower($data);
            $slug = '';
            for ($i = 0; $i < strlen($data); $i++) {
                if ($data[$i] == ' ') {
                    $slug .= '-';
                } else {
                    if ($data[$i] >= 'a' && $data[$i] <= 'z') {
                        $slug .= $data[$i];
                    }
                }
            }
            $bormi = Category::all()->where('slug', $slug);
            if (count($bormi) > 0) {
                return redirect()->back()
                    ->withErrors("Bu nomdagi kategoriyadan oldin foydalanilgan. Iltimos boshqa nomdan foydalaning !");
            }
            $category['slug'] = $slug;
        }
        $category['parent_id'] = $request['parent_id'];

        $category->save();
        return redirect()->route('admin.categories.index')->with('success','category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $id=$category->id;
        $eski=Category::all()->where('parent_id',$id);
        foreach ($eski as $e){
            $t=Category::find($e->id);
            $t->parent_id=0;
            $t->save();
        }
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success','category created successfully');

    }
}
