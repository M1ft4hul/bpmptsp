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
                <input type="text" name="nama_lengkap" class="form-control" id="namaLengkap">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">NIK</label>
            <div class="col-sm-4">
                <input type="number" name="nik" class="form-control" id="nik">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Tempat/Tgl Lahir</label>
            <div class="col-sm-4">
                <input type="text" name="tempat_tgl_lahir" class="form-control" id="tempattglLahir">
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
            <label for="inputEmail3" class="col-sm-2 col-form-label">Pekerjaan</label>
            <div class="col-sm-4">
                <input type="text" name="pekerjaan" class="form-control" id="pekerjaan">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat Tempat Tinggal</label>
            <div class="col-sm-4">
                <textarea name="alamat_tempat_tinggal" class="form-control" placeholder="Alamat Tempat Tinggal" id="floatingTextarea2" style="height: 100px"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Telepon</label>
            <div class="col-sm-4">
                <input type="number" name="nomor_telepon" class="form-control" id="nomorTelepon">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-4">
                <input type="email" name="email" class="form-control" id="Email">
            </div>
        </div>
        <p><b>Dengan ini mengajukan permohonan surat izin sebagai berikut : </b></p>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Izin</label>
            <div class="col-sm-4">
                <input type="text" name="nama_izin" class="form-control" id="Email" placeholder="Surat Izin Praktik Fisioterapis (SIP-F)">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Sarana Praktik</label>
            <div class="col-sm-4">
                <input type="text" name="nama_sarana_praktik" class="form-control" id="Email">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat Sarana Praktik</label>
            <div class="col-sm-4">
                <textarea name="alamat_sarana_praktik" class="form-control" placeholder="Alamat Sarana Praktik" id="floatingTextarea2" style="height: 100px"></textarea>
            </div>
        </div>
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