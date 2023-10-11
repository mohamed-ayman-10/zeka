@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body admin-tabs p-0">
                    <div class="d-flex flex-wrap justify-content-xl-between">
                        <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                            <i class="mdi mdi-calendar-heart icon-lg me-3 text-primary"></i>
                            <div class="d-flex flex-column justify-content-around">
                                <small class="mb-1 text-muted">Start date</small>
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                                        <a class="dropdown-item" href="#">12 Aug 2018</a>
                                        <a class="dropdown-item" href="#">22 Sep 2018</a>
                                        <a class="dropdown-item" href="#">21 Oct 2018</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                            <i class="mdi mdi-currency-usd me-3 icon-lg text-danger"></i>
                            <div class="d-flex flex-column justify-content-around">
                                <small class="mb-1 text-muted">Revenue</small>
                                <h5 class="me-2 mb-0">$577545</h5>
                            </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                            <i class="mdi mdi-eye me-3 icon-lg text-success"></i>
                            <div class="d-flex flex-column justify-content-around">
                                <small class="mb-1 text-muted">Total views</small>
                                <h5 class="me-2 mb-0">9833550</h5>
                            </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                            <i class="mdi mdi-download me-3 icon-lg text-warning"></i>
                            <div class="d-flex flex-column justify-content-around">
                                <small class="mb-1 text-muted">Downloads</small>
                                <h5 class="me-2 mb-0">2233783</h5>
                            </div>
                        </div>
                        <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                            <i class="mdi mdi-flag me-3 icon-lg text-danger"></i>
                            <div class="d-flex flex-column justify-content-around">
                                <small class="mb-1 text-muted">Flagged</small>
                                <h5 class="me-2 mb-0">3497843</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
