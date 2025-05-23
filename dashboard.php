<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>M Kahfi - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="asset/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="asset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
    $(document).ready(function(){ //ready function

        //menu mahasiswa
        $("#m_mahasiswa").click(function(){
        loadMhs();        
        });

        $("#m_dosen").click(function(){
        loadDosen();        
        });

        $("#m_matkul").click(function(){
        loadMatkul();        
        });

        $("#jadwal").click(function(){
        loadJadwal();        
        });
        
        $("#contentData").on("click", "#addButton", function() {
                $.ajax({
                    url: 'form-add.php',
                    type: 'get',
                    success: function(data) {
                        $('#contentData').html(data);
                    }
                });
            });

        //simpan data mahasiswa
        $("#contentData").on("submit", "#formMhs", function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'mahasiswa/mahasiswa.php?action=save',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        alert(data);
                        loadMhs(); 
                    }
                });
            });

                   //simpan data dosen
        $("#contentData").on("submit", "#formDosen", function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'dosen/dosen.php?action=save',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        alert(data);
                        loadDosen(); 
                    }
                });
            });

            //simpan data matkul
        $("#contentData").on("submit", "#formMatkul", function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'matkul/matkul.php?action=save',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        alert(data);
                        loadMatkul(); 
                    }
                });
            });

        //simpan data formJadwal
        $("#contentData").on("submit", "#formJadwal", function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'jadwal/jadwal.php?action=save',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        alert(data);
                        loadJadwal(); 
                    }
                });
            });

         //hapus data mahasiswa berdasarkan nim
         $("#contentData").on("click", "#deleteMhs", function() {
                var nim = $(this).attr("value");
                $.ajax({
                    url: 'mahasiswa/mahasiswa.php?action=delete',
                    type: 'post',
                    data: {
                        nim: nim
                    },
                    success: function(data) {
                        alert(data);
                        loadMhs();
                    }
                });
            });

            //hapus data dosen berdasarkan nim
         $("#contentData").on("click", "#deleteDosen", function() {
                var id_dosen = $(this).attr("value");
                $.ajax({
                    url: 'dosen/dosen.php?action=delete',
                    type: 'post',
                    data: {
                        id_dosen: id_dosen
                    },
                    success: function(data) {
                        alert(data);
                        loadDosen();
                    }
                });
            });

            //hapus data matkul berdasarkan nim
         $("#contentData").on("click", "#deleteMatkul", function() {
                var id_matkul = $(this).attr("value");
                $.ajax({
                    url: 'matkul/matkul.php?action=delete',
                    type: 'post',
                    data: {
                        id_matkul: id_matkul
                    },
                    success: function(data) {
                        alert(data);
                        loadMatkul();
                    }
                });
            });

            $("#contentData").on("click", "#deleteJadwal", function() {
                var id = $(this).attr("value");
                $.ajax({
                    url: 'jadwal/jadwal.php?action=delete',
                    type: 'post',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        alert(data);
                        loadJadwal();
                    }
                });
            });

            //Load form edit dengan parameter IdMhsw
            $("#contentData").on("click", "#editMhs", function() {
                var nim = $(this).attr("value");
                $.ajax({
                    url: 'mahasiswa/edit.php',
                    type: 'get',
                    data: {
                        nim: nim
                    },
                    success: function(data) {
                        $('#contentData').html(data);
                    }
                });
            });

            //Load form edit dengan parameter IdMhsw
            $("#contentData").on("click", "#editDosen", function() {
                var id_dosen = $(this).attr("value");
                $.ajax({
                    url: 'dosen/edit.php',
                    type: 'get',
                    data: {
                        id_dosen: id_dosen
                    },
                    success: function(data) {
                        $('#contentData').html(data);
                    }
                });
            });

            //Load form edit dengan parameter matkul
            $("#contentData").on("click", "#editMatkul", function() {
                var id_matkul = $(this).attr("value");
                $.ajax({
                    url: 'matkul/edit.php',
                    type: 'get',
                    data: {
                        id_matkul: id_matkul
                    },
                    success: function(data) {
                        $('#contentData').html(data);
                    }
                });
            });

            //Load form edit dengan parameter jadwal
            $("#contentData").on("click", ".editJadwal", function() {
    var id = $(this).attr("value");
    console.log("Edit button clicked with ID:", id); // Memastikan tombol diklik dan ID diambil
    $.ajax({
        url: 'jadwal/edit.php',
        type: 'get',
        data: { id: id },
        success: function(data) {
            console.log("Data received:", data); // Memeriksa data yang diterima
            $('#contentData').html(data);
        }
    });
});


            //edit data mahasiswa
            $("#contentData").on("submit", "#formEditMhs", function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'mahasiswa/mahasiswa.php?action=edit',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {  
                        alert(data);
                        loadMhs();
                    }
                });
            });

            //edit data dosen
            $("#contentData").on("submit", "#formEditDosen", function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'dosen/dosen.php?action=edit',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {  
                        alert(data);
                        loadDosen();
                    }
                });
            });

            //edit data Matkul
            $("#contentData").on("submit", "#formEditMatkul", function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'matkul/matkul.php?action=edit',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {  
                        alert(data);
                        loadMatkul();
                    }
                });
            });

            //edit data Jadwal
            $("#contentData").on("submit", "#formEditJadwal", function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'jadwal/jadwal.php?action=edit',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {  
                        alert(data);
                        loadJadwal();
                    }
                });
            });

        

    });//end ready function

    function loadMhs() {
            $.ajax({
                url: 'mahasiswa/list.php',
                type: 'get',
                success: function(data) {
                    $('#contentData').html(data);
                }
            });
        }

        function loadDosen() {
            $.ajax({
                url: 'dosen/list.php',
                type: 'get',
                success: function(data) {
                    $('#contentData').html(data);
                }
            });
        }

        function loadMatkul() {
            $.ajax({
                url: 'matkul/list.php',
                type: 'get',
                success: function(data) {
                    $('#contentData').html(data);
                }
            });
        }

        function loadJadwal() {
            $.ajax({
                url: 'jadwal/list.php',
                type: 'get',
                success: function(data) {
                    $('#contentData').html(data);
                }
            });
        }

      
</script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">M Kahfi <sup>©</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Master</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Master Data</h6>
                        <a class="collapse-item" id="m_mahasiswa">Mahasiwa</a>
                        <a class="collapse-item" id="m_dosen">Dosen</a>
                        <a class="collapse-item" id="m_matkul">Matkul</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Transaksi</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Transaksi:</h6>
                        <a class="collapse-item" id="jadwal">Jadwal</a>
                        <a class="collapse-item" id="krs">KRS</a>
                    </div>
                </div>
            </li>

           
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Muhammad Kahfi</span>
                                <img class="img-profile rounded-circle"
                                    src="asset/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div id="contentData">
                <div class="container-fluid">
        <!-- Page Heading -->
            <div >
            <h1 class="h3 mb-4 text-gray-800">Welcome </h1>
            </div>
        </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="asset/js/sb-admin-2.min.js"></script>

    

   

</body>

</html>