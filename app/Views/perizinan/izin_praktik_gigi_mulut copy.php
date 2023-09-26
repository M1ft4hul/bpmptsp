<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <p><b>Yang bertanda tangan di bawah ini : </b></p>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-4">
                <input type="text" name="nama_lengkap" class="form-control" id="namaLengkap" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat KTP</label>
            <div class="col-sm-4">
                <input type="text" name="alamat_ktp" class="form-control" id="alamatKtp" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat Domisili</label>
            <div class="col-sm-4">
                <input type="text" name="alamat_domisili" class="form-control" id="alamatDomisili" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Tempat/Tgl Lahir</label>
            <div class="col-sm-4">
                <input type="text" name="tempat_tgl_lahir" class="form-control" id="tempattglLahir" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-4">
                <select name="jenis_kelamin" class="form-select" aria-label="Default select example">
                    <option value="" disabled selected>Jenis Kelamin</option>
                    <option value="laki-laki">Laki-Laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Tahun Lulusan</label>
            <div class="col-sm-4">
                <input type="text" name="tahun_lulusan" class="form-control" id="tahunLulus">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor STRTGM</label>
            <div class="col-sm-4">
                <input type="text" name="nomor_strtgm" class="form-control" id="nomorStrtgm">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Telepon</label>
            <div class="col-sm-4">
                <input type="number" name="nomor_telepon" class="form-control" id="nomorTelepon">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat Email</label>
            <div class="col-sm-4">
                <input type="email" name="email" class="form-control" id="alamatEmail">
            </div>
        </div>
        <p><b>Dengan ini mengajukan permohonan untuk mendapatkan Surat Izin Praktik Terapis Gigi dan Mulut pada : </b></p>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Fasilitas</label>
            <div class="col-sm-4">
                <input type="text" name="nama_fasilitas_kefarmasian" class="form-control" id="namaFasilitas">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat Praktik</label>
            <div class="col-sm-4">
                <textarea name="alamat_praktik" class="form-control" placeholder="Alamat Praktik" id="floatingTextarea2" style="height: 100px"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Telepon</label>
            <div class="col-sm-4">
                <input type="number" name="nomor_telepons" class="form-control" id="nomorTelepon">
            </div>
        </div>
        <p><b>Sesuai dengan Peraturan Menteri Kesehatan Nomor 20 Tahun 2016 tentang izin dan Penyelenggaraan <br> Praktik Terapis Gigi dan Mulut. </b></p>

        <p><b>Sebagai bahan pertimbangan, terlampir kami sertakan: </b></p>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Foto Copy file scan Ijazah Terakhir</label>
            <div class="col-sm-4">
                <input class="form-control" type="file" name="fc_ijazah" id="formFile" accept="application/pdf">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Foto Copy file scan STR yang masih berlaku</label>
            <div class="col-sm-4">
                <input class="form-control" type="file" name="fc_str" id="fcStr" accept="application/pdf">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Foto Copy file scan KTP yang masih berlaku</label>
            <div class="col-sm-4">
                <input class="form-control" type="file" name="fc_ktp" id="fcKtp" accept="application/pdf">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Foto Copy file scan NPWP</label>
            <div class="col-sm-4">
                <input class="form-control" type="file" name="fc_npwp" id="fcNpwp" accept="application/pdf">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Surat Keterangan Berbadan Sehat dari Dokter, file scan</label>
            <div class="col-sm-4">
                <input class="form-control" type="file" name="surat_keterangan_sehat" id="fcKeterangansehat" accept="application/pdf">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Surat rekomendasi dinkes file scan</label>
            <div class="col-sm-4">
                <input class="form-control" type="file" name="surat_rekom_dinkes" id="fcRekomendasidinas" accept="application/pdf">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Fc. Sertifikat Kompetensi</label>
            <div class="col-sm-4">
                <input class="form-control" type="file" name="fc_sertifikat_komp" id="fcSertifikatkompetensi" accept="application/pdf">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Rekomendasi dari Organisasi Profesi, file scan</label>
            <div class="col-sm-4">
                <input class="form-control" type="file" name="rekom_organisasi_profesi" id="fcRekomOrganisasiProfesi" accept="application/pdf">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Fc. Surat Keterangan Aktif menjalankan tugas dari Direktur Rumah Sakit / Kepala Puskesmas bagi yang bekerja di Rumah Sakit atau Puskesmas, file scan</label>
            <div class="col-sm-4">
                <input class="form-control" type="file" name="fc_ket_aktif" id="fcKeteranganAktif" accept="application/pdf">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Pas Foto ukuran 3 X 4 cm sebanyak 3 Lembar file scan</label>
            <div class="col-sm-4">
                <input class="form-control" type="file" name="pas_poto" id="fcPasFoto" accept="application/pdf">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Materai Rp. 10.000,- sebanyak 2 Lembar</label>
            <div class="col-sm-4">
                <input class="form-control" type="file" name="meterai" id="fcMaterai" accept="application/pdf">
            </div>
        </div>
    </div>
</body>

</html>