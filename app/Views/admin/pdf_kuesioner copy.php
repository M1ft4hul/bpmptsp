<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url() ?>portal/assets/css/style1.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800%7CJosefin+Sans:400,600,700,700i%7CPoppins:300i,300,400,500,600,700,400i,500%7CDancing+Script:700%7CDancing+Script:700%7CGreat+Vibes:400%7CPoppins:400%7CDosis:800%7CRaleway:400,700,800&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>portal/assets/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assetsa/img/log.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .garis {
            margin-top: 40px;
            width: 100%;
            text-align: center;
            margin-left: 0;
            height: 8px;
            background-color: gray;
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-6">
                <div class="icon-text layout-6">
                    <h4>
                        <center>
                            <b> KUESIONER <br>
                                SURVEI KEPUASAN MASYARAKAT <br>
                                UNIT LAYANAN PENANAMAN MODAL PELAYANAN TERPADU SATU PINTU (PTSP) <br>
                                KABUPATEN KONAWE KEPULAUAN
                            </b>
                        </center>
                    </h4>
                    <div class="garis"></div>
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <label for="inputEmail3" class="col-md-4">Tanggal Survei :</label>
                                <div class="col-sm-3">
                                    <?= $kuesioner['tgl_survei'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="form-check form-check-inline">
                                        <input style="width: 25px; height: 25px;" name="jam_survei" class="form-check-input" type="checkbox" id="gridCheck" value="08.00 - 12.00" <?= ($jam_survei === '08.00 - 12.00') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="inlineCheckbox2">
                                            08.00 - 12.00
                                        </label>
                                    </div>
                                    <label for="inputEmail3" class="col-md-6" style="margin-right: 500px;">Jam Survei </label>
                                    <div class="form-check form-check-inline">
                                        <input style="width: 25px; height:25px;" name="jam_survei" class="form-check-input" type="checkbox" id="gridCheck" value="01.00 - 16.30" <?= ($jam_survei === '01.00 - 16.30') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="inlineCheckbox2">
                                            01.00 - 16.30
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h6 style="margin-top: 50px; margin-bottom: 30px;"><b>PROFIL</b></h6>

                        <div class="container">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input style="width: 30px; height: 30px;" class="form-check-input" type="checkbox" name="jk" id="inlineCheckbox1" value="Laki-Laki" <?= ($jenis_kelamin === 'Laki-Laki') ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="inlineCheckbox1">Laki-Laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input style="width: 30px; height: 30px;" class="form-check-input" type="checkbox" name="jk" id="inlineCheckbox2" value="Perempuan" <?= ($jenis_kelamin === 'Perempuan') ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="inlineCheckbox2">Perempuan</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pendidikan</td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input style="width: 30px; height: 30px;" class="form-check-input" type="checkbox" name="pendidikan" id="inlineCheckbox1" value="SD" <?= ($pendidikan === 'SD') ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="inlineCheckbox1">SD</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input style="width: 30px; height: 30px;" class="form-check-input" type="checkbox" name="pendidikan" id="inlineCheckbox2" value="SMP" <?= ($pendidikan === 'SMP') ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="inlineCheckbox2">SMP</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input style="width: 30px; height: 30px;" class="form-check-input" type="checkbox" name="pendidikan" id="inlineCheckbox2" value="SMA" <?= ($pendidikan === 'SMA') ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="inlineCheckbox2">SMA</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input style="width: 30px; height: 30px;" class="form-check-input" type="checkbox" name="pendidikan" id="inlineCheckbox2" value="S1" <?= ($pendidikan === 'S1') ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="inlineCheckbox2">S1</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input style="width: 30px; height: 30px;" class="form-check-input" type="checkbox" name="pendidikan" id="inlineCheckbox2" value="S2" <?= ($pendidikan === 'S2') ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="inlineCheckbox2">S2</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input style="width: 30px; height: 30px;" class="form-check-input" type="checkbox" name="pendidikan" id="inlineCheckbox2" value="S3" <?= ($pendidikan === 'S3') ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="inlineCheckbox2">S3</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input style="width: 30px; height: 30px;" class="form-check-input" type="checkbox" name="pekerjaan" id="inlineCheckbox2" value="PNS" <?= ($pekerjaan === 'PNS') ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="inlineCheckbox2">PNS</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input style="width: 30px; height: 30px;" class="form-check-input" type="checkbox" name="pekerjaan" id="inlineCheckbox2" value="TNI" <?= ($pekerjaan === 'TNI') ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="inlineCheckbox2">TNI</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input style="width: 30px; height: 30px;" class="form-check-input" type="checkbox" name="pekerjaan" id="inlineCheckbox2" value="POLRI" <?= ($pekerjaan === 'POLRI') ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="inlineCheckbox2">POLRI</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input style="width: 30px; height: 30px;" class="form-check-input" type="checkbox" name="pekerjaan" id="inlineCheckbox2" value="SWASTA" <?= ($pekerjaan === 'SWASTA') ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="inlineCheckbox2">SWASTA</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input style="width: 30px; height: 30px;" class="form-check-input" type="checkbox" name="pekerjaan" id="inlineCheckbox2" value="WIRAUSAHA" <?= ($pekerjaan === 'WIRAUSAHA') ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="inlineCheckbox2">WIRAUSAHA</label>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <table style="border-color: black; border-width: 2px;" class="table table-bordered">
                                <tr>
                                    <th>
                                        <div class="row g-3 align-items-center">
                                            <div class="col-auto">
                                                <label for="inputPassword6" class="col-form-label">Jenis Layanan Yang DiTerima :</label>
                                            </div>
                                            <div class="col-sm-2">
                                                <?= $kuesioner['jenis_layanan'] ?>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                            </table>
                        </div>

                        <h6 style="margin-top: 20px;"><b>PENDAPAT RESPONDEN TENTANG PELAYANAN <br></h6>
                        <h6 style="margin-bottom: 20px;"><i> ( Lingkari Kode Huruf Sesuai Jawaban Masyarakat/Responden )</i></b></h6>

                        <div style="overflow-x:auto;" class="container">
                            <table class="table table-bordered">
                                <tr>
                                    <th>UNSUR PENILAIAN</th>
                                    <th>P*</th>
                                    <th>UNSUR PENILAIAN</th>
                                    <th>P*</th>
                                </tr>
                                <!-- pertanyaan 1 dan 6 -->
                                <tr>
                                    <td>
                                        <b> 1. Bagaimana pendapat saudara <br> tentang kesesuaian persyaratan pelayanan <br> dengan jenis pelayanan .</b>
                                        <ol type="a">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p1" value="1" id="flexCheckDefault" <?= ($soal_pertama === '1') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Tidak Sesuai</li>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p1" value="2" id="flexCheckDefault" <?= ($soal_pertama === '2') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Kurang Sesuai</li>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p1" value="3" id="flexCheckDefault" <?= ($soal_pertama === '3') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Sesuai</li>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p1" value="4" id="flexCheckDefault" <?= ($soal_pertama === '4') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Sangat Sesuai</li>
                                                </label>
                                            </div>
                                        </ol>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled" style="margin-top: 100px;">
                                            <center>
                                                <b>
                                                    <li>1</li>
                                                    <li>2</li>
                                                    <li>3</li>
                                                    <li>4</li>
                                                </b>
                                            </center>
                                        </ul>
                                    </td>
                                    <td>
                                        <b> 6. Bagaimana pendapat saudara <br> tentang kompetensi/kemampuan petugas <br>dalam pelayanan</b>
                                        <ol type="a">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p6" value="1" id="flexCheckDefault" <?= ($soal_keenam === '1') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Tidak kompeten</li>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p6" value="2" id="flexCheckDefault" <?= ($soal_keenam === '2') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Kurang kompeten</li>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p6" value="3" id="flexCheckDefault" <?= ($soal_keenam === '3') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Kompeten</li>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p6" value="4" id="flexCheckDefault" <?= ($soal_keenam === '4') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Sangat kompeten </li>
                                                </label>
                                            </div>
                                        </ol>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled" style="margin-top: 100px;">
                                            <center>
                                                <b>
                                                    <li>1</li>
                                                    <li>2</li>
                                                    <li>3</li>
                                                    <li>4</li>
                                                </b>
                                            </center>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- pertanyaan 2 dan 7 -->
                                <tr>
                                    <td>
                                        <b> 2. Bagaimana pemahaman saudara <br>tentang kemudahan prosedur pelayanan <br> pada unit ini.</b>
                                        <ol type="a">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p2" value="1" id="flexCheckDefault" <?= ($soal_kedua === '1') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Tidak mudah</li>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p2" value="2" id="flexCheckDefault" <?= ($soal_kedua === '2') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Kurang mudah</li>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p2" value="3" id="flexCheckDefault" <?= ($soal_kedua === '3') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Mudah</li>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p2" value="4" id="flexCheckDefault" <?= ($soal_kedua === '4') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Sangat mudah</li>
                                                </label>
                                            </div>
                                        </ol>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled" style="margin-top: 100px;">
                                            <center>
                                                <b>
                                                    <li>1</li>
                                                    <li>2</li>
                                                    <li>3</li>
                                                    <li>4</li>
                                                </b>
                                            </center>
                                        </ul>
                                    </td>
                                    <td>
                                        <b>7. Bagaimana pendapat saudara tentang <br> perilaku petugas dalam pelayanan <br> terkait kesopanan dan keramahan .</b>
                                        <ol type="a">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p7" value="1" id="flexCheckDefault" <?= ($soal_ketujuh === '1') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Tidak sopan dan tidak ramah</li>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p7" value="2" id="flexCheckDefault" <?= ($soal_ketujuh === '2') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Kurang sopan dan kurang ramah</li>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p7" value="3" id="flexCheckDefault" <?= ($soal_ketujuh === '3') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Sopan dan ramah</li>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p7" value="4" id="flexCheckDefault" <?= ($soal_ketujuh === '4') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Sangat sopan dan sangat ramah</li>
                                                </label>
                                            </div>
                                        </ol>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled" style="margin-top: 100px;">
                                            <center>
                                                <b>
                                                    <li>1</li>
                                                    <li>2</li>
                                                    <li>3</li>
                                                    <li>4</li>
                                                </b>
                                            </center>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- pertanyaan 3 dan 8 -->
                                <tr>
                                    <td>
                                        <b> 3. Bagaimana pendapat saudara <br>tentang kecepatan waktu dalam <br>memberi pelayanan </b>
                                        <ol type="a">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p3" value="1" id="flexCheckDefault" <?= ($soal_ketiga === '1') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Tidak cepat</li>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p3" value="2" id="flexCheckDefault" <?= ($soal_ketiga === '2') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Kurang cepat</li>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p3" value="3" id="flexCheckDefault" <?= ($soal_ketiga === '3') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Cepat</li>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p3" value="4" id="flexCheckDefault" <?= ($soal_ketiga === '4') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Sangat cepat</li>
                                                </label>
                                            </div>
                                        </ol>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled" style="margin-top: 100px;">
                                            <center>
                                                <b>
                                                    <li>1</li>
                                                    <li>2</li>
                                                    <li>3</li>
                                                    <li>4</li>
                                                </b>
                                            </center>
                                        </ul>
                                    </td>
                                    <td>
                                        <b>8. Bagaimana pendapat saudara <br> tentang kualitas sarana <br> dan prasarana</b>
                                        <ol type="a">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p8" value="1" id="flexCheckDefault" <?= ($soal_kedelapan === '1') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Buruk</li>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p8" value="2" id="flexCheckDefault" <?= ($soal_kedelapan === '2') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Cukup baik</li>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p8" value="3" id="flexCheckDefault" <?= ($soal_kedelapan === '3') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Baik</li>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p8" value="4" id="flexCheckDefault" <?= ($soal_kedelapan === '4') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Sangat baik</li>
                                                </label>
                                            </div>
                                        </ol>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled" style="margin-top: 100px;">
                                            <center>
                                                <b>
                                                    <li>1</li>
                                                    <li>2</li>
                                                    <li>3</li>
                                                    <li>4</li>
                                                </b>
                                            </center>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- pertanyaan 4 dan 9 -->
                                <tr>
                                    <td>
                                        <b>4. Bagaimana pendapat anda tetang <br> kewajaran biaya/tarif dalam <br>pelayanan </b>
                                        <ol type="a">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p4" value="1" id="flexCheckDefault" <?= ($soal_keempat === '1') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Tidak Sesuai</li>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p4" value="2" id="flexCheckDefault" <?= ($soal_keempat === '2') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Kurang Sesuai</li>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p4" value="3" id="flexCheckDefault" <?= ($soal_keempat === '3') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Sesuai</li>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p4" value="4" id="flexCheckDefault" <?= ($soal_keempat === '4') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Sangat Sesuai</li>
                                                </label>
                                            </div>
                                        </ol>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled" style="margin-top: 100px;">
                                            <center>
                                                <b>
                                                    <li>1</li>
                                                    <li>2</li>
                                                    <li>3</li>
                                                    <li>4</li>
                                                </b>
                                            </center>
                                        </ul>
                                    </td>
                                    <td>
                                        <b>9. Bagaimana pendapat saudara <br> tentang penanganan pengaduan <br> pengguna layanan </b>
                                        <ol type="a">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p9" value="1" id="flexCheckDefault" <?= ($soal_kesembilan === '1') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Tidak ada</li>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p9" value="2" id="flexCheckDefault" <?= ($soal_kesembilan === '2') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Ada tapi tidak berfungsi</li>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p9" value="3" id="flexCheckDefault" <?= ($soal_kesembilan === '3') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Berfungsi kurang maksimal</li>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p9" value="4" id="flexCheckDefault" <?= ($soal_kesembilan === '4') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Dikelola dengan baik</li>
                                                </label>
                                            </div>
                                        </ol>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled" style="margin-top: 100px;">
                                            <center>
                                                <b>
                                                    <li>1</li>
                                                    <li>2</li>
                                                    <li>3</li>
                                                    <li>4</li>
                                                </b>
                                            </center>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- pertanyaan 5 -->
                                <tr>
                                    <td>
                                        <b>5. Bagaimana pendapat saudara tentang <br> kesesuaian produk layanan antara yang <br> tercantum dalam standar pelayanan <br> dengan hasil yang diberikan.</b>
                                        <ol type="a">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p5" value="1" id="flexCheckDefault" <?= ($soal_kelima === '1') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Tidak Sesuai</li>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p5" value="2" id="flexCheckDefault" <?= ($soal_kelima === '2') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Kurang Sesuai</li>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p5" value="3" id="flexCheckDefault" <?= ($soal_kelima === '3') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Sesuai</li>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="p5" value="4" id="flexCheckDefault" <?= ($soal_kelima === '4') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <li>Sangat Sesuai</li>
                                                </label>
                                            </div>
                                        </ol>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled" style="margin-top: 130px;">
                                            <center>
                                                <b>
                                                    <li>1</li>
                                                    <li>2</li>
                                                    <li>3</li>
                                                    <li>4</li>
                                                </b>
                                            </center>
                                        </ul>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="container">
                            <table class="table table-bordered">
                                <tr>
                                    <td><b><i>KRITIK DAN SARAN :</i></b></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="height: 150px" class="form-floating">
                                            <?= $kuesioner['kritik_saran'] ?>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url() ?>portal/assets/js/imagesloaded.min.js"></script>
    <script src="<?php echo base_url() ?>portal/assets/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>portal/assets/js/imagesloaded.min.js"></script>
    <script src="<?php echo base_url() ?>portal/assets/js/wow.min.js"></script>
</body>

</html>