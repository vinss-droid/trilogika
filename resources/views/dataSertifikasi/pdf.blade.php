<!DOCTYPE html>
<html>

<head>
    {{-- <link rel="stylesheet" href="{{ asset('bootstrap3/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap3/js/bootstrap.min.js') }}"></script> --}}
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;

        }

        .bg-image {
            background-image: url('image/lpk_te.png');
            width: 100%;
            height: 100%;
            background-size: contain;
            /* Adjust to cover or contain based on your requirement */
            background-repeat: no-repeat;
            background-position: center center;
            opacity: 0.1;
            position: absolute;
            /* object-fit: none; */
        }

        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            /* border: 1px solid #dddddd; */
            text-align: left;
            padding: 8px;
        }


        /* tr:nth-child(even) {
            background-color: #dddddd;
        } */
        .page-break {
            page-break-after: always;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .flex-container {
            display: flex;
        }

        .text-center>* {
            text-align: center;
        }

        .footer-red {
            position: fixed;
            width: 100%;
            bottom: 0;
            left: 0;
        }

        .table-border {
            border: 1px solid #dddddd;
        }

        .table-border tr td {
            border: 1px solid #dddddd;
            /* Atur ketebalan dan warna border sel sesuai kebutuhan */
        }

        .table-border tr th {
            border: 1px solid #dddddd;
        }
        .capitalize {
  text-transform: capitalize;
}
    </style>
</head>
@php
    use Carbon\Carbon;
    $tanggal_lahir = Carbon::parse($user->tanggal_lahir)
        ->locale('id')
        ->isoFormat('DD MMMM YYYY');
@endphp

<body>
    <div class="bg-image">
    </div>
    <b>FR.APL.01. PERMOHONAN SERTIFIKASI KOMPETENSI</b>
    <br>
    <b>Bagian 1 : Rincian Data Pemohon Sertifikasi</b>
    <p>Pada bagian ini, cantumkan data pribadi, data pendidikan formal serta data pekerjaan anda pada saat ini.</p>
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
            <td>
                @if ($user->jenis_kelamin == 'L')
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
            <td>{{ $user->warga_negara }}</td>
        </tr>
        <tr>
            <td></td>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $user->alamat }}</td>
        </tr>
        <tr>
            <td></td>
            <td>Kelurahan</td>
            <td>:</td>
            <td>{{ $user->kalurahan }}</td>
        </tr>
        <tr>
            <td></td>
            <td>Kecamatan</td>
            <td>:</td>
            <td>{{ $user->kecamatan }}</td>
        </tr>
        <tr>
            <td></td>
            <td>Kabupaten</td>
            <td>:</td>
            <td>{{ $user->kabupaten }}</td>
        </tr>
        <tr>
            <td></td>
            <td>Provinsi</td>
            <td>:</td>
            <td>{{ $user->provinsi }}</td>
        </tr>
        <tr>
            <td></td>
            <td>Nomor Telepon</td>
            <td>:</td>
            <td>{{ $user->telepon }}</td>
        </tr>
        <tr>
            <td></td>
            <td>E-mail</td>
            <td>:</td>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <td></td>
            <td>Kualifikasi Pendidikan</td>
            <td>:</td>
            <td>{{ $user->pendidikan }}</td>
        </tr>
        <tr>
            <td><strong>b.</strong></td>
            <td><strong>Data Pekerjaan Sekarang</strong></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>Nama Institusi / Perusahaan</td>
            <td>:</td>
            <td>{{ $dataKerja->nama_institusi ?? '-' }}</td>
        </tr>
        <tr>
            <td></td>
            <td>Jabatan</td>
            <td>:</td>
            <td>{{ $dataKerja->jabatan ?? '-'}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Alamat Kantor</td>
            <td>:</td>
            <td>{{ $dataKerja->alamat_kantor ?? '-' }}</td>
        </tr>
        <tr>
            <td></td>
            <td>No. Telepon</td>
            <td>:</td>
            <td>{{ $dataKerja->tlp_kantor ?? '-' }}</td>
        </tr>
        <tr>
            <td></td>
            <td>E-mail</td>
            <td>:</td>
            <td>{{ $dataKerja->email_kantor ?? '-'}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Fax</td>
            <td>:</td>
            <td>{{ $dataKerja->fax_kantor ?? '-'}}</td>
        </tr>
    </table>
    <div class="footer-red">
        <hr style="height:4px;border-width:0;background-color:rgb(228, 29, 29); ">
        <div style="font-size: 0.7em;">Trilogika Edutama {{ Carbon::now()->isoFormat('YYYY') }}</div>
    </div>
    {{-- bagian 2 --}}
    <div class="page-break"></div>
    <div class="flex-container">
        <div class="bg-image"></div>
        <b>Bagian 2 : Data Sertifikasi</b>
        <p>Tuliskan judul dan nomor skema sertifikasi yang anda ajukan berikut daftar Unit Kompetensi sesuai kemasan
            pada skema sertifikasi untuk mendapatkan pengakuan sesuai dengan latar belakang pendidikan, pelatihan serta
            pengalaman kerja yang anda miliki.</p>
        <table class="table-border">
            <tr>
                <td rowspan="2">Skema Sertifikasi <br>
                    <p class="uppercase">( {{ $schema->jenis }} )</p>
                </td>
                <td>Judul</td>
                <td>:</td>
                <td>{{ $schema->judul }}</td>
            </tr>
            <tr>
                <td>Nomor</td>
                <td>:</td>
                <td>{{ $schema->nomor }}</td>
            <tr>
                <td colspan="2">Tujuan Asesmen</td>

                <td>:</td>
                <td class="capitalize">{{ $dataSertif->tujuan }}</td>
            </tr>
        </table>
        <br>
        <b>Daftar Unit Kompetensi sesuai kemasan:</b>
        <table class="table-border">
            <tr style="background-color:rgb(220, 138, 138)">
                <th><b>No</b></th>
                <th><b>Kode Unit</b></th>
                <th><b>Judul Unit</b></th>
                <th><b>Jenis Standar</b></th>
            </tr>
            @foreach ($schema->unitKompetensis as $unit)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $unit->kode }}</td>
                    <td>{{ $unit->judul }}</td>
                    <td>{{ $unit->jenis_standar }}</td>
                </tr>
            @endforeach
        </table>
        <br>
        <b>Bagian 3: Bukti Kelengkapan Pemohon <br>Bukti Persyaratan Dasar Pemohon</b>
        <table class="table-border">
            <tr style="background-color:rgb(220, 138, 138)" class="text-center">
                <th rowspan="2" width="5%">No</th>
                <th rowspan="2" width="40%">Bukti Persyaratan dasar</th>
                <th colspan="2" width="30%">Ada</th>
                <th rowspan="2" width="25%">Tidak Ada</th>
            </tr>
            <tr style="background-color: rgb(220, 138, 138)" class="text-center">
                <td><b>Memenuhi Syarat</b></td>
                <td><b>Tidak Memenuhi Syarat</b></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Copy Ijazah Terakhir</td>
                <td style="text-align: center"><input type="checkbox"></td>
                <td style="text-align: center"><input type="checkbox"></td>
                <td></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Surat keterangan pengalaman kerja minimal 2 tahun di bidangnya</td>
                <td style="text-align: center"><input type="checkbox"></td>
                <td style="text-align: center"><input type="checkbox"></td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Copy KTP</td>
                <td style="text-align: center"><input type="checkbox"></td>
                <td style="text-align: center"><input type="checkbox"></td>
                <td></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Pas Foto 3 x 4 sebanyak 3 (tiga) lembar</td>
                <td style="text-align: center"><input type="checkbox"></td>
                <td style="text-align: center"><input type="checkbox"></td>
                <td></td>
            </tr>
            <tr>
                <td>5</td>
                <td>CV (Curriculum Vitae)</td>
                <td style="text-align: center"><input type="checkbox"></td>
                <td style="text-align: center"><input type="checkbox"></td>
                <td></td>
            </tr>

    </div>
    <div class="page-break"></div>
    <div class="flex-container">
        <div class="bg-image"></div>
    </table>
    <table class="table-border">
        <tr >
            <td rowspan="3" width="50%" style="vertical-align: baseline"><b>Rekomendasi (diisi oleh LSP):</b>
                Berdasarkan ketentuan persyaratan dasar, maka pemohon: 
                @if ($dataSertif->status == 'diterima')
                    <b>Diterima / <del>Tidak diterima</del></b>
                @else
                   <b><del>Diterima</del> / Tidak Diterima</b>
                @endif
                sebagai peserta  sertifikasi
                </td>
            <td colspan="2"><b>Pemohon / Kandidat</b></td>
        </tr>
        <tr>
            <td width="20%">Nama</td>
            <td  width="30%"></td>
        </tr>
        <tr>
            <td>Tanda Tangan</td>
            <td height="60px"></td>
        </tr>
        <tr>
            <td rowspan="3" width="60%" style="vertical-align: baseline"><b>Catatan :</b></td>
            <td colspan="2"><b>Admin LSP</b></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td></td>
        </tr>
        <tr>
            <td>Tanda Tangan</td>
            <td height="60px"></td>
        </tr>
    </table>
    </div>
</body>

</html>
