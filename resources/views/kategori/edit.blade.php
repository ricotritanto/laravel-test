<<<<<<< HEAD
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Produk</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
						
                        <!-- ACTION MENGARAH KE /product/id -->
                        <form action="{{ url('/kategori/' . $kategoris->id) }}" method="post">
                            @csrf
                            <!-- KARENA METHOD YANG AKAN DIGUNAKAN ADALAH PUT -->
                            <!-- MAKA KITA PERLU MENGIRIMKAN PARAMETER DENGAN NAME _method -->
                            <!-- DAN VALUE PUT -->
                            <input type="hidden" name="_method" value="PUT" class="form-control">
                            <div class="form-group">
                                <label for="">Nama Kategori</label>
                                <input type="text" name="name" class="form-control" value="{{ $kategoris->name }}" placeholder="Masukkan nama kategori">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm">Update</button>
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
                        <h3 class="card-title">Edit Data Produk</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
						
                        <!-- ACTION MENGARAH KE /product/id -->
                        <form action="{{ url('/kategori/' . $kategoris->id) }}" method="post">
                            @csrf
                            <!-- KARENA METHOD YANG AKAN DIGUNAKAN ADALAH PUT -->
                            <!-- MAKA KITA PERLU MENGIRIMKAN PARAMETER DENGAN NAME _method -->
                            <!-- DAN VALUE PUT -->
                            <input type="hidden" name="_method" value="PUT" class="form-control">
                            <div class="form-group">
                                <label for="">Nama Kategori</label>
                                <input type="text" name="name" class="form-control" value="{{ $kategoris->name }}" placeholder="Masukkan nama kategori">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
>>>>>>> 64e885030f4366604f26dedba683a190b10c6d40
@endsection