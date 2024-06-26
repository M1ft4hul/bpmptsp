<?php echo $this->extend('admin/komponen/layout') ?>
<?php echo $this->section('content'); ?>
<div class="page-titles">
    <ol class="breadcrumb">
        <li>
            <h5 class="bc-title">Aduan Masyarakat</h5>
        </li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Home </a>
        </li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Aduan Masyarakat</a></li>
    </ol>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form input Aduan</h4>

                </div>

                <div class="card-body">

                    <div class="basic-form">
                        <form action="<?php echo base_url('/admin/aduan/store') ?>" method="post" class="form-valide-with-icon needs-validation" novalidate enctype="multipart/form-data">
                            <!-- <div class="mb-3 row">
                                <label class="col-lg-3 col-form-label" for="validationCustom01">Nama Pengadu
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="</?= old('nama_pengadu') ?>" class="form-control </?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('nama_pengadu')) ? 'is-invalid'  : ''; ?>" name="nama_pengadu" id="validationCustom01" placeholder="Masukkan nama pengadu">
                                    </?php if (session()->getFlashdata('errors') !== null && array_key_exists('nama_pengadu', session()->getFlashdata('errors'))) : ?>
                                        <p class="text-danger">
                                            </?= session()->getFlashdata('errors')['nama_pengadu']; ?>
                                        </p>
                                    </?php endif; ?>
                                </div>
                            </div> -->
                            <!-- <div class="mb-3 row">
                                <label class="col-lg-3 col-form-label" for="validationCustom01">Email
                                </label>
                                <div class="col-lg-6">
                                    <input type="email" value="</?= old('email') ?>" class="form-control </?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('email')) ? 'is-invalid'  : ''; ?>" name="email" id="validationCustom01" placeholder="Masukkan Email pengadu">
                                    </?php if (session()->getFlashdata('errors') !== null && array_key_exists('email', session()->getFlashdata('errors'))) : ?>
                                        <p class="text-danger">
                                            </?= session()->getFlashdata('errors')['email']; ?>
                                        </p>
                                    </?php endif; ?>
                                </div>
                            </div> -->
                            <!-- <div class="mb-3 row">
                                <label class="col-lg-3 col-form-label" for="validationCustom01">Hp/Wa
                                </label>
                                <div class="col-lg-6">
                                    <input type="number" value="</?= old('telp') ?>" class="form-control </?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('telp')) ? 'is-invalid'  : ''; ?>" name="telp" id="validationCustom01" placeholder="Masukkan Nomor Hp/Wa">
                                    </?php if (session()->getFlashdata('errors') !== null && array_key_exists('telp', session()->getFlashdata('errors'))) : ?>
                                        <p class="text-danger">
                                            </?= session()->getFlashdata('errors')['telp']; ?>
                                        </p>
                                    </?php endif; ?>
                                </div>
                            </div> -->

                            <!-- subjek -->
                            <div class="mb-3 row">
                                <label class="col-lg-3 col-form-label" for="validationCustom01">Judul Laporan *
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?= old('subjek') ?>" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('subjek')) ? 'is-invalid'  : ''; ?>" name="subjek" id="validationCustom01" placeholder="Masukkan Judul Laporan">
                                    <?php if (session()->getFlashdata('errors') !== null && array_key_exists('subjek', session()->getFlashdata('errors'))) : ?>
                                        <p class="text-danger">
                                            <?= session()->getFlashdata('errors')['subjek']; ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- end subjek -->

                            <!-- lokasi -->
                            <div class="mb-3 row">
                                <label class="col-lg-3 col-form-label" for="validationCustom01">Lokasi Kejadian*
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?= old('lokasi') ?>" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('lokasi')) ? 'is-invalid'  : ''; ?>" name="lokasi" id="validationCustom01" placeholder="Masukkan Lokasi Kejadian">
                                    <?php if (session()->getFlashdata('errors') !== null && array_key_exists('lokasi', session()->getFlashdata('errors'))) : ?>
                                        <p class="text-danger">
                                            <?= session()->getFlashdata('errors')['lokasi']; ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- end lokasi -->


                            <!-- kategori -->
                            <div class="mb-3 row">
                                <label class="col-lg-3 col-form-label" for="validationCustom01">Kategori Laporan*
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?= old('kategori') ?>" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('kategori')) ? 'is-invalid'  : ''; ?>" name="kategori" id="validationCustom01" placeholder="Masukkan Kategori Laporan">
                                    <?php if (session()->getFlashdata('errors') !== null && array_key_exists('kategori', session()->getFlashdata('errors'))) : ?>
                                        <p class="text-danger">
                                            <?= session()->getFlashdata('errors')['kategori']; ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- end kategori -->

                            <!-- tanggal -->
                            <div class="mb-3 row">
                                <label class="col-lg-3 col-form-label" for="validationCustom01">Tanggal Kejadian *
                                </label>
                                <div class="col-lg-6 form-material">
                                    <input type="text" name="tanggal_kejadian" value="<?= old('tanggal_kejadian') ?>" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('tanggal_kejadian')) ? 'is-invalid'  : ''; ?>" placeholder="000-00-00" id="mdate">
                                    <?php if (session()->getFlashdata('errors') !== null && array_key_exists('tanggal_kejadian', session()->getFlashdata('errors'))) : ?>
                                        <p class="text-danger">
                                            <?= session()->getFlashdata('errors')['tanggal_kejadian']; ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- end tanggal -->

                            <!-- isian -->
                            <div class="mb-3 row">
                                <label class="col-lg-3 col-form-label" for="validationCustom01">Isi Aduan
                                </label>
                                <div class="col-lg-9 form-material">
                                    <textarea name="isian" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('isian')) ? 'is-invalid'  : ''; ?>" id="ckeditor"><?= old('isian') ?></textarea>
                                    <?php if (session()->getFlashdata('errors') !== null && array_key_exists('isian', session()->getFlashdata('errors'))) : ?>
                                        <p class="text-danger">
                                            <?= session()->getFlashdata('errors')['isian']; ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- end isian -->

                            <!-- upload lampiran -->
                            <div class="mb-3 row">
                                <label class="col-lg-3 col-form-label" for="validationCustom01">Upload Lampiran</label>
                                <div class="col-lg-6">
                                    <input class="form-control" type="file" name="image" id="formFile" accept="image/*">
                                </div>
                            </div>
                            <!-- end upload lampiran -->

                            <button type="submit" class="btn me-2 btn-primary">Simpan</button>
                            <a href="<?php echo base_url('/admin/aduan') ?>" class="btn btn-danger light">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->endSection(); ?>