<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\fileExists;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($request->orderBy) && $request->orderBy == 'lasted') {
            $product = Product::with('user')->where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
        } else if (!empty($request->orderBy) && $request->orderBy == 'older') {
            $product = Product::with('user')->where('user_id', auth()->user()->id)->orderBy('created_at', 'ASC')->get();
        } else if (!empty($request->orderBy) && $request->orderBy == 'ASC') {
            $product = Product::with('user')->where('user_id', auth()->user()->id)->orderBy('name', 'ASC')->get();
        } else if (!empty($request->orderBy) && $request->orderBy == 'DESC') {
            $product = Product::with('user')->where('user_id', auth()->user()->id)->orderBy('name', 'DESC')->get();
        } else if (!empty($request->search)) {
            $product = Product::where('user_id', auth()->user()->id)->where('name', 'like', '%' . $request->search . '%')->orWhere('description', 'like', '%' . $request->search . '%')->get();
        } else if (!empty($request->rangefrom) && !empty($request->rangeto)) {
            if ($request->rangeto <= $request->rangefrom) {
                return redirect('/admin/product')->with('error', 'Min must be higher than max');
            }

            $product = Product::where('user_id', auth()->user()->id)->where('price', '>=', (int) $request->rangefrom)->where('price', '<=', (int) $request->rangeto)->get();
        } else {
            $product = Product::where('user_id', auth()->user()->id)->get();
        }

        $data = [
            'title' => 'Product',
            'dataProduct' => $product
        ];

        return view('Dashboard.Admin.Product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Create New Product',
        ];

        return view('Dashboard.Admin.Product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:4|unique:products',
            'price' => 'required|numeric',
            'description' => 'required|min:8',
            'image' => 'required|image|file|max:1024',
        ]);

        $validated['image'] = $request->file('image')->store('img-product');
        $validated['user_id'] = auth()->user()->id;

        $create = Product::create($validated);

        if ($create) {
            return redirect('/admin/product/create')->with('success', 'Product successfully added');
        } else {
            return redirect('/admin/product/create')->with('error', 'Failed to add product');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('user_id', auth()->user()->id)->find($id);

        $data = [
            'title' => $product->name,
            'product' => $product
        ];

        return view('Dashboard.Admin.Product.single', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('user_id', auth()->user()->id)->find($id);

        $data = [
            'title' => 'Edit ' . $product->name,
            'product' => $product
        ];

        return view('Dashboard.Admin.Product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|min:4',
            'price' => 'required|numeric',
            'description' => 'required|min:8',
            'image' => 'image|file|max:1024',
        ]);

        if ($request->hasFile('image')) {
            Storage::delete($request->oldImg);
            $validated['image'] = $request->file('image')->store('img-product');
        } else {
            $validated['image'] = $request->oldImg;
        }

        $edit = Product::where('id', $id)->where('user_id', auth()->user()->id)->update($validated);

        if ($edit) {
            return redirect('/admin/product/view/' . $id)->with('success', 'Product successfully edited');
        } else {
            return redirect('/admin/product/view/' . $id)->with('error', 'Failed to edit product');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Product::where(['id' => $id, 'user_id' => auth()->user()->id]);

        $image = $delete->first()->image;
        if (fileExists($image)) {
            Storage::delete($image);
        }

        if ($delete->delete()) {
            return redirect('/admin/product')->with('success', 'Product successfully deleted');
        } else {
            return redirect('/admin/product')->with('error', 'Failed to delete product');
        }
    }
}
