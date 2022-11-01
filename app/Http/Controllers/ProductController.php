<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ProductController extends PwlBaseController
{
    public function index()
    {
        $data = [
            'products' => Product::all()
        ];
        return view('contenct/product/index', $data);
    }

    public function FormTambah()
    {

        return view('contenct/product/FormTambah');
    }
    public function add()
    {
        $product = new Product();
        $product->code = request('code');
        $product->name = request('name');
        $product->price = request('price');
        $product->expired = request('expired');
        $product->stock = request('stock');
        $product->save();
        return redirect(route('pr.index'));
    }

    public function delete($id)
    {
        $this->onlySuperadmin();
        DB::table('products')->where('id', '=' ,$id)->delete();
        return redirect(route('pr.index'))
            ->with('status', 'Data Product Berhasil Dihapus');
    }

    public function FormUbah($id)
    {
        $this->onlySuperadmin();
        $product = Product::getByPrimary($id);
        return view('contenct/product/FormUbah', compact('product'));

    }
    public function update($id)
    {
        $this->onlySuperadmin();
        $product = Product::where('id', $id)->first();
        $product->code = request('code');
        $product->name = request('name');
        $product->price = request('price');
        $product->expired = request('expired');
        $product->stock = request('stock');
        $product->save();
        return redirect(route('pr.index'));
    }
}
