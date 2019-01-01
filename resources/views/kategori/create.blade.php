@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Kategori</h3>
                    </div>
                    <div class="card-body">
                        <!-- MENAMPILKAN ERROR APABILA TERDAPAT FLASH MESSAGE ERROR -->
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ url('/kategori') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Kategori</label>
                                <input type="text" name="name" class="form-control" placeholder="Masukkan nama kategori">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger btn-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection