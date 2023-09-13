<?php echo $this->extend('komponen/layout') ?>
<?php echo $this->section('content'); ?>
<!-- Page Title -->
<div class="page-title-area">
    <div class="bg-text">
        <span>Kuesioner<br>Survei<br>Kepuasan<br>Masyarakat</span>
    </div>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="title-item">
                    <h2>Kuesioner Survei Kepuasan Masyarakat</h2>
                    <ul>
                        <li>
                            <a href="<?php echo base_url('/home') ?>">Home</a>
                        </li>
                        <li>
                            <span>Kuesioner SKM</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Title -->
<div class="contact-area ptb-100">
    <div class="container">
        <div class="section-title">
            <h4>KUESIONER <br>
                SURVEI KEPUASAN MASYARAKAT <br>
                UNIT LAYANAN PENANAMAN MODAL PELAYANAN TERPADU SATU PINTU (PTSP) <br>
                KABUPATEN KONAWE KEPULAUAN
            </h4>
        </div>
        <div class="garis"></div>

        <div class="col-lg-12 col-md-6">
            <div style="margin-bottom: 100px;" class="icon-text layout-6 wow flipInX">
                <form action="<?php echo base_url('/add/kuesioner') ?>" method="post" class="row">

                    <div class="col">
                        <table>
                            <tr>
                                <td>Tanggal Survei : </td>
                                <td></td>
                                <td>
                                    Jam Survei :
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="section-title">
                        <h6 style="margin-top: 50px; margin-bottom: 5px;"><b>PROFIL</b></h6>
                    </div>

                    <div class="container">
                        <table class="table table-bordered">
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input style="width: 30px; height: 30px;" class="form-check-input" type="checkbox" name="jk" id="inlineCheckbox1" value="Laki-Laki">
                                        <label class="form-check-label" for="inlineCheckbox1">Laki-Laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input style="width: 30px; height: 30px;" class="form-check-input" type="checkbox" name="jk" id="inlineCheckbox2" value="Perempuan">
                                        <label class="form-check-label" for="inlineCheckbox2">Perempuan</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Pendidikan</td>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input style="width: 30px; height: 30px;" class="form-check-input" type="checkbox" name="pendidikan" id="inlineCheckbox1" value="SD">
                                        <label class="form-check-label" for="inlineCheckbox1">SD</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input style="width: 30px; height: 30px;" class="form-check-input" type="checkbox" name="pendidikan" id="inlineCheckbox2" value="SMP">
                                        <label class="form-check-label" for="inlineCheckbox2">SMP</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input style="width: 30px; height: 30px;" class="form-check-input" type="checkbox" name="pendidikan" id="inlineCheckbox2" value="SMA">
                                        <label class="form-check-label" for="inlineCheckbox2">SMA</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input style="width: 30px; height: 30px;" class="form-check-input" type="checkbox" name="pendidikan" id="inlineCheckbox2" value="S1">
                                        <label class="form-check-label" for="inlineCheckbox2">S1</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input style="width: 30px; height: 30px;" class="form-check-input" type="checkbox" name="pendidikan" id="inlineCheckbox2" value="S2">
                                        <label class="form-check-label" for="inlineCheckbox2">S2</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input style="width: 30px; height: 30px;" class="form-check-input" type="checkbox" name="pendidikan" id="inlineCheckbox2" value="S3">
                                        <label class="form-check-label" for="inlineCheckbox2">S3</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input style="width: 30px; height: 30px;" class="form-check-input" type="checkbox" name="pekerjaan" id="inlineCheckbox2" value="PNS">
                                        <label class="form-check-label" for="inlineCheckbox2">PNS</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input style="width: 30px; height: 30px;" class="form-check-input" type="checkbox" name="pekerjaan" id="inlineCheckbox2" value="TNI">
                                        <label class="form-check-label" for="inlineCheckbox2">TNI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input style="width: 30px; height: 30px;" class="form-check-input" type="checkbox" name="pekerjaan" id="inlineCheckbox2" value="POLRI">
                                        <label class="form-check-label" for="inlineCheckbox2">POLRI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input style="width: 30px; height: 30px;" class="form-check-input" type="checkbox" name="pekerjaan" id="inlineCheckbox2" value="SWASTA">
                                        <label class="form-check-label" for="inlineCheckbox2">SWASTA</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input style="width: 30px; height: 30px;" class="form-check-input" type="checkbox" name="pekerjaan" id="inlineCheckbox2" value="WIRAUSAHA">
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
                                        <div class="col-sm-4">
                                            <input type="text" id="inputPassword6" class="form-control" name="jenis_layanan" aria-describedby="passwordHelpInline">
                                        </div>
                                    </div>
                                </th>
                            </tr>
                        </table>
                    </div>

                    <div class="section-title">
                        <h6 style="margin-top: 20px;"><b>PENDAPAT RESPONDEN TENTANG PELAYANAN <br></h6>
                        <h6 style="margin-bottom: 20px;"><i> ( Lingkari Kode Huruf Sesuai Jawaban Masyarakat/Responden )</i></b></h6>
                    </div>

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
                                            <input class="form-check-input" type="checkbox" name="p1" value="1" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <li>Tidak Sesuai</li>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="p1" value="2" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <li>Kurang Sesuai</li>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="p1" value="3" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <li>Sesuai</li>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="p1" value="4" id="flexCheckDefault">
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
                                            <input class="form-check-input" type="checkbox" name="p6" value="1" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <li>Tidak kompeten</li>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="p6" value="2" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <li>Kurang kompeten</li>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="p6" value="3" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <li>Kompeten</li>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="p6" value="4" id="flexCheckDefault">
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
                                            <input class="form-check-input" type="checkbox" name="p2" value="1" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <li>Tidak mudah</li>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="p2" value="2" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <li>Kurang mudah</li>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="p2" value="3" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <li>Mudah</li>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="p2" value="4" id="flexCheckDefault">
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
                                            <input class="form-check-input" type="checkbox" name="p7" value="1" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <li>Tidak sopan dan tidak ramah</li>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="p7" value="2" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <li>Kurang sopan dan kurang ramah</li>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="p7" value="3" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <li>Sopan dan ramah</li>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="p7" value="4" id="flexCheckDefault">
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
                                            <input class="form-check-input" type="checkbox" name="p3" value="1" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <li>Tidak cepat</li>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="p3" value="2" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <li>Kurang cepat</li>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="p3" value="3" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <li>Cepat</li>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="p3" value="4" id="flexCheckDefault">
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
                                            <input class="form-check-input" type="checkbox" name="p8" value="1" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <li>Buruk</li>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="p8" value="2" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <li>Cukup baik</li>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="p8" value="3" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <li>Baik</li>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="p8" value="4" id="flexCheckDefault">
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
                                            <input class="form-check-input" type="checkbox" name="p4" value="1" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <li>Tidak Sesuai</li>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="p4" value="2" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <li>Kurang Sesuai</li>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="p4" value="3" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <li>Sesuai</li>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="p4" value="4" id="flexCheckDefault">
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
                                            <input class="form-check-input" type="checkbox" name="p9" value="1" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <li>Tidak ada</li>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="p9" value="2" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <li>Ada tapi tidak berfungsi</li>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="p9" value="3" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <li>Berfungsi kurang maksimal</li>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="p9" value="4" id="flexCheckDefault">
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
                                            <input class="form-check-input" type="checkbox" name="p5" value="1" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <li>Tidak Sesuai</li>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="p5" value="2" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <li>Kurang Sesuai</li>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="p5" value="3" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <li>Sesuai</li>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="p5" value="4" id="flexCheckDefault">
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
                                    <div class="form-floating">
                                        <textarea class="form-control" name="kritik_saran" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px"></textarea>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn me-2 btn-primary">Simpan</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
<?php echo $this->endSection(); ?>