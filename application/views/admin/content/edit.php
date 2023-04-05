<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<script type="text/javascript" src="<?= base_url('assets/admin/js/pages/editor_summernote.js') ?>"></script>
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>Мэдээ засах</h4>
        </div>
        <div class="heading-elements">
            <a href="<?= base_url('admin/content') ?>" class="btn btn-default">Буцах</a>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="<?= base_url('admin/dashboard') ?>"><i class="icon-home2 position-left"></i> Хянах самбар</a>
            </li>
            <li><a href="<?= base_url('admin/content') ?>"><i class="icon-list position-left"></i> Мэдээний жагсаалт</a>
            </li>
            <li class="active">Мэдээ засах</li>
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
                    <input type="hidden" id="cid" name="cid" value="<?= $cid ?>" />
                    <input type="hidden" id="file_id" name="file_id" value="<?= $file_id ?>" />
                    <div class="form-group">
                        <label>Ангилал</label>
                        <select id="category" name="category" class="selectpicker form-control" data-container="body" data-live-search="true" title="Ангилал сонгох" data-hide-disabled="true" required>
                            <?php
                            foreach ($categories as $category) {
                                if ($category->id == $category_id) {
                            ?>
                                    <option value="<?= $category->id ?>" selected="selected"><?= $category->title ?></option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?= $category->id ?>"><?= $category->title ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="tabbable">
                        <ul class="nav nav-tabs nav-tabs-top">
                            <?php
                            $i = 0;
                            foreach ($languages as $language) {
                                $i++;
                                $active = false;
                                if ($i == 1) {
                                    $active = true;
                                }
                            ?>
                                <li <?php if ($active) {
                                        echo 'class="active"';
                                    } ?>><a href="#language-tab<?= $language->id ?>" data-toggle="tab" aria-expanded="true"><?= $language->title ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                        <div class="tab-content">
                            <?php
                            $i = 0;
                            foreach ($languages as $language) {
                                $i++;
                                $active = false;
                                if ($i == 1) {
                                    $active = true;
                                }

                                foreach ($translates as $translate) {
                                    if ($language->id == $translate->language_id) {
                            ?>
                                        <input type="hidden" id="tid" name="tid<?= $language->id ?>" value="<?= $translate->id ?>" />
                                        <div class="tab-pane <?php if ($active) {
                                                                    echo 'active';
                                                                } ?>" id="language-tab<?= $language->id ?>">
                                            <div class="form-group">
                                                <label>Гарчиг</label>
                                                <input type="text" id="title<?= $language->id ?>" name="title<?= $language->id ?>" class="form-control" placeholder="Гарчиг оруулах" required value="<?= $translate->title ?>">
                                            </div>

                                            <div class="form-group">
                                                <label>Тайлбар:</label>
                                                <textarea id="description<?= $language->id ?>" name="description<?= $language->id ?>" class="form-control" placeholder="Тайлбар оруулах"><?= $translate->description ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Агуулга:</label>
                                                <textarea class="summernote" id="editor-full<?= $language->id ?>" name="content<?= $language->id ?>"><?= $translate->content ?></textarea>
                                            </div>
                                        </div>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label>Видео:</label> (зөвхөн видео мэдээ оруулах бол ашиглана)
                        <input type="text" id="video" value="<?= $video ?>" name="video" class="form-control" placeholder="Видео оруулах">
                    </div> -->
                    <div class="form-group">
                        <label class="text-semibold">Зураг:</label>
                        <div class="media no-margin-top">
                            <div class="media-left">
                                <?php
                                if (isset($file)) {
                                ?>
                                    <a href="#"><img src="<?= base_url('uploads/' . $file->file_name) ?>" style="width: 150px; height: 100px; border-radius: 2px;" alt=""></a>
                                <?php
                                } else {
                                ?>
                                    <a href="#"><img src="<?= base_url('assets/admin/images/placeholder.jpg') ?>" style="width: 58px; height: 58px; border-radius: 2px;" alt=""></a>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="media-body">
                                <input id="fileUp" name="fileUp" type="file" class="file-input">
                                <span class="help-block">Зургийн төрөл: gif, png, jpg. Хэмжээ хамгийн ихдээ: 2Mb</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Огноо:</label>
                        <input type="datetime" id="published_at" name="published_at" class="form-control" value="<?= $published_at ?>" placeholder="Огноо оруулах">
                    </div>
                    <div class="form-group">
                        <label>Зураг харуулах:</label>
                        <select id="show_image" name="show_image" class="form-control">
                            <option value="0" <?php if ($show_image == 0) echo "selected" ?>>Үгүй</option>
                            <option value="1" <?php if ($show_image == 1) echo "selected" ?>>Тийм</option>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label>Онцлох эсэх:</label>
                        <select id="is_featured" name="is_featured" class="form-control">
                            <option value="0" <?php if ($is_featured == 0) echo "selected" ?>>Онцлох биш</option>
                            <option value="1" <?php if ($is_featured == 1) echo "selected" ?>>Онцлох</option>
                        </select>
                    </div> -->
                    <div class="form-group">
                        <label>Дараалал:</label>
                        <input type="text" id="display_order" name="display_order" class="form-control" placeholder="Дараалал оруулах" value="<?= $display_order ?>">
                    </div>
                    <div class="form-group">
                        <label>Төлөв</label>
                        <select id="status" name="status" class="form-control">
                            <option value="0" <?php if ($status == 0) echo "selected" ?>>Идэвхгүй</option>
                            <option value="1" <?php if ($status == 1) echo "selected" ?>>Идэвхтэй</option>
                        </select>
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