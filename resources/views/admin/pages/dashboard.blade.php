@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Dashboard</h3>
                </div>
                <div class="ms-md-auto py-2 py-md-0">
                    <a href="{{ route('admin.profile') }}" class="btn btn-label-info btn-round me-2">Manage Profile</a>
                    <a href="{{ route('admin.profile') }}" class="btn btn-primary btn-round">Add Admin</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                        <i class="fas fa-book"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Total Buku</p>
                                        <h4 class="card-title">{{ number_format($total_books) }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-info bubble-shadow-small">
                                        <i class="fas fa-user-check"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Customer</p>
                                        <h4 class="card-title">{{ number_format($total_customers) }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-success bubble-shadow-small">
                                        <i class="fas fa-wallet"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Pendapatan</p>
                                        <h4 class="card-title">Rp {{ number_format($total_revenue, 0, ',', '.') }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                        <i class="far fa-check-circle"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Transaksi</p>
                                        <h4 class="card-title">{{ number_format($total_transactions) }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-4">
                    <div class="card card-round">
                        <div class="card-body">
                            <div class="card-head-row card-tools-still-right">
                                <div class="card-title">
                                    New Registered Customers
                                </div>
                                <div class="card-tools">
                                    <div class="dropdown">
                                        <button class="btn btn-icon btn-clean me-0" type="button" id="dropdownMenuButton"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else
                                                here</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-list py-4">
                                @forelse ($new_customers as $customer)
                                    <div class="item-list">
                                        <div class="avatar">
                                            <span class="avatar-title rounded-circle border border-white bg-primary">
                                                {{ strtoupper(substr($customer->name, 0, 1)) }}
                                            </span>
                                        </div>

                                        <div class="info-user ms-3">
                                            <div class="username">
                                                {{ $customer->name }}
                                            </div>
                                            <div class="status">
                                                Registered {{ $customer->created_at->format('d M Y') }}
                                            </div>
                                        </div>

                                        <a href="mailto:{{ $customer->email }}" class="btn btn-icon btn-link op-8 me-1">
                                            <i class="far fa-envelope"></i>
                                        </a>
                                    </div>
                                @empty
                                    <div class="text-center text-muted py-4">
                                        Belum ada customer yang register.
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-round">
                        <div class="card-header">
                            <div class="card-head-row card-tools-still-right">
                                <div class="card-title">
                                    Riwayat Transaksi Terakhir
                                </div>
                                <div class="card-tools">
                                    <div class="dropdown">
                                        <button class="btn btn-icon btn-clean me-0" type="button" id="dropdownMenuButton"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Cetak Semua</a>
                                            <a class="dropdown-item" href="#">Ekspor ke Excel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">No. Invoice</th>
                                            <th scope="col" class="text-end">Tanggal & Waktu</th>
                                            <th scope="col" class="text-end">Total Harga</th>
                                            <th scope="col" class="text-end">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($transactions as $trx)
                                            <tr>
                                                <th scope="row">
                                                    <button
                                                        class="btn btn-icon btn-round btn-{{ $trx->status == 'completed' ? 'success' : ($trx->status == 'pending' ? 'warning' : 'danger') }} btn-sm me-2">
                                                        <i
                                                            class="fa {{ $trx->status == 'completed' ? 'fa-check' : ($trx->status == 'pending' ? 'fa-clock' : 'fa-times') }}"></i>
                                                    </button>
                                                    {{ $trx->invoice_number }}
                                                </th>
                                                <td class="text-end">
                                                    {{ $trx->created_at->format('d M Y, H.i') }}
                                                </td>
                                                <td class="text-end">
                                                    Rp {{ number_format($trx->total_price, 0, ',', '.') }}
                                                </td>
                                                <td class="text-end">
                                                    <span
                                                        class="badge badge-{{ $trx->status == 'completed' ? 'success' : ($trx->status == 'pending' ? 'warning' : 'danger') }}">
                                                        {{ ucfirst($trx->status) }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center py-5">
                                                    <span class="text-muted">Belum ada data transaksi yang tercatat.</span>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
