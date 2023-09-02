<?php echo $this->extend('admin/komponen/layout') ?>
<?php echo $this->section('content'); ?>
<div class="page-titles">
    <ol class="breadcrumb">
        <li>
            <h5 class="bc-title">Pengaturan Menu</h5>
        </li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Home
            </a>
        </li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Pengaturan Menu</a></li>
    </ol>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Update Menu</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="" method="post" class="needs-validation" novalidate>
                            <div class="row">
                                <?php if ($menuUtama && $menuUtama['nama_submenu'] === null) : ?>
                                    <!-- menu utama -->
                                    <div class="col-xl-6">
                                        <!-- Tampilkan form untuk menu utama -->
                                        <h3 class="card-title">Menu Utama:</h3>
                                        <br>
                                        <div class="mb-3 row">
                                            <label class="col-lg-3 col-form-label" for="validationCustom01">Nama Menu
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" value="<?= (old('nama_menu')) ? old('nama_menu') : $menuUtama['nama_menu'] ?>" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('nama_menu')) ? 'is-invalid'  : ''; ?>" name="nama_menu" id="validationCustom01" placeholder="Masukkan nama menu">
                                                <?php if (session()->getFlashdata('errors') !== null && array_key_exists('nama_menu', session()->getFlashdata('errors'))) : ?>
                                                    <p class="text-danger">
                                                        <?= session()->getFlashdata('errors')['nama_menu']; ?>
                                                    </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php if (!empty($menuUtama['link'])) : ?>
                                            <!-- Tampilkan elemen form untuk link jika id_halaman null -->
                                            <div class="mb-3 row">
                                                <label class="col-lg-3 col-form-label" for="validationCustom01">Link/URL</label>
                                                <div class="col-lg-6">
                                                    <input type="text" value="<?= (old('link')) ? old('link') : $menuUtama['link'] ?>" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('link')) ? 'is-invalid'  : ''; ?>" name="link" id="validationCustom01" placeholder="Masukkan nama link/URL">
                                                    <?php if (session()->getFlashdata('errors') !== null && array_key_exists('link', session()->getFlashdata('errors'))) : ?>
                                                        <p class="text-danger">
                                                            <?= session()->getFlashdata('errors')['link']; ?>
                                                        </p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php elseif (!empty($menuUtama['nama_halaman'])) : ?>
                                            <!-- Tampilkan elemen form untuk id_halaman jika tidak null -->
                                            <div class="mb-3 row">
                                                <label class="col-lg-3 col-form-label" for="validationCustom01">Halaman</label>
                                                <div class="col-lg-6">
                                                    <select name="id_halaman" class="default-select wide form-control" id="validationCustom05">
                                                        <?php foreach ($halaman as $m) : ?>
                                                            <option value="<?= $m['id_halaman'] ?>" <?= ($menuUtama['id_halaman'] == $m['id_halaman']) ? 'selected' : ''; ?>><?= $m['nama_halaman'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="mb-3 row">
                                            <label class="col-lg-3 col-form-label" for="validationCustom01">Nomor Urut Menu
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" value="<?= (old('urutan')) ? old('urutan') : $menuUtama['urutan'] ?>" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('urutan')) ? 'is-invalid'  : ''; ?>" name="urutan" id="validationCustom01" placeholder="Masukkan nomor urut">
                                                <?php if (session()->getFlashdata('errors') !== null && array_key_exists('urutan', session()->getFlashdata('errors'))) : ?>
                                                    <p class="text-danger">
                                                        <?= session()->getFlashdata('errors')['urutan']; ?>
                                                    </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-3 col-form-label" for="validationCustom01">Status Menu
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select name="aktif" class="default-select wide form-control" id="validationCustom05">
                                                    <option value="1">Aktif</option>
                                                    <option value="0">NonAktif</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <!-- menu sub -->
                                    <div class="col-xl-6">
                                        <!-- Tampilkan form untuk submenu -->
                                        <h3 class="card-title">Sub Menu:</h3>
                                        <br>
                                        <div class="mb-3 row">
                                            <label class="col-lg-3 col-form-label" for="validationCustom01">Nama Menu Utama
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" value="<?= (old('nama_menu')) ? old('nama_menu') : $menuUtama['nama_menu'] ?>" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('nama_menu')) ? 'is-invalid'  : ''; ?>" name="nama_menu" id="validationCustom01" placeholder="Masukkan Menu Utama">
                                                <?php if (session()->getFlashdata('errors') !== null && array_key_exists('nama_menu', session()->getFlashdata('errors'))) : ?>
                                                    <p class="text-danger">
                                                        <?= session()->getFlashdata('errors')['nama_menu']; ?>
                                                    </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-3 col-form-label" for="validationCustom01">Urutan Menu
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" value="<?= (old('urutan')) ? old('urutan') : $menuUtama['urutan'] ?>" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('urutan')) ? 'is-invalid'  : ''; ?>" name="urutan" id="validationCustom01" placeholder="Masukkan urutan menu ">
                                                <?php if (session()->getFlashdata('errors') !== null && array_key_exists('urutan', session()->getFlashdata('errors'))) : ?>
                                                    <p class="text-danger">
                                                        <?= session()->getFlashdata('errors')['urutan']; ?>
                                                    </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-3 col-form-label" for="validationCustom01">Sub Menu Sebelumnya</label>
                                            <div class="col-lg-6">
                                                <span class="badge badge-pill badge-light"><?= $menuUtama['nama_submenu'] ?></span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-3 col-form-label" for="validationCustom01">Sub Menu</label>
                                            <div class="col-lg-6">
                                                <select name="id_menu_sub" class="default-select wide form-control" id="validationCustom05">
                                                    <?php foreach ($subMenus as $subMenu) : ?>
                                                        <option value="<?= $subMenu['id_menu_utama'] ?>">
                                                            <?= $subMenu['nama_menu'] ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <button type="submit" class="btn me-2 btn-primary">Simpan</button>
                            <a href="<?php echo base_url('/admin/menu') ?>" class="btn btn-danger light">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->endSection(); ?>