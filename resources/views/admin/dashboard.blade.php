@extends('admin.layouts.admin_layouts')



<!-- Right Sidebar -->


<!-- Chat-launcher -->

@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <h2>Dashboard
                        <small>Welcome to CLUB JB</small>
                    </h2>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 text-md-right">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <h5 class="mt-0">Open Projects</h5>
                                    <span class="badge badge-danger">Sold 22</span>
                                    <span class="badge badge-success">New 40</span>
                                </div>
                                <div>
                                    <h2 class="mb-0">62</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <h5 class="mt-0">Total enquiry</h5>
                                    <span class="badge badge-success">Active 13</span>
                                    <span class="badge badge-danger">Inactive 7</span>
                                </div>
                                <div>
                                    <h2 class="mb-0">20</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <h5 class="mt-0">Blog Request</h5>
                                    <span class="badge badge-success">Active 45</span>
                                    <span class="badge badge-danger">Inactive 25</span>
                                </div>
                                <div>
                                    <h2 class="mb-0">70</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <h5 class="mt-0">Transactions</h5>

                                    <span class="badge badge-danger">RS. 50K</span>
                                </div>
                                <div>
                                    <h2 class="mb-0">₹3M</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
