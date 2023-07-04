<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProduitFormRequest;
use App\Http\Requests\SearchRequestForm;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(SearchRequestForm $request){
        $query = Product::query();
        if($title = $request->validated('title'))
        {
            $query = $query->where('title', 'like', "%{$title}%");
        }
        return view('admin.products.index',['products'=>$query->paginate(4),'input' => $request->validated() ]);
    }
    public function create(){
        $product = new Product();
        return view('admin.products.form',[
            'product'=> $product,
            'categories'=>Category::select('id','title')->get(),
            'brands'=>Brand::select('id','title')->get(),
        ]);
    }
    public function store(ProduitFormRequest $request){
        $product = Product::create($this->extractData(new Product(),$request));
        return redirect()->route('admin.product.index')->with('success','Le produit a été ajouté avec succès');
    }
    public function edit(Product $product){
        return view('admin.products.form',[
            'product'=> $product,
            'categories'=>Category::select('id','title')->get(),
            'brands'=>Brand::select('id','title')->get(),
        ]);
    }
    public function update(Product $product, ProduitFormRequest $request){
        $product->update($this->extractData($product,$request));
        return redirect()->route('admin.product.index')->with('success','Le produit a été modifié avec succès');
    }
    public function destroy(Product $product){
        $product->delete();
        return to_route('admin.product.edit')->with('success','Le produit a été supprimée avec success');
    }
    private function extractData(Product $product,ProduitFormRequest $request):array
    {
        $data = $request->validated();
        /** @var UploadedFile|null $image */
        $image = $request->validated('image');
        if($image === null || $image->getError()){
            return $data;
        }
        if($product->image ){
            Storage::disk('public')->delete($product->image);
        }
        $data['image'] = $image->store('images','public');
        return $data;
    }
}
