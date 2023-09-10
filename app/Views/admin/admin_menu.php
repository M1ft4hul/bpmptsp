<?php echo $this->extend('admin/komponen/layout') ?>
<?php echo $this->section('content'); ?>
<!-- isi -->
<div class="page-titles">
    <ol class="breadcrumb">
        <li>
            <h5 class="bc-title">Pengaturan Menu Utama</h5>
        </li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Home </a>
        </li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Pengaturan Menu Utama</a></li>
    </ol>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#menuUtama"> <span class="btn-icon-start text-primary"><i class="fa fa-plus color-info"></i>
        </span>Add Menu Utama</button>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive active-projects manage-client">
                        <!-- alert -->
                        <?php session()->getFlashdata('errors');

                        if (session()->getFlashdata('pesan')) {
                            echo '<div id="alert" class="alert alert-success alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                                        <path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path>
                                    </svg>
                                    <strong>Berhasil!</strong>';

                            echo session()->getFlashdata('pesan');
                            echo '</div>';
                        }

                        ?>
                        <!-- alert -->

                        <div class="tbl-caption">
                            <h4 class="heading mb-0">Pengaturan Menu Utama</h4>
                        </div>

                        <table id="empoloyees-tblwrapper" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Menu</th>
                                    <th>Halaman</th>
                                    <th>Urutan</th>
                                    <th>Aktif</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($menus as $item) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $item['nama_menu'] ?></td>
                                        <td><?= $item['nama_halaman'] ?></td>
                                        <td><?= $item['urutan'] ?></td>
                                        <td>
                                            <?php if ($item['aktif'] == 0) : ?>
                                                <span class="badge light badge-danger">NonAktif</span>
                                            <?php elseif ($item['aktif'] == 1) : ?>
                                                <span class="badge light badge-success">Aktif</span>
                                            <?php else : ?>
                                                <span class="badge badge-warning">Tidak Ada Menu</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $item['id_menu_utama'] ?>">Edit</button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $item['id_menu_utama'] ?>">Hapus</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modah tambah menu_utama -->
<div class="modal fade" id="menuUtama">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Menu Utama</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="<?php echo base_url('/admin/Tambah_menu') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label class="col-lg-3 col-form-label" for="validationCustom01">Nama Menu
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-7">
                            <input name="nama_menu" type="text" class="form-control" id="validationCustom01" placeholder="Masukkan Nama Menu" required>
                            <div class="invalid-feedback">
                                Masukkan Nama Menu.
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-lg-3 col-form-label" for="validationCustom01">Halaman
                            <!-- <span class="text-danger">*</span> -->
                        </label>
                        <div class="col-lg-7">
                            <select name="id_halaman" class="default-select wide form-control" id="validationCustom05">
                                <?php foreach ($halaman as $m) : ?>
                                    <option value="<?= $m['id_halaman'] ?>"><?= $m['nama_halaman'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-lg-3 col-form-label" for="validationCustom01">Nomor Urut Menu
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-7">
                            <input name="urutan" type="number" class="form-control" id="validationCustom01" placeholder="Masukkan Nomor Urut Menu" required>
                            <div class="invalid-feedback">
                                Masukkan Nomor Urut Menu.
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-lg-3 col-form-label" for="validationCustom01">Status Menu
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-7">
                            <select name="aktif" class="default-select wide form-control" id="validationCustom05">
                                <option value="1">Aktif</option>
                                <option value="0">NonAktif</option>
                            </select>
                            <div class="invalid-feedback">
                                Masukkan Nomor Urut Menu.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal edit menu_utama -->
<?php foreach ($menus as $item) : ?>
    <div class="modal fade" id="editModal<?= $item['id_menu_utama'] ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Menu Utama</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <form action="/menuUtamaUpdate/<?= $item['id_menu_utama']; ?>" method="post">
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label class="col-lg-3 col-form-label" for="validationCustom01">Nama Menu
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-7">
                                <input name="nama_menu" value="<?= $item['nama_menu'] ?>" type="text" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('nama_menu')) ? 'is-invalid'  : ''; ?>" id="validationCustom01" placeholder="Masukkan Nama Menu" required>
                                <?php if (session()->getFlashdata('errors') !== null && array_key_exists('nama_menu', session()->getFlashdata('errors'))) : ?>
                                    <p class="text-danger">
                                        <?= session()->getFlashdata('errors')['nama_menu']; ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if (!empty($item['link'])) : ?>
                            <div class="mb-3 row">
                                <label class="col-lg-3 col-form-label" for="validationCustom01">Link/URL</label>
                                <div class="col-lg-7">
                                    <input type="text" value="<?= (old('link')) ? old('link') : $item['link'] ?>" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('link')) ? 'is-invalid'  : ''; ?>" name="link" id="validationCustom01" placeholder="Masukkan nama link/URL">
                                    <?php if (session()->getFlashdata('errors') !== null && array_key_exists('link', session()->getFlashdata('errors'))) : ?>
                                        <p class="text-danger">
                                            <?= session()->getFlashdata('errors')['link']; ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php elseif (!empty($item['nama_halaman'])) : ?>
                            <div class="mb-3 row">
                                <label class="col-lg-3 col-form-label" for="validationCustom01">Halaman</label>
                                <div class="col-lg-7">
                                    <select name="id_halaman" class="default-select wide form-control" id="validationCustom05">
                                        <?php foreach ($halaman as $m) : ?>
                                            <option value="<?= $m['id_halaman'] ?>" <?= ($item['id_halaman'] == $m['id_halaman']) ? 'selected' : ''; ?>><?= $m['nama_halaman'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="mb-3 row">
                            <label class="col-lg-3 col-form-label" for="validationCustom01">Nomor Urut Menu
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-7">
                                <input name="urutan" value="<?= $item['urutan'] ?>" type="number" class="form-control" id="validationCustom01" placeholder="Masukkan Nomor Urut Menu" required>
                                <div class="invalid-feedback">
                                    Masukkan Nomor Urut Menu.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-3 col-form-label" for="validationCustom01">Status Menu
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-7">
                                <select name="aktif" class="default-select wide form-control" id="validationCustom05">
                                    <option value="1">Aktif</option>
                                    <option value="0">NonAktif</option>
                                </select>
                                <div class="invalid-feedback">
                                    Masukkan Nomor Urut Menu.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- modal hapus menu_utama -->
<?php foreach ($menus as $item) : ?>
    <div class="modal fade" id="deleteModal<?= $item['id_menu_utama']; ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus Menu Utama</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus menu ini <b> <?= $item['nama_menu']; ?></b> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <form action="/admin/hapusMenuUtama_delete/<?= $item['id_menu_utama']; ?>" method="post">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php echo $this->endSection(); ?>