@extends('layouts.app')

@section('title', 'Dashboard')


@section('content')
                    {{-- If session is not set --}}

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            {{-- {{ route('login') }} --}}
                        </div>
                    @endif

    
    <!-- Begin Page Content -->
    <div class="container-fluid">
        {{-- <div class="h4 text-primary">Inventory Stats:</div> --}}

        <div class="row" style="justify-content: center; align-items:center">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Medicines </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$medicines}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-capsules fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Medicines Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Prescriptons</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{$prescriptions}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-prescription fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Staff Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Staff
                                </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$staff}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="row" style="justify-content: center; align-items:center">
                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Out of Stock Meds</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$medsEnd}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-boxes fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Expired Meds</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$expiredMeds}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-hourglass-end fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- <hr style="width: 90%; margin:auto;">
    <br> --}}
    {{-- Cards --}}
    <div class="row" style="width: 90%; margin: auto;">
        {{-- <div class="h4 text-primary">Pharmacy options:</div> --}}

        <div class="col-lg-6">

           <!-- Basic Card Example -->
           <div class="card shadow mb-4">
            <div class="card-body" style="display: flex; flex-direction: column; justify-content: center; align-items:center">
                <i class="fa fa-solid fa-file-invoice fa-3x" style="color: rgb(38 101 217)"></i>
                <h5 style="padding: 15px"><a style="text-decoration: none;" href="{{route('saleInvoice.index')}}">Create New Invoice</a></h5>
            </div>
        </div>


           <!-- Basic Card Example -->
           <div class="card shadow mb-4" >
            <div class="card-body" style="display: flex; flex-direction: column; justify-content: center; align-items:center">
                <i class="fa fa-solid fa-cash-register fa-3x" style="color: rgb(38 101 217)"></i>
                <h5 style="padding: 15px"><a style="text-decoration: none;" href="{{route('ReportController.salesIndex')}}">Sales Report</a></h5>
            </div>
        </div>

        </div>

        <div class="col-lg-6">

                   <!-- Basic Card Example -->
                   <div class="card shadow mb-4" >
                    <div class="card-body" style="display: flex; flex-direction: column; justify-content: center; align-items:center">
                        <i class="fa fa-solid fa-capsules fa-3x" style="color: rgb(38 101 217)"></i>
                        <h5 style="padding: 15px"><a style="text-decoration: none;" href="{{route('medicine.create')}}">Add New Medicine</a></h5>
                    </div>
                </div>

           <!-- Basic Card Example -->
           <div class="card shadow mb-4" >
                <div class="card-body" style="display: flex; flex-direction: column; justify-content: center; align-items:center">
                    <i class="fa fa-solid fa-boxes fa-3x" style="color: rgb(38 101 217)"></i>
                    <h5 style="padding: 15px"><a style="text-decoration: none;" href="{{route('ReportController.stockIndex')}}">Stock Report</a></h5>
                </div>
            </div>

        </div>

    </div>

@endsection
