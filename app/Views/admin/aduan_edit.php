<?php echo $this->extend('admin/komponen/layout') ?>
<?php echo $this->section('content'); ?>
<!-- isi -->
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
                    <h4 class="card-title">Detail Aduan Masyarakat</h4>

                </div>

                <div class="card-body">

                    <div class="basic-form">
                        <h3 class="mb-2 text-black"><?= $aduan['subjek']; ?></h3>
                        <ul class="mb-4 post-meta d-flex flex-wrap">
                            <li class="post-author me-3">Dari <?= $aduan['nama']; ?></li>
                            <li class="post-date me-3"><i class="far fa-calendar-plus me-2"></i><?= $aduan['tanggal_kejadian']; ?></li>
                            <li class="post-comment"><i class="far fa-file me-2"></i><?= $aduan['nama_jenis_aduan']; ?></li>
                        </ul>
                        <p><?= $aduan['isian']; ?>.</p>
                        <div class="profile-skills mt-5 mb-5">
                            <a class="btn btn-primary light btn-xs mb-1">Tujuan Pengaduan : <?= $aduan['tujuan_pengaduan']; ?></a>
                        </div>
                        <?php if (!empty($aduan['tanggapan'])) : ?>
                            <div class="profile-skills mt-5 mb-5">
                                <h4 class="text-primary mb-2">Tanggapan Anda :</h4>
                                <p><?= $aduan['tanggapan']; ?>.</p>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <a href="<?php echo base_url('/admin/aduan') ?>" class="btn btn-danger light">Kembali</a>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="comment-respond" id="respond">
                                <h4 class="comment-reply-title text-primary mb-3" id="reply-title">Kirim Tanggapan </h4>
                                <form action="/aduanUpdate/<?= $aduan['id']; ?>" method="post" class="comment-form" id="commentform">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="comment" class="text-black font-w600 form-label">Komentar</label>
                                                <textarea rows="6" class="form-control h-100 <?= (service('request')->getMethod(true) == 'POST' && service('validation')->hasError('tanggapan')) ? 'is-invalid'  : ''; ?>" name="tanggapan" placeholder="Ketik Tanggapan Anda" id="comment"><?= old('tanggapan') ?></textarea>
                                                <?php if (session()->getFlashdata('errors') !== null && array_key_exists('tanggapan', session()->getFlashdata('errors'))) : ?>
                                                    <p class="text-danger">
                                                        <?= session()->getFlashdata('errors')['tanggapan']; ?>
                                                    </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <button type="submit" class="btn me-2 btn-primary">Simpan</button>
                                                <a href="<?php echo base_url('/admin/aduan') ?>" class="btn btn-danger light">Kembali</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->endSection(); ?>