<?php echo $this->extend('admin/komponen/layout') ?>
<?php echo $this->section('content'); ?>
<div class="page-titles">
    <ol class="breadcrumb">
        <li>
            <h5 class="bc-title">Pengaturan Halaman</h5>
        </li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Home </a>
        </li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Pengaturan Halaman</a></li>
    </ol>
    <a href="<?php echo base_url('/admin/menu/halaman/create') ?>" class="btn btn-primary">
        <span class="btn-icon-start text-primary"><i class="fa fa-plus color-info"></i>
        </span>Add Halaman</a>
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
                            <h4 class="heading mb-0">Pengaturan Halaman</h4>
                        </div>
                        <table id="empoloyees-tblwrapper" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Halaman</th>
                                    <th>Isi Halaman</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($halaman as $item) : ?>
                                    <tr>
                                        <td><a href="javascript:void(0)"><?= $no++; ?></a></td>
                                        <td><span><?= $item['nama_halaman'] ?></span></td>
                                        <td><span><?= substr($item['isi_halaman'], 0, 400); ?>...</span></td>
                                        <td>
                                            <a class="btn btn-warning" href="<?= base_url('/admin/halaman/edit/' . $item['id_halaman']) ?>">Edit</a>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $item['id_halaman']?>">Hapus</button>
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
<?php
foreach ($halaman as $item) {
?>
    <div class="modal fade" id="deleteModal<?= $item['id_halaman']; ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus Halaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus Halaman ini <b> <?= $item['nama_halaman']; ?></b> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <form action="/admin/halaman_delete/<?= $item['id_halaman']; ?>" method="post">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php echo $this->endSection(); ?>