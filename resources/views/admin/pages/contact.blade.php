@extends('admin.layouts.master')

@section('content')
<div class="container-fluid p-4">
    <div class="card shadow-sm">
        <div class="card-header">
            <h4 class="card-title">Pesan Masuk (Kontak)</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Pengirim</th>
                            <th>Email</th>
                            <th>Pesan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->created_at->format('d M Y') }}</td>
                            <td><strong>{{ $item->name }}</strong></td>
                            <td>{{ $item->email }}</td>
                            <td><small>{{ Str::limit($item->message, 50) }}</small></td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-primary btn-sm text-white btn-view-message"
                                        data-name="{{ $item->name }}"
                                        data-email="{{ $item->email }}"
                                        data-date="{{ $item->created_at->format('d M Y H:i') }}"
                                        data-message="{{ $item->message }}"
                                        data-bs-toggle="modal" data-bs-target="#viewMessageModal">
                                        <i class="fas fa-eye"></i> Lihat
                                    </button>

                                    <button class="btn btn-info btn-sm text-white"
                                        data-id="{{ $item->id }}"
                                        data-name="{{ $item->name }}"
                                        data-message="{{ $item->message }}"
                                        data-bs-toggle="modal" data-bs-target="#replyModal">
                                        <i class="fas fa-reply"></i> Balas
                                    </button>

                                    <form action="{{ route('admin.contact.delete', $item->id) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
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

<div class="modal fade" id="viewMessageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="fas fa-eye"></i> Detail Pesan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold mb-1">Nama Pengirim</label>
                        <div class="form-control bg-light" id="view_sender_name"></div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold mb-1">Email</label>
                        <div class="form-control bg-light" id="view_sender_email"></div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold mb-1">Tanggal</label>
                        <div class="form-control bg-light" id="view_sender_date"></div>
                    </div>
                </div>

                <div class="mb-0">
                    <label class="form-label fw-bold mb-1">Isi Pesan</label>
                    <div class="border rounded bg-light p-3" id="view_sender_message" style="min-height: 150px; white-space: pre-wrap;"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="replyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="replyForm" method="POST">
                @csrf
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title"><i class="fas fa-envelope-open-text"></i> Balas Pesan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 p-3 bg-light border rounded">
                        <h6><strong>Dari:</strong> <span id="sender_name"></span></h6>
                        <p class="mb-0 text-muted italic">"<span id="sender_message"></span>"</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tulis Balasan</label>
                        <textarea class="form-control" name="reply_message" rows="5" placeholder="Ketik balasan Anda di sini..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-info text-white">Kirim Balasan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.btn-view-message').forEach((button) => {
        button.addEventListener('click', function () {
            document.getElementById('view_sender_name').innerText = this.dataset.name;
            document.getElementById('view_sender_email').innerText = this.dataset.email;
            document.getElementById('view_sender_date').innerText = this.dataset.date;
            document.getElementById('view_sender_message').innerText = this.dataset.message;
        });
    });

    document.querySelectorAll('[data-bs-target="#replyModal"]').forEach((button) => {
        button.addEventListener('click', function () {
            prepareReplyModal(this.dataset.id, this.dataset.name, this.dataset.message);
        });
    });

    function prepareReplyModal(id, name, message) {
        const form = document.getElementById('replyForm');
        form.action = "/admin/contact/reply/" + id;

        document.getElementById('sender_name').innerText = name;
        document.getElementById('sender_message').innerText = message;
    }
</script>
@endsection
