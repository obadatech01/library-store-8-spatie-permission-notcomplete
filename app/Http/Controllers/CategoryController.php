<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('permission:categories|categories-create|categories-edit|categories-soft-delete', ['only' => ['index','store']]);
        $this->middleware('permission:categories-create', ['only' => ['create','store']]);
        $this->middleware('permission:categories-show', ['only' => ['show']]);
        $this->middleware('permission:categories-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:categories-soft-delete', ['only' => ['delete']]);
    }

    public function index()
    {
        $allData['categories'] = Category::all();
        return view('categories.index', $allData);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
        ]);

        $notification = array(
            'message' => 'تم إضافة القسم بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->route('categories.index')->with($notification);
    }

    public function show($id)
    {
        $allData['categories'] = Category::findOrFail($id);
        $allData['books'] = Book::where('category_id', $id)->get();
        // dd($allData['books']->toArray());
        return view('categories.show', $allData);
    }

    public function edit($id)
    {
        $editData['categories'] = Category::find($id);

        if(!$editData['categories']){
            $notification = array(
                'message' => 'أعد المحاولة مرة أخرى',
                'alert-type' => 'error'
            );
            return redirect()->route('categories.index')->with($notification);

        }
        // $editData['categories'] = Category::findOrFail($id);
        return view('categories.edit', $editData);
    }

    public function update(Request $request, $id)
    {
        Category::findOrFail($id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $notification = array(
            'message' => 'تم تعديل القسم بنجاح',
            'alert-type' => 'info'
        );

        return redirect()->route('categories.index')->with($notification);
    }

    public function delete($id)
    {
        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'تم حذف القسم بنجاح',
            'alert-type' => 'error'
        );

        return redirect()->route('categories.index')->with($notification);
    }
}
