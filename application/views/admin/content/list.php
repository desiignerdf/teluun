<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles form-head d-flex flex-wrap justify-content-between align-items-center mb-4">
            <h2 class="text-black font-w500 mb-0 me-auto mb-2 pe-3">Мэдээний жагсаалт</h2>
            <a href="<?= base_url('admin/content/add') ?>" class="btn btn-primary btn-rounded me-1">
                <i class="las la-plus scale5 me-1"></i>
                Нэмэх</a>
        </div>
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success" role="alert">
                <?= $this->session->flashdata('success') ?>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $this->session->flashdata('error') ?>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-12">
                <form method="get">
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <select id="c" name="c" class="selectpicker form-control" data-container="body" data-live-search="true" title="Ангилал сонгох" data-hide-disabled="true">
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
                                <div class="col-md-3 mb-5">
                                    <input id="q" name="q" class="form-control" placeholder="Хайх түлхүүр үг оруулна уу" value="" />
                                </div>
                                <div class="col-md-3 mb-5">
                                    <button type="submit" class="btn btn-primary">Хайх</button>
                                    <a href="<?= base_url('admin/content') ?>" class="btn btn-default">Болих</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <?php
                            if ($items && count($items) > 0) {
                            ?>
                                <table class="table table-bordered verticle-middle table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Гарчиг</th>
                                            <th scope="col">Төлөв</th>
                                            <th scope="col">Дараалал</th>
                                            <th scope="col">Үүсгэсэн</th>
                                            <th scope="col">Өөрчилсөн</th>
                                            <th scope="col">Үйлдэл</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($items as $item) {
                                            $i++;
                                        ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td style="min-width: 180px;"><?= $item->category_title ?></td>
                                                <td><?= $item->title ?></td>
                                                <td class="text-center">
                                                    <?php
                                                    if ($item->status) {
                                                        echo 'Идэвхтэй';
                                                    } else {
                                                        echo 'Идэвхгүй';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center"><?= $item->created_at ?></td>
                                                <td class="text-center"><?= $item->updated_at ?></td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="<?= base_url('admin/content/edit/' . $item->id) ?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="<?= base_url('admin/content/delete/' . $item->id) ?>" class="btn btn-danger shadow btn-xs sharp"><i class="fas fa-trash-alt"></i></a>
                                                    </div>
                                                </td>
                                            </tr>

                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            <?php
                            } else {
                            ?>
                                <div class="well">
                                    Одоогоор мэдээ байхгүй байна
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <?= $links; ?>
            </div>
        </div>
    </div>
</div>