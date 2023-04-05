<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Нэвтрэх</title>
    <link rel="icon" type="image/png" sizes="16x16" href="">
    <link href="<?= base_url("assets/admin/css/style.css") ?>" rel="stylesheet">
	
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4 text-white">Нэвтрэх</h4>
                                    <?php if (validation_errors()) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= validation_errors() ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (isset($error)) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $error ?>
                                        </div>
                                    <?php endif; ?>
                                    <?= form_open() ?>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Хэрэглэгчийн нэр</strong></label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Хэрэглэгчийн нэр">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Нүүц үг">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Нэвтрэх</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url("assets/admin/") ?>vendor/global/global.min.js"></script>
	<script src="<?= base_url("assets/admin/") ?>vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?= base_url("assets/admin/") ?>js/custom.min.js"></script>
    <script src="<?= base_url("assets/admin/") ?>js/deznav-init.js"></script>

</body>


</html>