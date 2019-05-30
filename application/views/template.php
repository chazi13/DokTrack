
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon icon -->
    <title>DokTracker | <?= $page_title ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?= base_url('assets/css/colors/blue.css') ?>" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?= base_url('dashboard') ?>">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            
                            <!-- Light Logo icon -->
                            <!-- <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" /> -->
                            <h1 class="text-white">DokTracker</h1>
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <!-- <span>  -->
                         <!-- Light Logo text -->    
                         <!-- <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a> -->
                        
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="fas fa-menu"></i></a> </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="<?= base_url('dashboard/logout') ?>">
                                <!-- <img src="../assets/images/users/1.jpg" alt="user" class="profile-pic m-r-10" /> -->
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> 
                            <a class="waves-effect waves-dark" href="<?= base_url('dashboard') ?>" aria-expanded="false">
                                <i class="mdi mdi-gauge"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <?php if (is_level('Admin')): ?>
                        <li class="<?= @$front_desk_active ?>"> 
                            <a class="waves-effect waves-dark <?= @$front_desk_acive ?>" href="<?= base_url('user/index/' . $this->enc->encode('Front Desk')) ?>" aria-expanded="false">
                                <i class="mdi mdi-account"></i>
                                <span class="hide-menu">Front Desk</span>
                            </a>
                        </li>
                        <li class="<?= @$p2_active ?>"> 
                            <a class="waves-effect waves-dark <?= @$p2_acive ?>" href="<?= base_url('user/index/' . $this->enc->encode('P2')) ?>" aria-expanded="false">
                                <i class="mdi mdi-account-check"></i>
                                <span class="hide-menu">P2</span>
                            </a>
                        </li>
                        <li class="<?= @$pkc_active ?>"> 
                            <a class="waves-effect waves-dark <?= @$pkc_acive ?>" href="<?= base_url('user/index/' . $this->enc->encode('PKC')) ?>" aria-expanded="false">
                                <i class="mdi mdi-account-check"></i>
                                <span class="hide-menu">PKC</span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <li> 
                            <a class="waves-effect waves-dark" href="<?= base_url('dok') ?>" aria-expanded="false">
                                <i class="mdi mdi-file-document"></i>
                                <span class="hide-menu">Dokumen</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-warning m-b-0 m-t-0"><?= $page_title ?></h3>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <?php show_alert() ?>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <?= $content ?>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © <?= date('Y') ?> Develop by Chazi.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url('assets/js/tether.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= base_url('assets/js/jquery.slimscroll.js') ?>"></script>
    <!--Wave Effects -->
    <script src="<?= base_url('assets/js/waves.js') ?>"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url('assets/js/sidebarmenu.js') ?>"></script>
    <!--stickey kit -->
    <script src="<?= base_url('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url('assets/js/custom.min.js') ?>"></script>

    <script>
        $(document).ready(function() {
            $('.detail').click(function (event) {
                let button = $(this);
                let docId = button.data('doc');
                
                $.ajax({
                    url: '<?= base_url('home/dok/?no_agenda=') ?>' + docId,
                    method: 'GET',
                    success: function (res) {
                        $('#detail-dok').html(res);
                    }
                })
            });

            $('.processing, .accept, .abort').click(function (event) {
                let button = $(this);
                let noAgenda = button.data('doc');
                let docId = button.data('docid');
                $('#doc_id').val(docId);

                let formUrl = button.data('url');
                $('#formProcess').attr('action', '<?= base_url('dok/') ?>' + formUrl);
                console.log($('#formProcess').attr('action'));
                
                $.ajax({
                    url: '<?= base_url('home/dok/?no_agenda=') ?>' + noAgenda,
                    method: 'GET',
                    success: function (res) {
                        $('#detail-dok').html(res);
                    }
                });

                if ($(this).hasClass('accept')) {
                    $('#processTitle').text('Setujui Dokumen');
                    $.ajax({
                        url: '<?= base_url('dok/accepting/') ?>' + docId,
                        method: 'GET'
                    })
                } else if ($(this).hasClass('abort')) {
                    $('#processTitle').text('Tolak Dokumen');
                }
            });
        })
    </script>
</body>

</html>
