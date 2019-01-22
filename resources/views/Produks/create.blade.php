@extends('admin')

@section('content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-10">
                 <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Products</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form class="form-horizontal" action="{{ url('/produks') }}" method="post">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Code</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="kode" placeholder="Enter code ">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Product</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" placeholder="Enter Product">
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-6">
                        <select name="id_kategori" id="id_kategori" class="form-control" required>
                        <option value="">Pilih</option>
                            @foreach ($kategoris as $row)
                        <option value="{{ $row->id }}">{{ ucfirst($row->name) }}</option>
                            @endforeach
                        </select>
                     <p class="text-danger">{{ $errors->first('id_kategori') }}</p>
                    </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-6">
                    <textarea class="form-control" rows="3" name="description" placeholder="description..."></textarea>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
      </div>
  </div>
</section>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
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
                                <select name="id_kategori" id="id_kategori" class="form-control" required>
                                <option value="">Pilih</option>
                                    @foreach ($kategoris as $row)
                                        <option value="{{ $row->id }}">{{ ucfirst($row->name) }}</option>
                                    @endforeach
                                </select>
                                 <p class="text-danger">{{ $errors->first('id_kategori') }}</p>
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
    @endsection