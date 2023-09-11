<?php echo $this->extend('admin/komponen/layout') ?>
<?php echo $this->section('content'); ?>
<div class="page-titles">
    <ol class="breadcrumb">
        <li>
            <h5 class="bc-title">Data Login</h5>
        </li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Home </a>
        </li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Login</a></li>
    </ol>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Data</h4>

                </div>

                <div class="card-body">

                    <div class="basic-form">
                        <form action="<?php echo base_url('/admin/data_login/store') ?>" method="post" class="form-valide-with-icon needs-validation" novalidate>
                            <div class="mb-3 row">
                                <label class="col-lg-3 col-form-label" for="validationCustom01">Username
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?= old('username') ?>" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('username')) ? 'is-invalid'  : ''; ?>" name="username" id="validationCustom01" placeholder="Masukkan Username">
                                    <?php if (session()->getFlashdata('errors') !== null && array_key_exists('username', session()->getFlashdata('errors'))) : ?>
                                        <p class="text-danger">
                                            <?= session()->getFlashdata('errors')['username']; ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-lg-3 col-form-label" for="validationCustom01">Email
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?= old('email') ?>" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('email')) ? 'is-invalid'  : ''; ?>" name="email" id="validationCustom01" placeholder="Masukkan Email">
                                    <?php if (session()->getFlashdata('errors') !== null && array_key_exists('email', session()->getFlashdata('errors'))) : ?>
                                        <p class="text-danger">
                                            <?= session()->getFlashdata('errors')['email']; ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-lg-3 col-form-label" for="validationCustom01">Password
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="password" value="<?= old('password') ?>" class="form-control <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('password')) ? 'is-invalid'  : ''; ?>" name="password" id="validationCustom01" placeholder="Masukkan Password">
                                    <?php if (session()->getFlashdata('errors') !== null && array_key_exists('password', session()->getFlashdata('errors'))) : ?>
                                        <p class="text-danger">
                                            <?= session()->getFlashdata('errors')['password']; ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <button type="submit" class="btn me-2 btn-primary">Simpan</button>
                            <a href="<?php echo base_url('/admin/menu/login') ?>" class="btn btn-danger light">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->endSection(); ?>