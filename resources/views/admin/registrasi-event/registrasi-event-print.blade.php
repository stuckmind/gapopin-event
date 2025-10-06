<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Registrasi - {{ $registrasi->nama }}</title>
    <style>
        @page {
            size: A5 portrait;
            margin: 0;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            width: 148mm;
            height: 210mm;
            background: url("{{ asset('assets/name-tag.png') }}") no-repeat center top;
            background-size: 100% 100%;
        }

        .card-container {
            position: relative;
            width: 148mm;
            height: 210mm;
        }

        .info-box {
            position: absolute;
            bottom: 13mm;  /* 🔽 geser naik/turun di sini */
            left: 50mm;    /* 🔽 geser kanan/kiri di sini */
            width: 80mm;
            text-align: left;
            font-size: 16pt;
            line-height: 2;
            color: #002147;
            font-weight: bold;
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>
</head>
<body onload="window.print()">

    <div class="card-container">
        <div class="info-box">
            <div>{{ strtoupper($registrasi->nama) }}</div>
            <div>{{ strtoupper($registrasi->nama_optik) }}</div>
            <div style="margin-left: 9mm;">{{ strtoupper($registrasi->alamat) }}</div>
        </div>
    </div>

</body>
</html>
