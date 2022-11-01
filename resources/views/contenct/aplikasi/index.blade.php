@extends('layout.main')
@section('contenct')
    <div class="row">
        <div class="col-3">
            <div class="card">
                <form action="{{route('kasir.insert', [$no_transaksi])}}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" required id="search-id-barang">
                    <div class="card-header">
                        <h3 class="card-title">Cari Barang</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Kode Barang</label>
                            <input id="search-kode-barang" placeholder="input kode barang"
                                   type="text" class="form-control ">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Barang</label>
                            <input id="search-nama-barang" placeholder="Nama Barang" readonly disabled type="text"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Harga Barang</label>
                            <input id="search-harga-barang" placeholder="Harga Barang"
                                   name="price" readonly type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Stock Barang</label>
                            <input id="search-stock-barang" placeholder="Stock Barang"
                                   readonly disabled type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah</label>
                            <input id="search-jumlah-barang" placeholder="input jumlah barang" min="1" type="number"
                                   name="amount" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        @if($status_transaksi === 'draft')
                        <button type="submit" class="btn btn-block btn-success">Tambah</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Transaksi : {{$no_transaksi}}</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Total Barang</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                        $total = 0;
                        @endphp
                        @foreach($item_transaksi as $row)
                            @php
                                $totalItem = (int)$row->price * (int)$row->amount;
                                $total += $totalItem;
                            @endphp
                            <tr>
                                <td>{{$row->code}}</td>
                                <td>{{$row->name}}</td>
                                <td class="text-monospace">{{\App\Helper\Util::rupiah($row->price)}}</td>
                                <td>{{$row->amount}}</td>
                                <td class="text-monospace">{{\App\Helper\Util::rupiah($totalItem)}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4"><b>Total Belanja</b></td>
                            <td class="text-monospace"><b>{{\App\Helper\Util::rupiah($total)}}</b></td>
                        </tr>
                        </tbody>
                    </table>

                </div>
                <div class="card-footer">
                    @if($status_transaksi === 'draft')
                    <button id="btn-tutup-transaksi" class="btn btn-info">Tutup Transaksi</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script>
        $(function () {
            $('#search-kode-barang').on('keyup', function () {
                let code = $(this).val();
                $.ajax({
                    url: "{{url('app/searchProduct/')}}" + "/" + code,
                    success: function ($data) {
                        $('#search-nama-barang').val($data.name);
                        $('#search-harga-barang').val($data.price);
                        $('#search-stock-barang').val($data.stock);
                        $('#search-id-barang').val($data.id);
                    },
                    error: function () {
                        $('#search-nama-barang').val("");
                        $('#search-harga-barang').val("");
                        $('#search-stock-barang').val("");
                        $('#search-id-barang').val("");
                    }
                });
            });
            $('#btn-tutup-transaksi').on('click', function () {
                let url = '{{route('kasir.close', [$no_transaksi])}}';
                window.location.replace(url);
            });
        });
    </script>
@endsection
