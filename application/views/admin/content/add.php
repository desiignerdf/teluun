<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<script type="text/javascript" src="<?= base_url('assets/admin/js/plugins-init/editor_summernote.js') ?>"></script>

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles form-head d-flex flex-wrap justify-content-between align-items-center mb-4">
            <h2 class="text-black font-w500 mb-0 me-auto mb-2 pe-3">Мэдээ нэмэх</h2>
            <a href="<?= base_url('admin/content') ?>" class="btn btn-default me-1">
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
                                <div class="col-xl-12">
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom05">Ангилал
                                        </label>
                                        <div class="col-lg-12">
                                            <select class="default-select wide form-control" id="category" name="category">
                                                <option value="">Ангилал сонгох</option>
                                                <?php
                                                foreach ($categories as $category) {
                                                ?>
                                                    <option value="<?= $category->id ?>"><?= $category->title ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom08">Гарчиг
                                        </label>
                                        <div class="col-lg-12">
                                            <input type="text" id="title" name="title" class="form-control" placeholder="Нэр оруулах" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom08">Тайлбар
                                        </label>
                                        <div class="col-lg-12">
                                            <textarea id="description" name="description" class="form-control" placeholder="Тайлбар оруулах"></textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom08">Агуулга
                                        </label>
                                        <div class="col-lg-12">
                                            <textarea style="height: 150px;" class="form-control" id="content" name="content"></textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom08">Зураг:
                                        </label>
                                        <div class="col-lg-12">
                                            <div class="input-group">
                                                <div class="form-file">
                                                    <input type="file" id="fileUp" name="fileUp" class=" form-file-input form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom05">Төлөв
                                        </label>
                                        <div class="col-lg-12">
                                            <select class="default-select wide form-control" id="status" name="status">
                                                <option value="0">Идэвхгүй</option>
                                                <option selected value="1">Идэвхтэй</option>
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