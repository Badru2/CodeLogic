<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('template/template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('template/template/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('components.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


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
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">

                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card border-0 shadow-sm rounded">
                                        <div class="card-body">
                                            <a href="{{ route('laravel.create') }}"
                                                class="btn btn-md btn-success mb-3">TAMBAH POST</a>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <th scope="col">GAMBAR</th>
                                                    <th scope="col">JUDUL</th>
                                                    <th scope="col">DESKRIPSI</th>
                                                    <th scope="col">CONTENT</th>
                                                    <th scope="col">AKSI</th>
                                                </thead>
                                                <tbody>
                                                    @forelse ($laravels as $data)
                                                        <tr>
                                                            <td class="text-center">
                                                                <img src="{{ asset('/storage/laravel/' . $data->image) }}"
                                                                    alt="" class="rounded" style="width: 150px">
                                                            </td>
                                                            <td>{{ $data->title }}</td>
                                                            <td>{{ $data->deskripsi }}</td>
                                                            <td>{!! Str::limit($data->content, 50) !!}</td>
                                                            <td class="text-center">
                                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                                    action="{{ route('laravel.destroy', $data->id) }}"
                                                                    method="POST">
                                                                    <a href="{{ route('laravel.show', $data->id) }}"
                                                                        class="btn btn-sm btn-dark">SHOW</a>
                                                                    <a href="{{ route('laravel.edit', $data->id) }}"
                                                                        class="btn btn-sm btn-primary">EDIT</a>
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-danger">HAPUS</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <div class="alert alert-danger">
                                                            Data Post belum Tersedia.
                                                        </div>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                            {{ $laravels->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- <script>
                            //message with toastr
                            @if (session()->has('success'))

                                toastr.success('{{ session('success') }}', 'BERHASIL!');
                            @elseif (session()->has('error'))

                                toastr.error('{{ session('error') }}', 'GAGAL!');
                            @endif
                        </script> -->

                    </div>
                    <!-- End of Content Wrapper -->

                </div>
                <!-- End of Page Wrapper -->

                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>


                <!-- Bootstrap core JavaScript-->
                <script src="{{ asset('template/template/vendor/jquery/jquery.min.js') }}"></script>
                <script src="{{ asset('template/template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

                <!-- Core plugin JavaScript-->
                <script src="{{ asset('template/template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

                <!-- Custom scripts for all pages-->
                <script src="{{ asset('template/template/js/sb-admin-2.min.js') }}"></script>

                <!-- Page level plugins -->
                <script src="{{ asset('template/template/vendor/chart.js/Chart.min.js') }}"></script>

                <!-- Page level custom scripts -->
                <script src="{{ asset('template/template/js/demo/chart-area-demo.js') }}"></script>
                <script src="{{ asset('template/template/js/demo/chart-pie-demo.js') }}"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</body>

</html>
