<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles form-head d-flex flex-wrap justify-content-between align-items-center mb-4">
            <h2 class="text-black font-w500 mb-0 me-auto mb-2 pe-3">Баг нэмэх</h2>
            <a href="<?= base_url('admin/teams') ?>" class="btn btn-default me-1">
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
                                        <label class="col-lg-4 col-form-label" for="validationCustom08">Нэр
                                        </label>
                                        <div class="col-lg-12">
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Нэр оруулах" required>
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
                                        <label class="col-lg-4 col-form-label" for="validationCustom06">Дараалал
                                        </label>
                                        <div class="col-lg-12">
                                            <input type="text" id="display_order" name="display_order" class="form-control" value="0" placeholder="Дараалал оруулах">
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