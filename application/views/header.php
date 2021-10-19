<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <script src="<?php echo base_url('assets/js/jquery_3.6.0.min.js')?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> <!-- popper js -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> <!-- bootstrap js -->
    <script type="text/javascript">
        (function() {
            var css = document.createElement('link');
            css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css';
            css.rel = 'stylesheet';
            css.type = 'text/css';
            document.getElementsByTagName('head')[0].appendChild(css);
        })();
    </script> <!-- načte font awesome před obsahem stránky => není vidět že se načítají pomalu -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <!--script src="<?php echo base_url('assets/js/map.js'); ?>" type="text/javascript"></script-->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css"> <!-- datatables.net -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script> <!-- datatables.net -->

</head>

<body>
    <div class="container-fullwidth mb-5">
        <!-- Start fluid container for nav-->
        <div class="sticky-top">
            <!-- Start NAV -->
            <div class="d-flex justify-content-lg-center justify-content-md-center justify-content-sm-between w-100">
                <nav id="main-navbar" class="navbar navbar-full bg-dark navbar-expand-lg w-100">
                    <button class="navbar-toggler navbar-toggler-left pl-0" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="navbar-toggler-icon text-white mb-2"><i class="fas fa-bars fa-2x"></i></span>
                    </button>
                    <div class="navbar-collapse collapse" id="navbar-collapse">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="text-white" href="<?php echo base_url(); ?>"><button type="button" class="btn btn-lg btn-success" style="margin-right: 10px;">Domů</button></a>
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex">
                        <div class="nav-item dropdown">
                            <button class="nav-link text-white dropdown-toggle btn btn-success btn-lg" type="button" style="margin-right: 10px;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Uživatel
                            </button>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php if ($this->session->userdata('logged_in')) { ?>
                                    <!-- pokud je uživatel přihlášený přidají se tlačítka administrátora -->
                                    <a class="dropdown-item" href="<?php echo base_url('auth'); ?>"><button type="button" class="btn btn-lg btn-success" style="margin-right: 10px;">Administrace</button></a>
                                    <a class="dropdown-item" href="<?php echo base_url('auth/create_user'); ?>"><button type="button" class="btn btn-lg btn-success" style="margin-right: 10px;">Vytvořit uživatele</button></a>
                                    <a class="dropdown-item" href="<?php echo base_url('add_school'); ?>"><button type="button" class="btn btn-lg btn-success" style="margin-right: 10px;">Přidat školu</button></a>
                                <?php } else { ?>
                                    <a class="dropdown-item" href="<?php echo base_url('auth/login'); ?>"><button type="button" class="btn btn-lg btn-success" style="margin-right: 10px;">Přihlásit se</button></a>
                                <?php } ?>
                                <?php if ($this->session->userdata('logged_in')) { ?>
                                    <a class="dropdown-item" href="<?php echo base_url('auth/logout'); ?>"><button type="button" class="btn btn-lg btn-success" style="margin-right: 10px;">Odhlásit se</button></a>
                                <?php } else {
                                } ?>
                            </div>
                        </div>
                        <?php if ($this->session->userdata('logged_in')) { ?>
                            <div class="nav-item" style="padding-left: 10px; padding-right: 10px;">
                                <div class="row">
                                    <div class="col text-center">
                                        <b>Přihlášený uživatel:</b>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col text-center">
                                        <?php echo $this->session->userdata('identity'); ?>
                                    </div>
                                </div>
                            </div>
                        <?php } else {
                        } ?>
                    </div>
                </nav>
            </div>
        </div> <!-- End NAV -->
    </div> <!-- end fluid container -->
    <!-- End NAV -->
