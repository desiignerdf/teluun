<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles form-head d-flex flex-wrap justify-content-between align-items-center mb-4">
            <h2 class="text-black font-w500 mb-0 me-auto mb-2 pe-3">Ангилал засах</h2>
            <a href="<?= base_url('admin/category') ?>" class="btn btn-default me-1">
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
                            <input type="hidden" id="cid" name="cid" value="<?= $cid ?>" />
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom08">Гарчиг
                                        </label>
                                        <div class="col-lg-12">
                                            <input type="text" id="title" name="title" class="form-control" value="<?= $title ?>" placeholder="Нэр оруулах" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom08">Тайлбар
                                        </label>
                                        <div class="col-lg-12">
                                            <textarea id="description" name="description" class="form-control" placeholder="Тайлбар оруулах"><?= $description ?></textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom06">Дараалал
                                        </label>
                                        <div class="col-lg-12">
                                            <input type="text" id="display_order" name="display_order" class="form-control" value="<?= $display_order ?>" placeholder="Дараалал оруулах">
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

<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>Ангилал засах</h4>
        </div>
        <div class="heading-elements">
            <a href="<?= base_url('admin/category') ?>" class="btn btn-default">Буцах</a>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="<?= base_url('admin/dashboard') ?>"><i class="icon-home2 position-left"></i> Хянах самбар</a>
            </li>
            <li><a href="<?= base_url('admin/category') ?>"><i class="icon-user position-left"></i> Ангилал жагсаалт</a>
            </li>
            <li class="active">Ангилал засах</li>
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
            <?= form_open() ?>
            <div class="panel panel-flat">
                <div class="panel-body">
                    <input type="hidden" id="cid" name="cid" value="<?= $cid ?>" />
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
                                        </div>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
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