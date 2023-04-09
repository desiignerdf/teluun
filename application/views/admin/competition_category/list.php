<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles form-head d-flex flex-wrap justify-content-between align-items-center mb-4">
            <h2 class="text-black font-w500 mb-0 me-auto mb-2 pe-3">Тэмцээн жагсаалт</h2>
            <a href="<?= base_url('admin/competition_category/add') ?>" class="btn btn-primary btn-rounded me-1">
                <i class="las la-plus scale5 me-1"></i>
                Нэмэх</a>
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
                                                <td><?= $item->name ?></td>
                                                <td><?php
                                                    if ($item->status) {
                                                        echo 'Идэвхтэй';
                                                    } else {
                                                        echo 'Идэвхгүй';
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= $item->display_order ?></td>
                                                <td><?= $item->created_at ?></td>
                                                <td><?= $item->updated_at ?></td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="<?= base_url('admin/competition_category/edit/' . $item->id) ?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="<?= base_url('admin/competition_category/delete/' . $item->id) ?>" class="btn btn-danger shadow btn-xs sharp"><i class="fas fa-trash-alt"></i></a>
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
                                    Одоогоор тэмцээн байхгүй байна
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