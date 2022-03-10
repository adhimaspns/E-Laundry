<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Pengambilan</title>

</head>
    <style>
        .main-content {
            width: 148mm;
            height: 210mm;
            border: 1px solid black;
            padding: 20px;
        }
        .list-table th {
            padding: 20px;
        }
        .list-table td {
            text-align: center;
            padding: 8px;
        }
        .judul {
            font-family: 'Mochiy Pop P One', sans-serif;
        }
        .heading {
            text-align: center !important;
        }
        .heading p{
            font-style: italic;
        }
    </style>
<body>
    <section class="main-content">
        <div class="heading">
            <h1 class="judul">E - LAUNDRY</h1>
            <p>
                Jln. Mawar No.1 Dusun Mlaten Desa Mlaten Rt. 01 Rw. 02 Puri - Mojokerto
            </p>
        </div>

        <table style="margin-bottom: 30px;">
            <tr>
                <td>Tanggal</td>
                <td>: {{ date('d M Y', strtotime($data_transaksi->tgl_awal)) }}</td>
            </tr>
            <tr>
                <td>No Nota</td>
                <td>: {{ $data_transaksi->no_transaksi }}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>: {{ $data_transaksi->nama_customer }}</td>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td>: {{ $data_transaksi->no_telp }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: {{ $data_transaksi->alamat }}</td>
            </tr>
            <tr>
                <td>Paket</td>
                <td>: {{ $data_transaksi->paket_laundry_transaksi->nama_paket }}</td>
            </tr>
        </table>

        <table border="1" class="list-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Laundry</th>
                    <th>Harga /Kg</th>
                    <th>Jumlah(Kg)</th>
                    <th>Subtotal</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $no = 1;
                ?>
                @foreach ($detail_transaksi as $dt)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $dt->jns_lndry->jenis_laundry }}</td>
                        <td>{{ number_format($dt->harga) }}</td>
                        <td>{{ $dt->jml }}</td>
                        <td>{{ number_format($dt->subtotal) }}</td>
                    </tr>
                <?php
                    $no++;
                ?>
                @endforeach
                <tr>
                    <td colspan="3"></td>
                    <td>Ongkir</td>
                    <td colspan="4">
                        @if ($data_transaksi->ongkir != null)
                            {{ number_format($data_transaksi->ongkir) }}
                        @else
                            - 
                        @endif
                    </td>
                </tr>

                <tr>
                    <td colspan="4">Total</td>
                    <td>{{ number_format($data_transaksi->grand_total) }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Note -->
        <br>
        <b>Perhatian :</b>
        <ol>
            <li>Pengambilan barang harus disertai nota</li>
            <li>Penyelesaian cucian maksimal 3 hari setelah tanggal masuk</li>
            <li>Barang yang akan dilaundry harap dikontrol terlebih dahulu, apabila ada cacat mohon memberi informasi kepada kami</li>
            <li>Bila terjadi kehilangan atau cacat karena kelalaian kami, kami hanya bertanggung jawab 3 (tiga) kali ongkos cuci dan hak klaim 1x24 Jam</li>
        </ol>
    </section>
</body>
</html>