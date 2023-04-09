<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<script type="text/javascript" src="<?= base_url('assets/admin/js/pages/editor_summernote.js') ?>"></script>

<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<script type="text/javascript" src="<?= base_url('assets/admin/js/plugins-init/editor_summernote.js') ?>"></script>

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles form-head d-flex flex-wrap justify-content-between align-items-center mb-4">
            <h2 class="text-black font-w500 mb-0 me-auto mb-2 pe-3">Тохиргоо</h2>
            <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-default me-1">
                Буцах</a>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                            <?php if (validation_errors()) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= validation_errors() ?>
                                </div>
                            <?php endif; ?>
                            <?= form_open_multipart() ?>
                            <div class="row">
                                <input type="hidden" id="id" name="id" value="<?= $id ?>" />
                                <div class="col-xl-12">

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom08">Овог
                                        </label>
                                        <div class="col-lg-12">
                                            <input type="text" id="lastname" name="lastname" class="form-control" value="<?= $lastname ?>" placeholder="Овог оруулах" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom08">Нэр
                                        </label>
                                        <div class="col-lg-12">
                                            <input type="text" id="firstname" name="firstname" class="form-control" value="<?= $firstname ?>" placeholder="Нэр оруулах" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom08">И-мэйл
                                        </label>
                                        <div class="col-lg-12">
                                            <input type="text" id="email1" name="meail" class="form-control" value="<?= $email ?>" placeholder="И-мэйл оруулах" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom08">Нууц үг
                                        </label>
                                        <div class="col-lg-12">
                                            <input type="password" id="password" name="password" value="password" class="form-control" placeholder="Нууц үг оруулах" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom08">Нууц үг баталгаажуулах
                                        </label>
                                        <div class="col-lg-12">
                                            <input type="password" id="password_confirm" name="password_confirm" value="password" class="form-control" placeholder="Нууц үг дахин оруулах" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom05">Төлөв
                                        </label>
                                        <div class="col-lg-12">
                                            <select class="default-select wide form-control" id="status" name="status">
                                                <option value="0" <?php if ($status == 0) echo "selected" ?>>Идэвхгүй</option>
                                                <option value="1" <?php if ($status == 1) echo "selected" ?>>Идэвхтэй</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-primary">Хадгалах</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>