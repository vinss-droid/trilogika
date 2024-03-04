<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // $program = [
        //     [
        //         'title' => 'Siap CPNS 2023',
        //         'image' => 'cpns.jpg',
        //         'content' => "<p>Pemerintah melalui Badan Kepegawaian Negara (BKN) telah mengumumkan, pendaftaran CPNS atau calon pegawai negeri sipil bakal dibuka Rabu (20/9/2023) malam ini.</p><p>Seperti dikutip dari akun resmi BKN,&nbsp;<em>bkn.go.id</em>, Deputi Bidang Sistem Informasi Kepegawaian Suharmen menyebutkan. pendaftaran CPNS melalui portal SSCASN BKN (<em>sscasn.bkn.go.id</em>) segera dapat dibuka hari ini, dimulai dari pembuatan akun mulai pukul 20.09 WIB pada detik ke-23, dan pendaftarannya dimulai pukul 23.09 WIB pada detik ke-20.</p><p><br></p><p>Calon peserta baik CPNS maupun PPPK diharuskan mengakses laman SSCASN BKN untuk bisa melakukan pendaftaran akun.</p><p>Saat pendaftaran akun, calon peserta wajib mengaktifkan kamera untuk memvalidasi identitas dirinya. Kemudian untuk membuat akun SSCASN, peserta harus memasukkan beberapa data diri seperti NIK, nomer KK, nama lengkap, tempat tanggal lahir, nomor HP dan&nbsp;<em>e-mai</em>l.</p><p><br></p><p>“Dalam mempersiapkan pembukaan pendaftaran seleksi Calon Aparatur Sipil Negara (CASN) 2023, BKN menyediakan portal pendaftaran melalui Sistem Seleksi Calon ASN (SSCASN) dengan fitur tambahan berupa ASN Karier untuk membantu calon pelamar mendapat keterangan terkait rincian jabatan yang dibuka pada seleksi calon ASN tahun ini, baik untuk formasi CPNS dan Pegawai Pemerintah dengan Perjanjian Kerja (PPPK),” demikian penjelasannya.</p><p>Suherman melanjutkan, saat portal pendaftaran dibuka, seluruh calon pelamar diwajibkan membuat akun baru di portal, baik bagi pelamar yang baru pertama kali melakukan pendaftaran, maupun bagi pelamar yang sudah pernah mengikuti seleksi sebelumnya.</p><h2><br></h2><p>BKN mengimbau kepada seluruh calon pelamar CASN 2023 untuk dapat mencermati persyaratan administrasi dan syarat tambahan pada pengumuman dari instansi yang akan dilamar. Pelamar juga diminta untuk mengikuti perkembangan informasi seleksi melalui kanal informasi resmi pemerintah.</p><p>Menurut Suherman, menjelang pendaftaran CPNS 2023 tersebut, proses verifikasi dan validasi (verval) formasi seleksi CPNS bagi instansi pemerintah pusat dan daerah yang membuka penerimaan sudah mencapai 86,65 persen.</p><p>Dari proses verifikasi dan validasi yang sudah selesai itu diketahui bahwa formasi PPPK untuk tenaga kesehatan mencapai 87,89 persen, guru 93,15 persen, PPPK teknis 87,01 persen, dan verifikasi serta validasi CPNS sebanyak 78,57 persen.</p>",
        //         'created_at' => '2023-09-10 04:45:23',
        //     ],
        //     [
        //         'title' => 'Jaring Pengaman Sosial',
        //         'image' => 'jps.jpg',
        //         'content' => '<p><strong>JARING PENGAMAN SOSIAL</strong></p><p>Jaring Pengaman Sosial (JPS) adalah bantuan sosial yang tidak terencana berupa uang yang diberikan kepada penduduk dengan status sosial ekonomi sebagai keluarga miskin dan/atau rentan miskin serta keterlantaran</p><p><strong><em>Dasar Hukum</em></strong></p><ul><li>UU No 11 Tahun 2009 tentang Kesejahteraan Sosial</li><li>PERPRES No. 15 Tahun 2010 tentang Percepatan Penanggulangan Kemiskinan</li></ul><p><strong><em>JPS Diperuntukkan bagi :</em></strong></p><ol><li>Keluarga miskin dan/atau rentan miskin yang tidak tercantum dalam Keputusan Bupati tentang Keluarga Miskin dan Keluarga Rentan Miskin.</li><li>Peserta jaminan Kesehatan Daerah yang belum bisa diintegrasikan dalam program Jaminan kesehatan Nasional BPJS.</li><li>Tidak memiliki tabungan atau barang berharga atau barang modal lainnya, dan/atau</li><li>Dinyatakan memenuhi kriteria oleh Tim Verifikator.</li></ol><p>&nbsp;</p><p><strong><em>Ruang Lingkup Pelayanan JPS :</em></strong></p><ol><li>Bidang Kesehatan</li><li>Bidang Pendidikan</li><li>Bidang Sosial</li></ol><p><strong><em>JPS Bidang Kesehatan</em></strong></p><ol><li>Untuk penduduk miskin dan/atau rentan miskin yang sakit dan menjalani rawat jalan dengan tindakan, rawat inap, dan persalinan di Pemberi Pelayanan Kesehatan (PPK) yang tidak tercantum dalam daftar peserta asuransi kesehatan dan termasuk pembayaran premi Jaminan Kesehatan Nasional BPJS kelas III slama 1 (satu) tahun</li><li>Untuk bayi baru lahir dari ibu peserta Penerima Bantuan iuran Daerah untuk didaftarkan ke BPJS kelas III selama 1 (satu) tahun dan</li><li>Untuk korban tindak kekerasan dalam rangka pembuatan visum untuk pembuktian hukum</li><li>Besaran bantuan JPS di bidang kesehatan paling banyak Rp 5.000.000,- (lima juta rupiah) termasuk biaya pendaftaran ke BPJS kesehatan</li></ol><p>&nbsp;</p><p><strong><em>JPS Bidang Pendidikan</em></strong></p><ol><li>Diperuntukkan bagi anak usia sekolah dari keluarga miskin dan/atau rentan miskin yang mengalami masalah terhadap biaya pendidikan di sekolah pada jenjang pendidikan dasar dan menengah, yang belum tercantum dalam daftar peserta jaminan pendidikan</li><li>Besaran JPS di bidang pendidikan paling banyak Rp. 3.000.000,00 (tiga juta rupiah)</li></ol><p>&nbsp;</p><p><strong><em>JPS Bidang Sosial</em></strong></p><ol><li>Orang terlantar yang kehabisan bekal, kecopetan, kehilangan barang dan uang, dan/atau penyandang disabilitas berat yang belum masuk daftar penerima Asistensi Sosial Orang dengan Kedisabilitasan Berat dari APBN, Jaminan Sosial dan/atau biaya pemakaman orang terlantar di daerah</li><li>Lanjut usia terlantar di Daerah yang belum masuk daftar penerima program Asistensi Sosial Lanjut Usia Terlantar dari APBN dan/atau Bansos Lanjut Usia Rentan Sosial Ekonomi dari APBN</li><li>Besaran Pemberian JPS Bidang Sosial</li></ol><ul><li>Ketelantaran yaitu pengemis, gelandangan dan/atau orang terlantar penduduk&nbsp;Daerah dan/atau luar Daerah paling banyak Rp. 500.000,00 (lima ratus ribu rupiah);</li><li>Disabilitas berat paling banyak Rp. 300.000,00 (tiga ratus ribu rupiah) selama 6 bulan diberikan setiap 3 bulan sekali;</li><li>Lanjut usia terlantar paling banyak Rp. 200.000,00 (dua ratus ribu rupiah) selama 6&nbsp;bulan diberikan 3 bulan sekali;</li><li>Biaya pemakaman bagi orang terlantar paling banyak Rp. 1.000.000,00 (satu juta rupiah)</li></ul><p><strong><em>PENYERAHAN JPS</em></strong></p><ol><li>Penyerahan JPS dilakukan oleh Dinas Sosial</li><li>JPS harus diambil oleh pemohon paling lama 5 hari kerja sejak tanggal diterimanya surat pemberitahuan</li><li>JPS yang tidak diambil pemohon sampai batas waktu akan dikembalikan ke kas daerah</li></ol><p><br></p>',
        //         'created_at' => '2023-09-29 04:45:23',
        //     ],
        //     [
        //         'title' => 'Diklat & Sertifikasi Asesor Kompetensi BNSP',
        //         'image' => 'diklat_bnsp.jpg',
        //         'content' => '<p><strong>Pelatihan Asesor Kompetensi BNSP</strong>&nbsp;ini memiliki tujuan untuk memenuhi tantangan diberlakukannya Pasar Global Asean (Asean Singel Community), yang biasa dikenal dengan Masyarakat Ekonomi ASEAN (MEA).</p><p>Pemerintah Indonesia berkehendak bahwa tenaga kerja yang ingin bekerja atau yang sedang bekerja harus mempunyai sertifikat kompetensi yang sesuai dengan bidang profesinya, dan sertifikat tersebut harus dikeluarkan atau diterbitkan oleh Lembaga yang mempunyai Otoritas, yaitu Lembaga sertifikasi Profesi yang telah mendapatkan pengakuan berupa lisensi dari Badan Nasional Sertifikasi Profesi (BNSP).</p><p>Demi memenuhi permasalahan tersebut, maka tenaga kerja yang berasal dari Indonesia atau yang ada di Indonesia disarankan untuk memiliki sertifikasi kompetensi profesi. Hali ini berutujuan agar terjaganya dan meningkatnya kualitas serta mutu kerja.</p><p>Dalam melaksanakan jalannya proses sertifikasi kompetensi ini, nantinya akan membutuhkan seorang asesor kompetensi yang berkaitan dengan bidangnya untuk bertugas untuk melakukan asesmen atau pengujian trhadap suatu kompetensi. Asesor akan menilai para peserta uji kompetensi dalam pembuatan sertifikasi.</p><p><a href="https://sertifikasibnsp.org/pelatihan-asesor-kompetensi-bnsp/" target="_blank" style="color: rgb(46, 163, 242); background-color: transparent;">Pelatihan Asesor Kompetensi BNSP</a>&nbsp;ini merupakan pelatihan dengan Sertifikasi Kompetensi bidang Metodologi Asesor dari Lembaga Sertifikasi Profesi (LSP) yang telah teruji dan mendapatkan Lisensi BNSP.</p><p>Tujuan Dari Pelatihan Asesor Kompetensi Profesi Sertifikasi BNSP adalah untuk menghasilkan Asesor-Asesor yang Berkompeten dan terlisensi Nasional. Setiap jalannya pelatihan Asesor kompetensi BNSP terbatas hanya dapat dilakukan 25 peserta.</p><p>Dengan dijalankannya Masyarakat Ekonomi ASEAN (MEA) pada tahun 2015 lalu, menimbulkan banyak sekali perubahan, perubahan tersebut termasuk dalam persaingan di dunia Industri. Oleh karena itu untuk dapat bersaing dengan tenaga kerja Asing maka diharapkan setiap tenaga kerja Indonesia memiliki sertifikat kompetensi profesi.</p><p>Dalam proses sertifikasi kompetensi, pemerintah membutuhkan banyak sekali Asesor. Asesor merupakan seseorang yang memiliki tugas dan hak untuk melakukan asesmen terhadap suatu uji kompetensi sesuai ruang lingkup atau bidangnya asesmennya.</p><p>Materi pembelajaran bagi calon asesor kompetensi ini dibuat nengacu pada materi pelatihan asesor kompetensi yang telah ditentukan oleh Badan Nasional Sertifikasi Profesi (BNSP) sebagai satu-satunya&nbsp;Badan Nasional yang bertugas sebagai Badan Sertifikasi Profesi di tanah air.</p><p>Pada Pelatihan Asesor Kompetensi BNSP ini nantinya akan diajarkan bagaimana untuk mempersiapkan uji kompetensi untuk karyawan serta teknik untuk menguji kemampuan karyawan.</p>',
        //         'created_at' => '2023-08-21 04:45:23',
        //     ],
        // ];
        $json = File::get(database_path('seeders/backup/programs.json'));
        $programs = json_decode($json, true);
        
        foreach ($programs as $program) {
            // Lakukan sesuatu, misalnya menyimpan ke dalam basis data
            Program::create($program);
        }
        // for ($i = 0; $i < count($programs); $i++) {
        //     Program::create($programs[$i]);
        // }
    }
}
