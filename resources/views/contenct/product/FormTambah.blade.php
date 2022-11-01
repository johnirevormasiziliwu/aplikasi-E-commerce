@extends('layout.main')
@section('contenct')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Form Tambah Product</b></h3>
        </div>
        <div class="card-body">
            <form action="{{route('pr.Add')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Code</label>
                    <input class="form-control col-3" type="text" name="code" required>
                </div>
                <div class="form-group">
                    <label for="">Name</label>
                    <input class="form-control col-3" type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input class="form-control col-3" type="number" min="1" name="price" required>
                </div>
                <div class="form-group">
                    <label for="">Expired</label>
                    <input class="form-control col-3" type="date" name="expired" required>
                </div>
                <div class="form-group">
                    <label for="">Stock</label>
                    <input class="form-control col-3" type="text" name="stock" min="1" required>
                </div>
                <div class="card-footer col-3">
                    <a class="btn btn-info" href="{{route('pr.index')}}">Kembali</a>
                    <button class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
