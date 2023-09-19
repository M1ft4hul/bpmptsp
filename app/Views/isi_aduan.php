<?php echo $this->extend('komponen/layout') ?>
<?php echo $this->section('content'); ?>
<!-- Page Title -->
<div class="page-title-area">
    <div class="bg-text">
        <span>Dilx<br>Digital<br>Informative<br>Solution</span>
    </div>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="title-item">
                    <h2>Sistem Lapor</h2>
                    <ul>
                        <li>
                            <a href="<?php echo base_url('/home') ?>">Home</a>
                        </li>
                        <li>
                            <span>Sistem Lapor</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Title -->

<!-- Contact -->
<div class="contact-area ptb-100">
    <div class="container">
        <div class="section-title">
            <h2>Sistem Lapor</h2>
            <p>Bapak/Ibu yang terhormat, sampaikan keluhan anda tentang perizinan. Kami akan sangat senang apabila pengaduan tersebut disertai dengan bukti otentik. Jangan lupa lengkapi data anda agar kami dapat merespon dengan baik.</p>
        </div>
        <form action="<?php echo base_url('/home/aduan/store') ?>" method="post" id="contactForm" enctype="multipart/form-data">
            <div class="row">
                <!-- nama -->
                <div class="col-sm-6 col-lg-6">
                    <div class="form-group">
                        <label>
                            <i class='bx bx-user'></i>
                        </label>
                        <input type="text" name="nama" value="<?= old('nama') ?>" id="nama" class="form-control<?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('nama')) ? 'is-invalid'  : ''; ?>" placeholder="Masukkan Nama anda *">
                        <?php if (session()->getFlashdata('errors') !== null && array_key_exists('nama', session()->getFlashdata('errors'))) : ?>
                            <p class="text-danger">
                                <?= session()->getFlashdata('errors')['nama']; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- end nama -->

                <!-- jenis kelamin -->
                <div class="col-sm-6 col-lg-6">
                    <div class="form-group">
                        <select name="jk" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                            <option value="" disabled selected>Jenis Kelamin</option>
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                        <div class="invalid-feedback">
                            Jenis kelamin harus diIsi.
                        </div>
                    </div>
                </div>
                <!-- end jenis kelamin -->

                <!-- alamat rumah -->
                <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                        <label>
                            <i class='bx bx-comment-detail'></i>
                        </label>
                        <textarea cols="30" rows="5" name="alamat_rumah" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('alamat_rumah')) ? 'is-invalid'  : ''; ?>" id="validationCustom01" placeholder="Alamat Rumah *"><?= old('alamat_rumah') ?></textarea>
                        <?php if (session()->getFlashdata('errors') !== null && array_key_exists('alamat_rumah', session()->getFlashdata('errors'))) : ?>
                            <p class="text-danger">
                                <?= session()->getFlashdata('errors')['alamat_rumah']; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- end alamat rumah -->

                <!-- pekerjaan -->
                <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                        <label>
                            <i class='bx bx-home'></i>
                        </label>
                        <input type="text" value="<?= old('pekerjaan') ?>" name="pekerjaan" id="pekerjaan" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('pekerjaan')) ? 'is-invalid'  : ''; ?>" placeholder="Masukkan Pekerjaan Anda *">
                        <?php if (session()->getFlashdata('errors') !== null && array_key_exists('pekerjaan', session()->getFlashdata('errors'))) : ?>
                            <p class="text-danger">
                                <?= session()->getFlashdata('errors')['pekerjaan']; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- end pekerjaan -->

                <!-- alamat kantor -->
                <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                        <label>
                            <i class='bx bx-home'></i>
                        </label>
                        <textarea cols="30" rows="5" name="alamat_kantor" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('alamat_kantor')) ? 'is-invalid'  : ''; ?>" id="validationCustom01" placeholder="Alamat Kantor *"><?= old('alamat_kantor') ?></textarea>
                        <?php if (session()->getFlashdata('errors') !== null && array_key_exists('alamat_kantor', session()->getFlashdata('errors'))) : ?>
                            <p class="text-danger">
                                <?= session()->getFlashdata('errors')['alamat_kantor']; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- end alamat kantor -->

                <!-- email -->
                <div class="col-sm-6 col-lg-6">
                    <div class="form-group">
                        <label>
                            <i class='bx bx-mail-send'></i>
                        </label>
                        <input type="text" name="email" value="<?= old('email') ?>" id="email" class="form-control<?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('email')) ? 'is-invalid'  : ''; ?>" placeholder="Masukkan Email Anda *">
                        <?php if (session()->getFlashdata('errors') !== null && array_key_exists('email', session()->getFlashdata('errors'))) : ?>
                            <p class="text-danger">
                                <?= session()->getFlashdata('errors')['email']; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- end email -->

                <!-- ktp -->
                <div class="col-sm-6 col-lg-6">
                    <div class="form-group">
                        <label>
                            <i class='bx bx-id-card'></i>
                        </label>
                        <input type="text" name="ktp" value="<?= old('ktp') ?>" id="ktp" class="form-control<?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('ktp')) ? 'is-invalid'  : ''; ?>" placeholder="Masukkan No.KTP Anda *">
                        <?php if (session()->getFlashdata('errors') !== null && array_key_exists('ktp', session()->getFlashdata('errors'))) : ?>
                            <p class="text-danger">
                                <?= session()->getFlashdata('errors')['ktp']; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- end ktp -->

                <!-- nomor telp -->
                <div class="col-sm-6 col-lg-6">
                    <div class="form-group">
                        <label>
                            <i class='bx bx-phone-call'></i>
                        </label>
                        <input type="number" value="<?= old('tlp') ?>" name="tlp" id="phone_number" placeholder="Masukkan Nomor Hp/Wa" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('tlp')) ? 'is-invalid'  : ''; ?>">
                        <?php if (session()->getFlashdata('errors') !== null && array_key_exists('tlp', session()->getFlashdata('errors'))) : ?>
                            <p class="text-danger">
                                <?= session()->getFlashdata('errors')['tlp']; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- end nomor telp -->

                <!-- jenis aduan -->
                <div class="col-sm-6 col-lg-6">
                    <div class="form-group">
                        <select name="jenis_id" class="form-select form-select-lg mb-3">
                            <option disabled selected>Jenis Aduan Masyarakat</option>
                            <?php foreach ($jenis_aduan as $a) : ?>
                                <option value="<?= $a['id_jenis']; ?>"><?= $a['nama_aduan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Jenis kelamin harus diIsi.
                        </div>
                    </div>
                </div>
                <!-- end jenis aduan -->

                <!-- subjek -->
                <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                        <label>
                            <i class='bx bxs-edit'></i>
                        </label>
                        <input type="text" value="<?= old('subjek') ?>" name="subjek" id="subjek" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('subjek')) ? 'is-invalid'  : ''; ?>" placeholder="Ketik Judul Laporan Anda *">
                        <?php if (session()->getFlashdata('errors') !== null && array_key_exists('subjek', session()->getFlashdata('errors'))) : ?>
                            <p class="text-danger">
                                <?= session()->getFlashdata('errors')['subjek']; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- end subjek -->

                <!-- isi aduan -->
                <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                        <label>
                            <i class='bx bx-comment-detail'></i>
                        </label>
                        <textarea name="isian" class="form-control<?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('isian')) ? 'is-invalid'  : ''; ?>" id="isian" cols="30" rows="9" placeholder="Ketik Isi Laporan Anda *"><?= old('isian') ?></textarea>
                        <?php if (session()->getFlashdata('errors') !== null && array_key_exists('isian', session()->getFlashdata('errors'))) : ?>
                            <p class="text-danger">
                                <?= session()->getFlashdata('errors')['isian']; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- end isi aduan -->

                <!-- tanggal -->
                <div class="col-sm-6 col-lg-6">
                    <div class="form-group">
                        <label>
                            <i class='bx bxs-calendar'></i>
                        </label>
                        <input type="date" name="tanggal_kejadian" value="<?= old('tanggal_kejadian') ?>" id="tanggal_kejadian" class="form-control<?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('tanggal_kejadian')) ? 'is-invalid'  : ''; ?>" placeholder="000-00-00" id="mdate">
                        <?php if (session()->getFlashdata('errors') !== null && array_key_exists('tanggal_kejadian', session()->getFlashdata('errors'))) : ?>
                            <p class="text-danger">
                                <?= session()->getFlashdata('errors')['tanggal_kejadian']; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- end tanggal -->

                <!-- lokasi (data baru) -->
                <div class="col-sm-6 col-lg-6">
                    <div class="form-group">
                        <label>
                            <i class='bx bxs-map'></i>
                        </label>
                        <input type="text" value="<?= old('lokasi') ?>" name="lokasi" id="lokasi" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('lokasi')) ? 'is-invalid'  : ''; ?>" placeholder="Ketik Lokasi Kejadian *">
                        <?php if (session()->getFlashdata('errors') !== null && array_key_exists('lokasi', session()->getFlashdata('errors'))) : ?>
                            <p class="text-danger">
                                <?= session()->getFlashdata('errors')['lokasi']; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- end lokasi -->

                <!-- tujuan pengaduan -->
                <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                        <label>
                            <i class='bx bx-comment-detail'></i>
                        </label>
                        <input type="text" value="<?= old('tujuan_pengaduan') ?>" name="tujuan_pengaduan" id="tujuan_pengaduan" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('tujuan_pengaduan')) ? 'is-invalid'  : ''; ?>" placeholder="Ketik Tujuan Pengaduan *">
                        <?php if (session()->getFlashdata('errors') !== null && array_key_exists('tujuan_pengaduan', session()->getFlashdata('errors'))) : ?>
                            <p class="text-danger">
                                <?= session()->getFlashdata('errors')['tujuan_pengaduan	']; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- end tujuan pengaduan -->

                <div class="col-md-12 col-lg-12">
                    <button type="submit" class="cmn-btn">
                        Kirim Aduan
                        <i class='bx bx-plus'></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Contact -->
<?php echo $this->endSection(); ?>