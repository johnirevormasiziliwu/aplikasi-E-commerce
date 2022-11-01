@extends('layout.main')
@section('contenct')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>DATA PRODUCT</b></h3>
        </div>
        <div class="card-body">
            <a class="btn btn-outline-info mb-3" href="{{route('pr.FormTambah')}}">Tambah Product</a>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga Barang</th>
                    <th>Tanggal</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
                </thead>
                @php($No = 1)
                @foreach($products as $product)
                    <tbody>
                    <tr>
                        <td>{{$No++}}</td>
                        <td>{{$product->code}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{\App\Helper\Util::rupiah($product->price)}}</td>
                        <td>{{$product->expired}}</td>
                        <td>{{$product->stock}}</td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="{{route('pr.FormUbah', [$product->id])}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{route('pr.Delete', [$product->id])}}" method="post" class="d-inline"
                                  onsubmit="return confirm('Anda Yakin Hapus Product ini ?')">
                                @method('delete')
                                @csrf
                                <button class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
