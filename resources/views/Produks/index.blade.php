@extends('admin')

@section('content')
<section class="content-header">
  <h1>
   Products
    <!-- <small>advanced tables</small> -->
  </h1>
  <!-- <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Tables</a></li>
    <li class="active">Data tables</li>
  </ol> -->
</section>
<section class="content">
      <div class="row">
        <div class="col-xs-10">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Menu Products</h3>
            </div>
            <div class="col-md-6">
                <a href="{{ url('/produks/new') }}" class="btn btn-primary btn-sm float-right">Add Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 @if (session('success'))
                 <div class="col-md-3">
                    <div class="box box-success">
                        <div class="box-header with-border">
                             {!! session('success') !!}
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                 </div>
                @endif
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Code Products</th>
                    <th>Category</th>
                    <th>Products</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @php ($no =1)
                    @forelse($produks as $produk)    
                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ $produk->kode }}</td>
                        <td>{{ $produk->kategoris->name }}</td>
                        <td>{{ $produk->name }}</td>
                        <td>{{ $produk->description }}</td>
                        <td>
                            <form action="{{ url('/produks/' . $produk->id) }}" method="POST">
                                <!-- @csrf ADALAH DIRECTIVE UNTUK MEN-GENERATE TOKEN CSRF -->
                                @csrf
                                <input type="hidden" name="_method" value="DELETE" class="form-control">
                                <a href="{{ url('/produks/' . $produk->id) }}" class="btn btn-warning btn-sm">Update</a>
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="6">Tidak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
</section>
@endsection



