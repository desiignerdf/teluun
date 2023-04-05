<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<script type="text/javascript" src="<?= base_url('assets/admin/js/pages/editor_summernote.js') ?>"></script>
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>Мэдээ нэмэх</h4>
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
            <li class="active">Мэдээ нэмэх</li>
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
                        <label>Ангилал</label>
                        <select id="category" name="category" class="selectpicker form-control" data-container="body" data-live-search="true" title="Ангилал сонгох" data-hide-disabled="true" required>
                            <?php
                            foreach ($categories as $category) {
                            ?>
                                <option value="<?= $category->id ?>"><?= $category->title ?></option>
                            <?php
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

                            ?>
                                <div class="tab-pane <?php if ($active) {
                                                            echo 'active';
                                                        } ?>" id="language-tab<?= $language->id ?>">
                                    <div class="form-group">
                                        <label>Гарчиг:</label>
                                        <input type="text" id="title<?= $language->id ?>" name="title<?= $language->id ?>" class="form-control" placeholder="Гарчиг оруулах" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Тайлбар:</label>
                                        <textarea id="description<?= $language->id ?>" name="description<?= $language->id ?>" class="form-control" placeholder="Тайлбар оруулах"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Агуулга:</label>
                                        <textarea class="summernote" id="editor-full<?= $language->id ?>" name="content<?= $language->id ?>"></textarea>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label>Видео:</label> (зөвхөн видео мэдээ оруулах бол ашиглана)
                        <input type="text" id="video" name="video" class="form-control" placeholder="Видео оруулах">
                    </div> -->
                    <div class="form-group">
                        <label class="display-block">Зураг:</label>
                        <input id="fileUp" name="fileUp" type="file" class="file-input">
                        <span class="help-block">Зургийн төрөл: gif, png, jpg. Хэмжээ хамгийн ихдээ: 2Mb</span>
                    </div>
                    <div class="form-group">
                        <label>Огноо:</label> (нийтлэл нь оруулж байгаа өдрөөс өөр өдөрт хамаарах бол энд тохируулна уу)
                        <input type="datetime" id="published_at" name="published_at" value="<?= date('Y-m-d H:i:s') ?>" class="form-control" placeholder="Огноо оруулах">
                    </div>
                    <div class="form-group">
                        <label>Зураг харуулах:</label>
                        <select id="show_image" name="show_image" class="form-control">
                            <option value="0">Үгүй</option>
                            <option value="1" selected="selected">Тийм</option>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label>Онцлох эсэх:</label>
                        <select id="is_featured" name="is_featured" class="form-control">
                            <option value="0" selected>Онцлох биш</option>
                            <option value="1">Онцлох</option>
                        </select>
                    </div> -->
                    <div class="form-group">
                        <label>Дараалал:</label>
                        <input type="text" id="display_order" name="display_order" class="form-control" placeholder="Дараалал оруулах" value="0">
                    </div>
                    <div class="form-group">
                        <label>Төлөв</label>
                        <select id="status" name="status" class="form-control">
                            <option value="0">Идэвхгүй</option>
                            <option value="1" selected="selected">Идэвхтэй</option>
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