<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 0px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        /* tr:nth-child(even) {
            background-color: #dddddd;
        } */
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
@php
use Carbon\Carbon;
$tanggal_lahir = Carbon::parse($user->tanggal_lahir)->locale('id')->isoFormat('DD MMMM YYYY');
@endphp

<body>

    <b>FR.APL.01. PERMOHONAN SERTIFIKASI KOMPETENSI</b>
    <br>
    <b>Bagian 1 : Rincian Data Pemohon Sertifikasi</b>
    <p>Pada bagian ini, cantumlan data pribadi, data pendidikan formal serta data pekerjaan anda pada saat ini.</p>
    <table>
        <tr>
            <td style="width: 5%"><b>a.</b></td>
            <td style="width: 30%"><b>Data Pribadi</b></td>
            <td style="width: 5%"></td>
            <td style="width: 60%"></td>
        </tr>
        <tr>
            <td></td>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td>{{ $user->nama }}</td>
        </tr>
        <tr>
            <td></td>
            <td>No. KTP/NIK/Paspor</td>
            <td>:</td>
            <td>{{ $user->nik }}</td>
        </tr>
        <tr>
            <td></td>
            <td>Tempat / Tgl. Lahir</td>
            <td>:</td>
            <td>{{ $user->tempat_lahir }} / {{ $tanggal_lahir }}</td>
        </tr>
        <tr>
            <td></td>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>@if ($user->jenis_kelamin == 'L')
                <p>Laki-laki/<del>Perempuan</del></p>
                @else
                <p><del>Laki-laki</del>/Perempuan</p>
                @endif
            </td>
        </tr>
        <tr>
            <td></td>
            <td>Kebangsaan</td>
            <td>:</td>
            <td>{{$user->warga_negara}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Alamat</td>
            <td>:</td>
            <td>{{$user->alamat}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Kelurahan</td>
            <td>:</td>
            <td>{{$user->kalurahan}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Kecamatan</td>
            <td>:</td>
            <td>{{$user->kecamatan}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Kabupaten</td>
            <td>:</td>
            <td>{{$user->kabupaten}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Provinsi</td>
            <td>:</td>
            <td>{{$user->provinsi}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Nomor Telepon</td>
            <td>:</td>
            <td>{{$user->telepon}}</td>
        </tr>
    </table>
    {{-- <h2 style='text-align:center;'>HTML Table</h2>

    <table>
        <tr>
            <th>Company</th>
            <th>Contact</th>
            <th>Country</th>
        </tr>
        <tr>
            <td>Alfreds Futterkiste</td>
            <td>Maria Anders</td>
            <td>Germany</td>
        </tr>
        <tr>
            <td>Centro comercial Moctezuma</td>
            <td>Francisco Chang</td>
            <td>Mexico</td>
        </tr>
        <tr>
            <td>Ernst Handel</td>
            <td>Roland Mendel</td>
            <td>Austria</td>
        </tr>
        <tr>
            <td>Island Trading</td>
            <td>Helen Bennett</td>
            <td>UK</td>
        </tr>
        <tr>
            <td>Laughing Bacchus Winecellars</td>
            <td>Yoshi Tannamuri</td>
            <td>Canada</td>
        </tr>
        <tr>
            <td>Magazzini Alimentari Riuniti</td>
            <td>Giovanni Rovelli</td>
            <td>Italy</td>
        </tr>
    </table>
<div class="page-break">

</div>
<h1>halaman 2</h1> --}}
</body>

</html>