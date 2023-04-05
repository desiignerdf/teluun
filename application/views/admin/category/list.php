<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4>Ангилал жагсаалт</h4>
        </div>
        <div class="heading-elements">
            <a href="<?= base_url('admin/category/add') ?>" class="btn btn-primary">Шинээр нэмэх <i class="fas fa-caret-right position-right"></i></a>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fas fa-home position-left"></i> Хянах самбар</a>
            </li>
            <li class="active">Ангилал жагсаалт</li>
        </ul>
    </div>
</div>
<div class="content">
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
                            <div class="col-md-3 mb-5">
                                <input id="q" name="q" class="form-control" placeholder="Гарчиг оруулна уу" value="" />
                            </div>
                            <div class="col-md-3 mb-5">
                                <button type="submit" class="btn btn-primary">Хайх</button>
                                <a href="<?= base_url('admin/category') ?>" class="btn btn-default">Болих</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="panel panel-flat">
        <div class="table-responsive">
            <?php
            if ($items && count($items) > 0) {
            ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Гарчиг</th>
                            <th class="text-center">Төлөв</th>
                            <th class="text-center">Дараалал</th>
                            <th class="text-center">Үүсгэсэн</th>
                            <th class="text-center">Өөрчилсөн</th>
                            <th class="text-center">Үйлдэл</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($items as $item) {
                            $i++;
                        ?>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
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
                                <td class="text-center"><?= $item->display_order ?></td>
                                <td class="text-center"><?= $item->created_at ?></td>
                                <td class="text-center"><?= $item->updated_at ?></td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="text-primary-600"><a href="<?= base_url('admin/category/edit/' . $item->id) ?>"><i class="fas fa-edit "></i></a></li>
                                        <li class="text-danger-600"><a href="<?= base_url('admin/category/delete/' . $item->id) ?>" data-confirm="Энэ ангиллыг устгах уу?" class="delete"><i class="fas fa-trash-alt"></i></a></li>
                                    </ul>
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
                    Одоогоор ангилал байхгүй байна
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="text-center">
        <?= $links; ?>
    </div>
</div>