@extends('admin')

@section('content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-10">
                 <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form class="form-horizontal" action="{{ url('/produks/' . $produks->id) }}" method="post">
                @csrf
                 <input type="hidden" name="_method" value="PUT" class="form-control">
              <div class="box-body">
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Code</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="kode" value="{{ $produks->kode }}" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Products</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="{{ $produks->name }}">
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-6">
                        <select name="id_kategori" id="id_kategori" class="form-control" required>
                        <option value="">Pilih</option>
                            @foreach ($kategoris as $produk)
                                    <option value="{{ $produk->id }}" {{ $produk->id == $produks->id_kategori ? 'selected':'' }}>
                                    {{ ucfirst($produk->name) }}
                                    </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-6">
                    <textarea class="form-control" rows="3" name="description">{{ $produks->description }}</textarea>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Update</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
      </div>
  </div>
</section>
@endsection

