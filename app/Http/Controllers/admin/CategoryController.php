<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Http\Requests\SearchRequestForm;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(SearchRequestForm $request){
        $query = Category::query();
        if($title = $request->validated('title'))
        {
            $query = $query->where('title', 'like', "%{$title}%");
        }
        return view('admin.categories.index',['categories'=> $query->paginate(4),'input' => $request->validated() ]);
    }
    public function create(){
        $category = new Category();
        return view('admin.categories.form', ['category' => $category]);
    }
    public function store(CategoryFormRequest $request){

        $category = Category::create($request->validated());
        return to_route('admin.category.index')->with('success','La categorie a été ajoutée avec success');
    }
    public function edit(Category $category){
        return view('admin.categories.form',[
            'category'=> $category
        ]);
    }
    public function update(Category $category, CategoryFormRequest $request){
        $category->update($request->validated());
        return redirect()->route('admin.category.index')->with('success','La categorie a été modifiée avec succès');
    }
    public function destroy(Category $category){
            $category->delete();
            return to_route('admin.category.index')->with('success','La categorie a été supprimée avec success');
    }
}
