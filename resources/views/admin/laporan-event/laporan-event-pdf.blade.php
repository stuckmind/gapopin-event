<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Registrasi - {{ $event->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }
        h2 {
            text-align: center;
            margin-bottom: 4px;
        }
        p {
            text-align: center;
            margin-top: 0;
            font-size: 11px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #999;
            padding: 6px 8px;
            text-align: left;
        }
        th {
            background: #f3f3f3;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>

    <h2>Laporan Registrasi Event</h2>
    <p>{{ $event->title }} — {{ $event->kode_event }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Optik</th>
                <th>Email</th>
                <th>No WA</th>
                <th>Daerah</th>
                <th>Tanggal Daftar</th>
                <th class="text-center">Kehadiran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registrasi as $i => $r)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $r->nama }}</td>
                    <td>{{ ucfirst($r->kategori) }}</td>
                    <td>{{ $r->nama_optik }}</td>
                    <td>{{ $r->email }}</td>
                    <td>{{ $r->no_whatsapp }}</td>
                    <td>{{ $r->wilayah }}</td>
                    <td>{{ \Carbon\Carbon::parse($r->created_at)->format('d M Y, H:i') }}</td>
                    <td class="text-center">
                        {{ $r->kehadiran ? 'Hadir' : 'Belum Hadir' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
