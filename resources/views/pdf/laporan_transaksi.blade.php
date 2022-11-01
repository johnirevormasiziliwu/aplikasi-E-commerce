<style>
    th{
        border: 2px solid #000000;
        background: #aaaaaa;
    }
    td {
        border: 2px solid #000000;
    }
</style>
<h1>Nomor Transaksi {{$trxNumber}} </h1>
<h2>Laporan Hasil Ujian Akhir Semester PWL To PDF</h2>
<h3>Nama: Johni Revormasi Ziliwu</h3>
<h3>NIM:2042101819</h3>
<h3>Prodi:Teknik Informatika</h3>

    <table>
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
        @foreach($itemTransaksi as $row)
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

