<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url() ?>portal/assets/css/style1.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>portal/assets/css/bootstrap.min.css">

    <style>
        hr.garis {
            height: 3px;
            border: solid gray;
        }
    </style>
</head>

<body>
    <!-- kelar -->
    <p style="text-align: center;">
        <b> KUESIONER <br>
            SURVEI KEPUASAN MASYARAKAT <br>
            UNIT LAYANAN PENANAMAN MODAL PELAYANAN TERPADU SATU PINTU (PTSP) <br>
            KABUPATEN KONAWE KEPULAUAN
        </b>
    </p>
    <hr class="garis">
    <!-- end kelar -->
    <!-- kelar -->
    <div class="col">
        <table>
            <tr>
                <td>Tanggal Survei : <?= $kuesioner['tgl_survei'] ?></td>
                <td></td>
                <td>
                    Jam Survei : <?= $kuesioner['jam_survei'] ?>
                </td>
            </tr>
        </table>
    </div>
    <!-- end kelar -->
    <!-- kelar -->
    <p style="text-align: center; margin-top: 50px; margin-bottom: 30px;"><b>PROFIL</b></p>
    <!-- end kelar -->
    <!-- kelar -->
    <table style="border: 1px solid black; border-collapse: collapse;">
        <tr style="border: 1px solid black; border-collapse: collapse;">
            <td style="border: 1px solid black; border-collapse: collapse;">Jenis Kelamin</td>
            <td style="border: 1px solid black; border-collapse: collapse;"><?= $kuesioner['jk'] ?></td>
        </tr>
        <tr>
            <td style="border: 1px solid black; border-collapse: collapse;">Pendidikan</td>
            <td style="border: 1px solid black; border-collapse: collapse;"><?= $kuesioner['pendidikan'] ?></td>
        </tr>

        <tr>
            <td style="border: 1px solid black; border-collapse: collapse;">Pekerjaan</td>
            <td style="border: 1px solid black; border-collapse: collapse;"><?= $kuesioner['pekerjaan'] ?></td>
        </tr>
    </table>
    <!-- end kelar -->
    <!-- kelar -->
    <br><br><br>
    <table style="border: 1px solid black; border-collapse: collapse">
        <tr>
            <th>
                <label for="inputPassword6" class="col-form-label">Jenis Layanan Yang DiTerima : <?= $kuesioner['jenis_layanan'] ?>
                </label>
            </th>
        </tr>
    </table>
    <!-- end kelar -->
    <!-- kelar -->
    <p style="text-align: center; margin-top: 50px; margin-bottom: 30px;">
        <b>PENDAPAT RESPONDEN TENTANG PELAYANAN <br>
            <i> ( Lingkari Kode Huruf Sesuai Jawaban Masyarakat/Responden )</i></b>
    </p>
    <!-- end kelar -->


    <div style="overflow-x:auto;" class="container">
        <table style="border: 1px solid black; border-collapse: collapse" class="table table-bordered">
            <tr style="border: 1px solid black; border-collapse: collapse">
                <th style="border: 1px solid black; border-collapse: collapse">UNSUR PENILAIAN</th>
                <th style="border: 1px solid black; border-collapse: collapse">UNSUR PENILAIAN</th>
            </tr>
            <!-- pertanyaan 1 dan 6 -->
            <tr style="border: 1px solid black; border-collapse: collapse">
                <td style="border: 1px solid black; border-collapse: collapse">
                    <b> 1. Bagaimana pendapat saudara <br> tentang kesesuaian persyaratan pelayanan <br> dengan jenis pelayanan .</b>
                    <ol type="a">
                        <?php
                        $nilai = $kuesioner['p1']; // Ambil nilai dari database (misalnya, 1-4)

                        $nilai_deskripsi = ''; // Inisialisasi variabel untuk keterangan

                        switch ($nilai) {
                            case '1':
                                $nilai_deskripsi = 'Tidak Sesuai';
                                break;
                            case '2':
                                $nilai_deskripsi = 'Kurang Sesuai';
                                break;
                            case '3':
                                $nilai_deskripsi = 'Sesuai';
                                break;
                            case '4':
                                $nilai_deskripsi = 'Sangat Sesuai';
                                break;
                            default:
                                $nilai_deskripsi = 'Tidak Ada Data';
                                break;
                        }
                        ?>
                        <li><?= $nilai_deskripsi ?></li>

                    </ol>
                </td>
                <td style="border: 1px solid black; border-collapse: collapse">
                    <b> 6. Bagaimana pendapat saudara <br> tentang kompetensi/kemampuan petugas <br>dalam pelayanan</b>
                    <ol type="a">
                        <?php
                        $nilai = $kuesioner['p6']; // Ambil nilai dari database (misalnya, 1-4)

                        $nilai_deskripsi = ''; // Inisialisasi variabel untuk keterangan

                        switch ($nilai) {
                            case '1':
                                $nilai_deskripsi = 'Tidak kompeten';
                                break;
                            case '2':
                                $nilai_deskripsi = 'Kurang kompeten';
                                break;
                            case '3':
                                $nilai_deskripsi = 'Kompeten';
                                break;
                            case '4':
                                $nilai_deskripsi = 'Sangat kompeten';
                                break;
                            default:
                                $nilai_deskripsi = 'Tidak Ada Data';
                                break;
                        }
                        ?>
                        <li><?= $nilai_deskripsi ?></li>

                    </ol>
                </td>
            </tr>
            <!-- pertanyaan 2 dan 7 -->
            <tr style="border: 1px solid black; border-collapse: collapse">
                <td style="border: 1px solid black; border-collapse: collapse">
                    <b> 2. Bagaimana pemahaman saudara <br>tentang kemudahan prosedur pelayanan <br> pada unit ini.</b>
                    <ol type="a">
                        <?php
                        $nilai = $kuesioner['p2']; // Ambil nilai dari database (misalnya, 1-4)

                        $nilai_deskripsi = ''; // Inisialisasi variabel untuk keterangan

                        switch ($nilai) {
                            case '1':
                                $nilai_deskripsi = 'Tidak mudah';
                                break;
                            case '2':
                                $nilai_deskripsi = 'Kurang mudah';
                                break;
                            case '3':
                                $nilai_deskripsi = 'Mudah';
                                break;
                            case '4':
                                $nilai_deskripsi = 'Sangat mudah';
                                break;
                            default:
                                $nilai_deskripsi = 'Tidak Ada Data';
                                break;
                        }
                        ?>
                        <li><?= $nilai_deskripsi ?></li>

                    </ol>
                </td>
                <td style="border: 1px solid black; border-collapse: collapse">
                    <b>7. Bagaimana pendapat saudara tentang <br> perilaku petugas dalam pelayanan <br> terkait kesopanan dan keramahan .</b>
                    <ol type="a">
                        <?php
                        $nilai = $kuesioner['p7']; // Ambil nilai dari database (misalnya, 1-4)

                        $nilai_deskripsi = ''; // Inisialisasi variabel untuk keterangan

                        switch ($nilai) {
                            case '1':
                                $nilai_deskripsi = 'Tidak sopan dan tidak ramah';
                                break;
                            case '2':
                                $nilai_deskripsi = 'Kurang sopan dan kurang ramah';
                                break;
                            case '3':
                                $nilai_deskripsi = 'Sopan dan ramah';
                                break;
                            case '4':
                                $nilai_deskripsi = 'Sangat sopan dan sangat ramah';
                                break;
                            default:
                                $nilai_deskripsi = 'Tidak Ada Data';
                                break;
                        }
                        ?>
                        <li><?= $nilai_deskripsi ?></li>

                    </ol>
                </td>
            </tr>
            <!-- pertanyaan 3 dan 8 -->
            <tr style="border: 1px solid black; border-collapse: collapse">
                <td style="border: 1px solid black; border-collapse: collapse">
                    <b> 3. Bagaimana pendapat saudara <br>tentang kecepatan waktu dalam <br>memberi pelayanan </b>
                    <ol type="a">
                        <?php
                        $nilai = $kuesioner['p3']; // Ambil nilai dari database (misalnya, 1-4)

                        $nilai_deskripsi = ''; // Inisialisasi variabel untuk keterangan

                        switch ($nilai) {
                            case '1':
                                $nilai_deskripsi = 'Tidak cepat';
                                break;
                            case '2':
                                $nilai_deskripsi = 'Kurang cepat';
                                break;
                            case '3':
                                $nilai_deskripsi = 'Cepat';
                                break;
                            case '4':
                                $nilai_deskripsi = 'Sangat cepat';
                                break;
                            default:
                                $nilai_deskripsi = 'Tidak Ada Data';
                                break;
                        }
                        ?>
                        <li><?= $nilai_deskripsi ?></li>

                    </ol>
                </td>
                <td style="border: 1px solid black; border-collapse: collapse">
                    <b>8. Bagaimana pendapat saudara <br> tentang kualitas sarana <br> dan prasarana</b>
                    <ol type="a">
                        <?php
                        $nilai = $kuesioner['p8']; // Ambil nilai dari database (misalnya, 1-4)

                        $nilai_deskripsi = ''; // Inisialisasi variabel untuk keterangan

                        switch ($nilai) {
                            case '1':
                                $nilai_deskripsi = 'Buruk';
                                break;
                            case '2':
                                $nilai_deskripsi = 'Cukup baik';
                                break;
                            case '3':
                                $nilai_deskripsi = 'Baik';
                                break;
                            case '4':
                                $nilai_deskripsi = 'Sangat baik';
                                break;
                            default:
                                $nilai_deskripsi = 'Tidak Ada Data';
                                break;
                        }
                        ?>

                        <li><?= $nilai_deskripsi ?></li>
                    </ol>
                </td>
            </tr>
            <!-- pertanyaan 4 dan 9 -->
            <tr style="border: 1px solid black; border-collapse: collapse">
                <td style="border: 1px solid black; border-collapse: collapse">
                    <b>4. Bagaimana pendapat anda tetang <br> kewajaran biaya/tarif dalam <br>pelayanan </b>
                    <ol type="a">
                        <?php
                        $nilai = $kuesioner['p4']; // Ambil nilai dari database (misalnya, 1-4)

                        $nilai_deskripsi = ''; // Inisialisasi variabel untuk keterangan

                        switch ($nilai) {
                            case '1':
                                $nilai_deskripsi = 'Tidak Sesuai';
                                break;
                            case '2':
                                $nilai_deskripsi = 'Kurang Sesuai';
                                break;
                            case '3':
                                $nilai_deskripsi = 'Sesuai';
                                break;
                            case '4':
                                $nilai_deskripsi = 'Sangat Sesuai';
                                break;
                            default:
                                $nilai_deskripsi = 'Tidak Ada Data';
                                break;
                        }
                        ?>

                        <li><?= $nilai_deskripsi ?></li>
                    </ol>
                </td>
                <td style="border: 1px solid black; border-collapse: collapse">
                    <b>9. Bagaimana pendapat saudara <br> tentang penanganan pengaduan <br> pengguna layanan </b>
                    <ol type="a">
                        <?php
                        $nilai = $kuesioner['p9']; // Ambil nilai dari database (misalnya, 1-4)

                        $nilai_deskripsi = ''; // Inisialisasi variabel untuk keterangan

                        switch ($nilai) {
                            case '1':
                                $nilai_deskripsi = 'Tidak ada';
                                break;
                            case '2':
                                $nilai_deskripsi = 'Ada tapi tidak berfungsi';
                                break;
                            case '3':
                                $nilai_deskripsi = 'Berfungsi kurang maksimal';
                                break;
                            case '4':
                                $nilai_deskripsi = 'Dikelola dengan baik';
                                break;
                            default:
                                $nilai_deskripsi = 'Tidak Ada Data';
                                break;
                        }
                        ?>

                        <li><?= $nilai_deskripsi ?></li>
                    </ol>
                </td>
            </tr>
            <!-- pertanyaan 5 -->
            <tr style="border: 1px solid black; border-collapse: collapse">
                <td style="border: 1px solid black; border-collapse: collapse">
                    <b>5. Bagaimana pendapat saudara tentang <br> kesesuaian produk layanan antara yang <br> tercantum dalam standar pelayanan <br> dengan hasil yang diberikan.</b>
                    <ol type="a">
                        <?php
                        $nilai = $kuesioner['p5']; // Ambil nilai dari database (misalnya, 1-4)

                        $nilai_deskripsi = ''; // Inisialisasi variabel untuk keterangan

                        switch ($nilai) {
                            case '1':
                                $nilai_deskripsi = 'Tidak Sesuai';
                                break;
                            case '2':
                                $nilai_deskripsi = 'Kurang Sesuai';
                                break;
                            case '3':
                                $nilai_deskripsi = 'Sesuai';
                                break;
                            case '4':
                                $nilai_deskripsi = 'Sangat Sesuai';
                                break;
                            default:
                                $nilai_deskripsi = 'Tidak Ada Data';
                                break;
                        }
                        ?>

                        <li><?= $nilai_deskripsi ?></li>
                    </ol>
                </td>
            </tr>
        </table>
    </div>


    <!-- kelar -->
    <div class="container">
        <table style="border: 1px solid black; border-collapse: collapse;">
            <tr>
                <td style="border: 1px solid black; border-collapse: collapse;"><b><i>KRITIK DAN SARAN :</i></b></td>
            </tr>
            <tr>
                <td style="border: 1px solid black; border-collapse: collapse; height: 150px">
                    <?= $kuesioner['kritik_saran'] ?>
                </td>
            </tr>
        </table>
    </div>
    <!-- end kelar -->
</body>

</html>