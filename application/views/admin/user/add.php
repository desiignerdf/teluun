<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<script type="text/javascript" src="<?= base_url('assets/admin/js/pages/editor_summernote.js') ?>"></script>
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>Хэрэглэгч нэмэх</h4>
        </div>
        <div class="heading-elements">
            <a href="<?= base_url('admin/user') ?>" class="btn btn-default">Буцах</a>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="<?= base_url('admin/dashboard') ?>"><i class="icon-home2 position-left"></i> Хянах самбар</a></li>
            <li><a href="<?= base_url('admin/user') ?>">Хэрэглэгчийн жагсаалт</a></li>
            <li class="active">Хэрэглэгч нэмэх</li>
        </ul>
    </div>
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                </div>
            <?php endif; ?>
            <?= form_open_multipart() ?>
            <div class="panel panel-flat">
                <div class="panel-body">
                    <div class="form-group">
                        <label>Овог*:</label>
                        <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Овог оруулах" required>
                    </div>
                    <div class="form-group">
                        <label>Нэр*:</label>
                        <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Нэр оруулах" required>
                    </div>
                    <div class="form-group">
                        <label>И-мэйл*:</label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="И-мэйл оруулах" required>
                    </div>
                    <div class="form-group">
                        <label>Төлөв</label>
                        <select id="status" name="status" class="form-control">
                            <option value="0">Идэвхгүй</option>
                            <option value="1" selected="selected">Идэвхтэй</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Нууц үг*:</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Нууц үг оруулах" required>
                    </div>
                    <div class="form-group">
                        <label>Нууц үг баталгаажуулах*:</label>
                        <input type="password" id="password_confirm" name="password_confirm" class="form-control" placeholder="Нууц үг дахин оруулах" required>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Хадгалах <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>