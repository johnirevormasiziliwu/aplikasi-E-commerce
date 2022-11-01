@extends('layout.main')
@section('contenct')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Form Ubah Product</b></h3>
        </div>
        <div class="card-body">
            <form action="{{route('pr.Update', [$product->id])}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Code Barang</label>
                    <input class="form-control col-3" value="{{$product->code}}" type="text" name="code">
                </div>
                <div class="form-group">
                    <label for="">Nama Barang</label>
                    <input class="form-control col-3" value="{{$product->name}}" type="text" name="name">
                </div>
                <div class="form-group">
                    <label for="">Harga Barang</label>
                    <input class="form-control col-3" value="{{$product->price}}" type="number" min="1" name="price">
                </div>
                <div class="form-group">
                    <label for="">Tanggal</label>
                    <input class="form-control col-3" value="{{$product->expired}}" type="date" name="expired">
                </div>
                <div class="form-group">
                    <label for="">Stock</label>
                    <input class="form-control col-3" value="{{$product->stock}}" type="number" min="1" name="stock">
                </div>
                <div class="card-footer col-3">
                    <a class="btn btn-info" href="{{route('pr.index')}}">Kembali</a>
                    <button class="btn btn-warning">Ubah</button>
                </div>
            </form>
        </div>
    </div>
@endsection
