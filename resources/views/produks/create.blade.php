<<<<<<< HEAD
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Produk</h3>
                    </div>
                    <div class="card-body">
                        <!-- MENAMPILKAN ERROR APABILA TERDAPAT FLASH MESSAGE ERROR -->
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ url('/produks') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Kode</label>
                                <input type="text" name="kode" class="form-control" placeholder="Masukkan kode produk">
                            </div> 
                            <div class="form-group">
                                <label for="">Nama Produk</label>
                                <input type="text" name="name" class="form-control" placeholder="Masukkan nama produk">
                            </div> 
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select name="id_kategori" id="id_kategori" required>
                                    <option value="">Pilih</option>
                                    @foreach ($kategoris as $row)
                                        <option value="{{ $row->id }}">{{ ucfirst($row->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea type="text" name="description" cols="5" rows="5" class="form-control">
                                </textarea>
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
=======
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Produk</h3>
                    </div>
                    <div class="card-body">
                        <!-- MENAMPILKAN ERROR APABILA TERDAPAT FLASH MESSAGE ERROR -->
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ url('/produks') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Kode</label>
                                <input type="text" name="kode" class="form-control" placeholder="Masukkan kode produk">
                            </div> 
                            <div class="form-group">
                                <label for="">Nama Produk</label>
                                <input type="text" name="name" class="form-control" placeholder="Masukkan nama produk">
                            </div> 
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select name="id_kategori" id="id_kategori" required>
                                    <option value="">Pilih</option>
                                    @foreach ($kategoris as $row)
                                        <option value="{{ $row->id }}">{{ ucfirst($row->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea type="text" name="description" cols="5" rows="5" class="form-control">
                                </textarea>
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
>>>>>>> 6228926dca63b8959f2f99be1d1147d323b5ec96
@endsection