<?php

namespace App\Http\Controllers\Dashboard\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class MemberController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'dataProduct' => Product::with('user')->orderBy('created_at', 'DESC')->limit(5)->get(),
            'totalProduct' => Product::get()->count()
        ];
        return view('Dashboard.Member.dashboard', $data);
    }

    public function viewProduct(Request $request)
    {
        if (!empty($request->orderBy) && $request->orderBy == 'lasted') {
            $product = Product::with('user')->orderBy('created_at', 'DESC')->get();
        } else if (!empty($request->orderBy) && $request->orderBy == 'older') {
            $product = Product::with('user')->orderBy('created_at', 'ASC')->get();
        } else if (!empty($request->orderBy) && $request->orderBy == 'ASC') {
            $product = Product::with('user')->orderBy('name', 'ASC')->get();
        } else if (!empty($request->orderBy) && $request->orderBy == 'DESC') {
            $product = Product::with('user')->orderBy('name', 'DESC')->get();
        } else if (!empty($request->search)) {
            $product = Product::where('name', 'like', '%' . $request->search . '%')->orWhere('description', 'like', '%' . $request->search . '%')->get();
        } else if (!empty($request->rangefrom) && !empty($request->rangeto)) {
            if ($request->rangeto <= $request->rangefrom) {
                return redirect('/product')->with('error', 'Min must be higher than max');
            }

            $product = Product::where('price', '>=', (int) $request->rangefrom)->where('price', '<=', (int) $request->rangeto)->get();
        } else {
            $product = Product::get();
        }

        $data = [
            'title' => 'Product',
            'dataProduct' => $product
        ];

        return view('Dashboard.Member.Product.index', $data);
    }

    public function viewSingleProduct($id)
    {
        $product = Product::find($id);

        if (is_null($product)) {
            return redirect('/product');
        }

        $data = [
            'title' => $product->name,
            'product' => $product
        ];

        return view('Dashboard.Member.Product.single', $data);
    }
}
