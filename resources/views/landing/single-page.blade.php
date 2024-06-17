@extends('layout.landing')
@section('content')
    <!-- content begin -->
    <div id="content" class="no-padding">
        <!-- section begin -->
        <section id="section-project" class="no-padding-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="project-slider">
                            <div class="item"><img alt="" src="{{ asset('compact') }}/images/projects/slides/project-slider-1.jpg"></div>
                            <div class="item"><img alt="" src="{{ asset('compact') }}/images/projects/slides/project-slider-2.jpg"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="project-info">
                            <h2 class="box-title">Pendaftaran Vaksinasi</h2>
                            <form action="" method="post">
                                <div class="row mb-1">
                                    <div class="col-md-4">
                                        <label>Nama Depan</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm" required name="nama_depan">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-4">
                                        <label>Nama Belakang</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" required name="nama_belakang">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-4">
                                        <label>NIK</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" required name="nik">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-4">
                                        <label>Tempat Lahir</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" required name="tempat_lahir">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-4">
                                        <label>Tanggal Lahir</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="date" class="form-control" required name="tanggal_lahir">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-4">
                                        <label>Nomor Passport</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" required name="passport">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-4">
                                        <label>Berlaku Sampai</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="date" class="form-control" required name="exp_passport">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <table class="table">
                                        <thead>
                                        <th>#</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <input type="checkbox">
                                            </td>
                                            <td>Vaksin Meningitis</td>
                                            <td>305.000</td>
                                            <td>Tersedia</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox">
                                            </td>
                                            <td>Vaksin Influenza</td>
                                            <td>205.000</td>
                                            <td>Tersedia</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <button type="submit" class="btn btn-primary">Booking</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Related Project begin -->
        <section id="section-related-project" class="no-padding-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="latest-projects-2 clearfix">
                            <div class="latest-projects-wrapper">
                                <div class="text-center">
                                    <h2 class="box-title">Products</h2>
                                    <div class="tiny-border"></div>
                                </div>
                                <div id="related-projects" class="latest-projects-items">
                                    @for($i=1; $i<7; $i++)
                                    <div class="item">
                                        <img src="{{ asset('compact') }}/images/projects/small-1.jpg" alt="" class="img-responsive">
                                        <div class="project-details">
                                            <p class="folio-title"><a href="#">Plan For Your Bussiness</a></p>
                                            <div class="folio-buttons">
                                                <a href="#"><i class="fa fa-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Related Project close -->
    </div>
    <!-- content close -->
@endsection
