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
                            <a href="sass.html">Home</a>
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
                <div class="col-sm-6 col-lg-6">
                    <div class="form-group">
                        <label>
                            <i class='bx bx-user'></i>
                        </label>
                        <input type="text" name="nama_pengadu" value="<?= old('nama_pengadu') ?>" id="nama_pengadu" class="form-control<?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('nama_pengadu')) ? 'is-invalid'  : ''; ?>" placeholder="Masukkan Nama anda">
                        <?php if (session()->getFlashdata('errors') !== null && array_key_exists('nama_pengadu', session()->getFlashdata('errors'))) : ?>
                            <p class="text-danger">
                                <?= session()->getFlashdata('errors')['nama_pengadu']; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-6">
                    <div class="form-group">
                        <label>
                            <i class='bx bx-mail-send'></i>
                        </label>
                        <input type="email" value="<?= old('email') ?>" name="email" id="email" class="form-control<?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('email')) ? 'is-invalid'  : ''; ?>" placeholder="Masukkan Email anda">
                        <?php if (session()->getFlashdata('errors') !== null && array_key_exists('email', session()->getFlashdata('errors'))) : ?>
                            <p class="text-danger">
                                <?= session()->getFlashdata('errors')['email']; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-6">
                    <div class="form-group">
                        <label>
                            <i class='bx bx-phone-call'></i>
                        </label>
                        <input type="number" value="<?= old('telp') ?>" name="telp" id="phone_number" placeholder="Masukkan Nomor Hp/Wa" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('telp')) ? 'is-invalid'  : ''; ?>">
                        <?php if (session()->getFlashdata('errors') !== null && array_key_exists('telp', session()->getFlashdata('errors'))) : ?>
                            <p class="text-danger">
                                <?= session()->getFlashdata('errors')['telp']; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-6">
                    <div class="form-group">
                        <label>
                            <i class='bx bxs-edit'></i>
                        </label>
                        <input type="text" value="<?= old('subjek') ?>" name="subjek" id="subjek" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('subjek')) ? 'is-invalid'  : ''; ?>" placeholder="Subject">
                        <?php if (session()->getFlashdata('errors') !== null && array_key_exists('subjek', session()->getFlashdata('errors'))) : ?>
                            <p class="text-danger">
                                <?= session()->getFlashdata('errors')['subjek']; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-6">
                    <div class="form-group">
                        <input type="file" name="image" id="formFile" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('image')) ? 'is-invalid'  : ''; ?>" accept="image/*">
                        <?php if (session()->getFlashdata('errors') !== null && array_key_exists('image', session()->getFlashdata('errors'))) : ?>
                            <p class="text-danger">
                                <?= session()->getFlashdata('errors')['image']; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-6">
                    <div class="form-group">
                        <label>
                            <i class='bx bxs-calendar'></i>
                        </label>
                        <input type="date" name="tanggal" value="<?= old('tanggal') ?>" id="tanggal" class="form-control<?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('tanggal')) ? 'is-invalid'  : ''; ?>" placeholder="000-00-00" id="mdate">
                        <?php if (session()->getFlashdata('errors') !== null && array_key_exists('tanggal', session()->getFlashdata('errors'))) : ?>
                            <p class="text-danger">
                                <?= session()->getFlashdata('errors')['tanggal']; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                        <label>
                            <i class='bx bx-comment-detail'></i>
                        </label>
                        <textarea name="isian" class="form-control<?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('isian')) ? 'is-invalid'  : ''; ?>" id="isian" cols="30" rows="8" placeholder="Isi Aduan"><?= old('isian') ?></textarea>
                        <?php if (session()->getFlashdata('errors') !== null && array_key_exists('isian', session()->getFlashdata('errors'))) : ?>
                            <p class="text-danger">
                                <?= session()->getFlashdata('errors')['isian']; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                        <label>
                            <i class='bx bx-comment-detail'></i>
                        </label>
                        <textarea name="alamat_lengkap" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('alamat_lengkap')) ? 'is-invalid'  : ''; ?>" id="validationCustom01" placeholder="Alamat Lengkap"><?= old('alamat_lengkap') ?></textarea>
                        <?php if (session()->getFlashdata('errors') !== null && array_key_exists('alamat_lengkap', session()->getFlashdata('errors'))) : ?>
                            <p class="text-danger">
                                <?= session()->getFlashdata('errors')['alamat_lengkap']; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-md-12 col-lg-12">
                    <button type="submit" class="btn cmn-btn">
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