<?php

namespace App\Models;

use CodeIgniter\Model;

class PerizinanKesehatanModel extends Model
{
    protected $table = 'perizinan_kesehatan';
    protected $primaryKey = 'id_perizinan_kesehatan';
    protected $allowedFields = ['jenisizin_id', 'nama_langkap', 'nik', 'npwp', 'pendidikan_terakhir', 'alamat_ktp', 'alamat_domisili', 'tempat_tgl_lahir', 'jenis_kelamin', 'lulusan', 'pekerjaan', 'alamat_tempat_tinggal', 'tahun_lulusan', 'nomor_str', 'nomor_strttk', 'masa_berlaku_strttk', 'nomor_sertifikat_kompetensi', 'tempat_praktik', 'tempat_bekerja', 'alamat_tempat_kerja', 'nomor_strtgm', 'nomor_telepon', 'email', 'nama_fasilitas_kefarmasian', 'alamat', 'nomor_fasilitas', 'alamat_praktik', 'nomor_telepons', 'nama_izin', 'nama_sarana_praktik', 'alamat_sarana_praktik', 'fc_ijazah', 'fc_str', 'fc_ktp', 'fc_npwp', 'surat_keterangan_sehat', 'surat_rekom_dinkes', 'fc_sertifikat_komp', 'rekom_organisasi_profesi', 'fc_ket_aktif', 'surat_pernyataan_tempat_praktik', 'denah_lokasi_praktik', 'pas_poto', 'meterai'];
}
