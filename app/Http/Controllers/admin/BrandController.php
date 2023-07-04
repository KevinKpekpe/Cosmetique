<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandFormRequest;
use App\Http\Requests\SearchRequestForm;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(SearchRequestForm $request){
        $query = Brand::query();
        if($title = $request->validated('title'))
        {
            $query = $query->where('title', 'like', "%{$title}%");
        }
        return view('admin.marques.index',['brands'=> $query->paginate(4),'input' => $request->validated() ]);
    }
    public function create(){
        $brand = new Brand();
        return view('admin.marques.form', ['brand' => $brand]);
    }
    public function store(BrandFormRequest $request){

        $brand = Brand::create($request->validated());
        return to_route('admin.brand.index')->with('success','La marque a été ajoutée avec success');
    }
    public function edit(Brand $brand){
        return view('admin.marques.form',[
            'brand'=> $brand
        ]);
    }
    public function update(Brand $brand, BrandFormRequest $request){
        $brand->update($request->validated());
        return redirect()->route('admin.brand.index')->with('success','La marque a été modifiée avec succès');
    }
    public function destroy(Brand $brand){
            $brand->delete();
            return to_route('admin.brand.index')->with('success','La marque a été supprimée avec success');
    }
}
