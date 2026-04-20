@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid p-4">
    <div class="card shadow-sm">
        <div class="card-header">
            <h4 class="card-title">Daftar Pesanan (Orders)</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>ID Transaksi</th>
                            <th>Pembeli</th>
                            <th>Tanggal</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>#ORD-{{ $item->id }}</td>
                            <td><strong>{{ $item->user->name }}</strong></td>
                            <td>{{ \Carbon\Carbon::parse($item->order_date)->format('d M Y') }}</td>
                            <td>Rp {{ number_format($item->total_price, 0, ',', '.') }}</td>
                            <td>
                                @php
                                    $badgeClass = [
                                        'paid' => 'bg-success',
                                        'unpaid' => 'bg-warning text-dark',
                                        'shipped' => 'bg-info',
                                        'completed' => 'bg-primary',
                                        'cancelled' => 'bg-danger'
                                    ][$item->status] ?? 'bg-secondary';
                                @endphp
                                <span class="badge {{ $badgeClass }}">{{ strtoupper($item->status) }}</span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-warning btn-sm text-white"
                                        onclick="prepareStatusModal('{{ $item->id }}', '{{ $item->status }}')"
                                        data-bs-toggle="modal" data-bs-target="#statusModal">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <form action="{{ route('admin.orders.delete', $item->id) }}" method="POST" onsubmit="return confirm('Hapus data transaksi ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="statusModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form id="statusForm" method="POST">
                @csrf @method('PATCH')
                <div class="modal-header">
                    <h5 class="modal-title">Update Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <label class="form-label">Pilih Status Baru:</label>
                    <select name="status" id="select_status" class="form-select">
                        <option value="unpaid">Unpaid</option>
                        <option value="paid">Paid</option>
                        <option value="shipped">Shipped</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm w-100">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function prepareStatusModal(id, currentStatus) {
        const form = document.getElementById('statusForm');
        form.action = "/admin/orders/status/" + id;
        document.getElementById('select_status').value = currentStatus;
    }
</script>
@endsection
