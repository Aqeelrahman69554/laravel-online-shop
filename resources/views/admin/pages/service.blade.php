@extends('admin.layouts.master')

@section('content')
    {{-- Ubah menjadi container-fluid dengan sedikit padding di semua sisi --}}
    <div class="container-fluid p-4">
        {{-- Kita hilangkan pembatasan col-md-11 dan biarkan mengisi ruang --}}
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-white border-bottom-0 pt-4">
                        <div class="card-title text-primary font-weight-bold">
                            Data Service
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
