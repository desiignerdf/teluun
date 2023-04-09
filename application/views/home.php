<?php if ($headercontent && count($headercontent) > 0) { ?>
    <div class="hero-header">
        <div id="hero-slider" class="hero-slider">
            <?php
            foreach ($headercontent as $item) {
                $CI = &get_instance();
                $image = $CI->getImage($item->file_id); ?>
                <div class="item-slider" style="background:url(<?= $image ?>);">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <div class="info-slider">
                                    <h1><?= $item->title ?></h1>
                                    <p><?= $item->description ?></p>
                                    <a href="#" class="btn-iw outline">Дэлгэрэнгүй <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>
<?php
} ?>
<section class="content-info">
    <div class="container padding-top">
        <div class="row">
            <div class="col-lg-4">
                <div class="recent-results">
                    <div class="titles">
                        <h4>Тэмцээний оноолт</h4>
                    </div>
                    <div class="info-results">
                        <ul>
                            <?php
                            if ($items && count($items) > 0) {
                                foreach ($items as $item) {
                                    $team_one = $this->teams_model->getItemById($item->team_one);
                                    $two_one = $this->teams_model->getItemById($item->team_two);
                            ?>
                                    <li>
                                        <span class="head">
                                            <?= $team_one->name ?> Vs <?= $two_one->name ?> <span class="date"><?= $item->play_date ?></span>
                                        </span>

                                        <div class="goals-result">
                                            <a href="single-team.html">
                                                <img src="img/clubs-logos/por.png" alt="">
                                                <?= $team_one->name ?>
                                            </a>

                                            <?php if ($item->play_status == 1) {
                                            ?>
                                                <span class="goals">
                                                    <b><?= $item->team_one_point ?></b> - <b><?= $item->team_two_point ?></b>
                                                </span>
                                            <?php
                                            } else {
                                            ?>
                                                <span class="goals">
                                                    <b>vs</b>
                                                </span>
                                            <?php
                                            } ?>


                                            <a href="single-team.html">
                                                <img src="img/clubs-logos/esp.png" alt="">
                                                <?= $two_one->name ?>
                                            </a>
                                        </div>
                                    </li>
                            <?php
                                }
                            } ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- content Column Left -->
            <div class="col-lg-6 col-xl-7">
                <!-- Recent Post -->
                <div class="panel-box">

                    <div class="titles">
                        <h4>Мэдээ, мэдээлэл</h4>
                    </div>

                    <?php if ($content && count($content) > 0) { ?>
                        <?php
                        foreach ($content as $item) {
                            $CI = &get_instance();
                            $image = $CI->getImage($item->file_id); ?>
                            <!-- Post Item -->
                            <div class="post-item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="img-hover">
                                            <img src="<?= $image ?>" alt="" class="img-responsive">
                                            <div class="overlay"><a href="#">+</a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h5><a href="#"><?= $item->title ?></a></h5>
                                        <span class="data-info"><?= $item->created_at ?> <i class="fa fa-comments"></i><a href="#">0</a></span>
                                        <p><?= $item->description ?><a href="#">Дэлгэрэнгүй [+]</a></p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Post Item -->
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>