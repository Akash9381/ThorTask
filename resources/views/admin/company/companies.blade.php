@extends('admin.layouts.admin_layouts')
@section('title', 'All Users')

@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>All Companies
                        <small>Welcome to THORTASK</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="zmdi zmdi-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">All Companies</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <div class="body">
                            <div class="table-responsive">
                                <table id="table_id"
                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Total Employee</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($companies as $index => $company)
                                            <tr>
                                                <td>{{ $index + $companies->firstItem() }}</td>
                                                <td>{{ \Carbon\Carbon::parse($company->created_at)->format('d-m-Y') }}</td>
                                                <td>{{ $company['name'] }}</td>
                                                <td>{{ $company['email'] }}</td>
                                                <td>{{ count($company['CompanyEmployee']) }}</td>

                                                <td colspan="2">

                                                    <button class="btn btn-icon btn-neutral btn-icon-mini"><a
                                                            href="{{ url('admin/edit-company/' . $company->id) }}"><i
                                                                class="zmdi zmdi-edit"></i></a></button>
                                                    <button class="btn btn-icon btn-neutral btn-icon-mini"><a
                                                            href="{{ url('admin/company-delete/' . $company['id']) }}"
                                                            onclick="return confirm('Are you sure you want to delete this User?');"><i
                                                                class="zmdi zmdi-delete"></i></a></button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">No Record found</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="d-felx justify-content-center">

                            {{ $companies->links() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
