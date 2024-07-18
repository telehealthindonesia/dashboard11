<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Product;
use App\Services\File\FileService;
use App\Services\Product\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function __construct(FileService $fileService, ProductService $productService) {
        $this->fileService = $fileService;
        $this->productService = $productService;
    }
    public function index(){
        $products = $this->productService->index();
        $data = [
            'title'         => 'Products List',
            'class'         => 'Product',
            'sub_class'     => 'Index',
            'user'          => Auth::user(),
            'products'      => $products
        ];
        return view('admin.product.index', $data);

    }
    public function create(){
        $images = File::where('user_id', Auth::id())->where('extention', 'jpg')->where('nama_file', '!=', null)->get();
        $data = [
            'title'         => 'Products List',
            'class'         => 'Product',
            'sub_class'     => 'Index',
            'images'        => $images
        ];
        return view('admin.product.create', $data);
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'title'         => 'required',
            'description'   => 'required',
            'price'         => 'required|numeric',
            'image'         => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        if($request->file != null){
            $nama_file = $request->title;
            $save_image = $this->fileService->store($request, $nama_file);
        }else{
            $image = $request->image;
        }
        $data = [
            'title'         => $request->title,
            'price'         => $request->price,
            'description'   => $request->description,
            'image'         => $image
        ];
        $create = $this->productService->store($data);
        dd($create);

    }
    public function edit($id){
        $images = File::where('user_id', Auth::id())->where('extention', 'jpg')->where('nama_file', '!=', null)->get();
        $product = $this->productService->show($id);
        $data = [
            'title'         => 'Products List',
            'class'         => 'Product',
            'sub_class'     => 'Index',
            'product'       => $product,
            'images'        => $images
        ];
        return view('admin.product.edit', $data);
    }
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'title'         => 'required',
            'description'   => 'required',
            'price'         => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $data = [
            'title'         => $request->title,
            'price'         => $request->price,
            'description'   => $request->description,
        ];
        $update = $this->productService->ubah($id, $data);
        if($update != []){
            return back()->with('success', 'Data updated');
        }

    }
}
