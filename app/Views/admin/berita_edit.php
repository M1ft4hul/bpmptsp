<?php echo $this->extend('admin/komponen/layout') ?>
<?php echo $this->section('content'); ?>
<div class="page-titles">
    <ol class="breadcrumb">
        <li>
            <h5 class="bc-title">Berita</h5>
        </li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Home </a>
        </li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Berita</a></li>
    </ol>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form edit Berita</h4>

                </div>

                <div class="card-body">

                    <div class="basic-form">
                        <form action="/beritaUpdate/<?= $berita['id']; ?>" method="post" class="form-valide-with-icon needs-validation" novalidate enctype="multipart/form-data">
                            <div class="mb-3 row">
                                <label class="col-lg-3 col-form-label" for="validationCustom01">Tanggal
                                </label>
                                <div class="col-lg-6 form-material">
                                    <input type="text" name="tanggal" value="<?= (old('tanggal')) ? old('tanggal') : $berita['tanggal'] ?>" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('tanggal')) ? 'is-invalid'  : ''; ?>" placeholder="000-00-00" id="mdate">
                                    <?php if (session()->getFlashdata('errors') !== null && array_key_exists('tanggal', session()->getFlashdata('errors'))) : ?>
                                        <p class="text-danger">
                                            <?= session()->getFlashdata('errors')['tanggal']; ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-lg-3 col-form-label" for="category_id">Pilih Kategori</label>
                                <div class="col-lg-6">
                                    <select name="category_id" id="category_id" class="default-select form-control wide">
                                        <?php foreach ($categories as $category) : ?>
                                            <option value="<?= $category['id']; ?>"><?= $category['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-lg-3 col-form-label" for="validationCustom01">Judul
                                </label>
                                <div class="col-lg-6">
                                    <textarea name="judul" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('judul')) ? 'is-invalid'  : ''; ?>" id="validationCustom01"><?= $berita['judul'] ?></textarea>
                                    <?php if (session()->getFlashdata('errors') !== null && array_key_exists('judul', session()->getFlashdata('errors'))) : ?>
                                        <p class="text-danger">
                                            <?= session()->getFlashdata('errors')['judul']; ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-lg-3 col-form-label" for="validationCustom01">Isi Berita
                                </label>
                                <div class="col-lg-9 form-material">
                                    <textarea name="konten" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('konten')) ? 'is-invalid'  : ''; ?>" id="ckeditor"><?= $berita['konten'] ?></textarea>
                                    <?php if (session()->getFlashdata('errors') !== null && array_key_exists('konten', session()->getFlashdata('errors'))) : ?>
                                        <p class="text-danger">
                                            <?= session()->getFlashdata('errors')['konten']; ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-lg-3 col-form-label" for="validationCustom01">Upload Gambar</label>
                                <div class="col-lg-6">
                                    <input class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('image')) ? 'is-invalid'  : ''; ?>" type="file" name="image" id="formFile" accept="image/*">
                                    <?php if (session()->getFlashdata('errors') !== null && array_key_exists('image', session()->getFlashdata('errors'))) : ?>
                                        <p class="text-danger">
                                            <?= session()->getFlashdata('errors')['image']; ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-lg-3 col-form-label" for="validationCustom01">Penulis
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?= (old('author')) ? old('author') : $berita['author'] ?>" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('author')) ? 'is-invalid'  : ''; ?>" name="author" id="validationCustom01" placeholder="Masukkan Penulis Berita">
                                    <?php if (session()->getFlashdata('errors') !== null && array_key_exists('author', session()->getFlashdata('errors'))) : ?>
                                        <p class="text-danger">
                                            <?= session()->getFlashdata('errors')['author']; ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <button type="submit" class="btn me-2 btn-primary">Simpan</button>
                            <a href="<?php echo base_url('/admin/berita') ?>" class="btn btn-danger light">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end -->
<?php echo $this->endSection(); ?>