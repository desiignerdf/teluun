<script type="text/javascript">
    window.onload = function() {
        selectType();
    }
</script>
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles form-head d-flex flex-wrap justify-content-between align-items-center mb-4">
            <h2 class="text-black font-w500 mb-0 me-auto mb-2 pe-3">Тэмцээний оноолт нэмэх</h2>
            <a href="<?= base_url('admin/competition') ?>" class="btn btn-default me-1">
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
                                        <label class="col-lg-4 col-form-label" for="validationCustom05">Тэмцээн
                                        </label>
                                        <div class="col-lg-12">
                                            <select class="default-select wide form-control" id="competition_category_id" name="competition_category_id" required>
                                                <option value="">Тэмцээн сонгох</option>
                                                <?php foreach ($competition_category as $item) {
                                                ?>
                                                    <option value="<?= $item->id ?>"><?= $item->name ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom05">Эзэн баг
                                        </label>
                                        <div class="col-lg-12">
                                            <select class="default-select wide form-control" id="team_one" name="team_one" required>
                                                <option value="">Эзэн баг сонгох</option>
                                                <?php foreach ($teams as $item) {
                                                ?>
                                                    <option value="<?= $item->id ?>"><?= $item->name ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom05">Зочин баг
                                        </label>
                                        <div class="col-lg-12">
                                            <select class="default-select wide form-control" id="team_two" name="team_two" required>
                                                <option value="">Зочин баг сонгох</option>
                                                <?php foreach ($teams as $item) {
                                                ?>
                                                    <option value="<?= $item->id ?>"><?= $item->name ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom05">Тоглосон эсэх
                                        </label>
                                        <div class="col-lg-12">
                                            <select onchange="selectType();" class="default-select wide form-control" id="play_status" name="play_status">
                                                <option selected value="0">Тоглоогүй</option>
                                                <option value="1">Тоглосон</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div id="play_status_row">
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom08">Эзэн багын оноо
                                            </label>
                                            <div class="col-lg-12">
                                                <input type="text" id="team_one_point" name="team_one_point" class="form-control" placeholder="Эзэн багын оноо оруулах">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom08">Зочин багын оноо
                                            </label>
                                            <div class="col-lg-12">
                                                <input type="text" id="team_two_point" name="team_two_point" class="form-control" placeholder="Зочин багын оноо оруулах">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom05">Хожсон баг
                                            </label>
                                            <div class="col-lg-12">
                                                <select class="default-select wide form-control" id="win_status" name="win_status">
                                                    <option value="">Хожсон баг сонгох</option>
                                                    <option value="1">Эзэн баг хожсон</option>
                                                    <option value="2">Зочин баг хожсон</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom08">Тоглох өдөр
                                        </label>
                                        <div class="col-lg-12">
                                            <input type="datetime-local" id="play_date" name="play_date" class="form-control">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom08">Тайлбар
                                        </label>
                                        <div class="col-lg-12">
                                            <textarea style="height: 150px;" id="description" name="description" class="form-control" placeholder="Тайлбар оруулах"></textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom08">Хаяг
                                        </label>
                                        <div class="col-lg-12">
                                            <input type="text" id="address" name="address" class="form-control" placeholder="Хаяг оруулах" required>
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

<script type="text/javascript">
    function selectType() {
        if (document.getElementById('play_status').value == '0') {
            document.getElementById('play_status_row').style.display = 'none';
        } else if (document.getElementById('play_status').value == '1') {
            document.getElementById('play_status_row').style.display = 'block';
        }
    }
</script>