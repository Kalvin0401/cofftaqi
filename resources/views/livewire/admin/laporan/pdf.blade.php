<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Stok Kopi</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            color: #000;
        }
        .header {
            text-align: center;
            margin-bottom: 10px;
        }
        .header h2 {
            margin: 0;
        }
        .header p {
            margin: 2px 0;
            font-size: 11px;
        }
        .line {
            border-top: 2px solid #000;
            margin: 10px 0 15px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
        }
        th {
            background: #f0f0f0;
            text-align: center;
        }
        td {
            vertical-align: middle;
        }
        .right {
            text-align: right;
        }
        .center {
            text-align: center;
        }
        .footer {
            margin-top: 30px;
            width: 100%;
        }
            .ttd {
        width: 200px;
        text-align: center;
        float: right;
        line-height: 1.5;
        }
    </style>
</head>
<body>

  <table style="width: 100%; margin-bottom: 10px;">
    <tr>
        <!-- LOGO -->
        <td style="width: 90px;">
            <img src="{{ public_path('img/logo_kopi.png') }}" style="width: 80px;">
        </td>

        <!-- TEXT -->
        <td style="text-align: center;">
            <h2 style="margin: 0;">{{ $nama_usaha ?? 'PT. Cofftaqi Sumatera Indonesia' }}</h2>
            <p style="margin: 2px 0;">{{ $alamat ?? 'Desa Baru Sungai Tutung, Kec. Air Hangat Timur, Kab. Kerinci' }}</p>
            <p style="margin: 2px 0;">Telp: {{ $telepon ?? '0822-6095-4818' }}</p>
        </td>
    </tr>
</table>

    <div class="line"></div>

    <h3 style="text-align:center;">LAPORAN STOK KOPI</h3>
    <p>Periode: {{ $tanggal_awal }} s/d {{ $tanggal_akhir }}</p>

    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Kopi</th>
                <th>Jenis</th>
                <th>Masuk (Kg)</th>
                <th>Keluar (Kg)</th>
                <th>Stok</th>
                <th>Total Masuk (Rp)</th>
                <th>Total Keluar (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @php
                $grandMasuk = 0;
                $grandKeluar = 0;
            @endphp
                @foreach($kopis as $kopi)
                    @php
                        $jumlahMasuk = $kopi->stokMasuk->sum('jumlah');
                        $jumlahKeluar = $kopi->stokKeluar->sum('jumlah');

                        $totalMasuk = $kopi->stokMasuk->sum('total');
                        $totalKeluar = $kopi->stokKeluar->sum('total');

                        $grandMasuk += $totalMasuk;
                        $grandKeluar += $totalKeluar;
                    @endphp

                    <tr>
                        <td>{{ $kopi->kode }}</td>
                        <td>{{ $kopi->nama }}</td>
                        <td>{{ $kopi->jenis }}</td>
                        <td class="center">{{ $jumlahMasuk }}</td>
                        <td class="center">{{ $jumlahKeluar }}</td>
                        <td class="center">{{ $kopi->stok }}</td>
                        <td class="right">Rp {{ number_format($totalMasuk, 0, ',', '.') }}</td>
                        <td class="right">Rp {{ number_format($totalKeluar, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            <tr>
                <th colspan="6" class="right">TOTAL</th>
                <th class="right">Rp {{ number_format($grandMasuk, 0, ',', '.') }}</th>
                <th class="right">Rp {{ number_format($grandKeluar, 0, ',', '.') }}</th>
            </tr>
        </tbody>
    </table>

    <div class="footer">
    <div class="ttd">

        <p>
            Kerinci,
            {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
        </p>

        <p style="margin-top: 10px;">
            Mengetahui,
        </p>

        <p style="margin-top: 2px;">
            CEO PT. Cofftaqi Sumatera Indonesia
        </p>

        <br><br><br>

        <p>
            <b>{{ $nama_pimpinan ?? 'Robie Hartoni' }}</b>
        </p>

    </div>
</div>

</body>
</html>