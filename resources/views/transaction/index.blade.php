@extends('admin')

@section('content')
<section class="content-header">
  <h1>
    TRANSACTION
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
              <h3 class="box-title">Form Transaction</h3>
            </div>
            <div class="col-md-6">
                <a href="{{ url('/transaction/new') }}" class="btn btn-primary btn-sm float-right">DATA MASUK</a>
            </div>
            <div class="col-md-8">
                <a href="{{ url('/transaction/ext') }}" class="btn btn-primary btn-sm float-right">DATA KELUAR</a>
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
                    <th>Qty</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                </tr>
                </thead>
                <tbody>
                    @php ($no =1)
                    @forelse($transactions as $transaction)     
                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ $transaction->produks->kode }}</td>                                  
                        <td>{{ $transaction->produks->kategoris->name }}</td>                                  
                        <td>{{ $transaction->produks->name }}</td>
                        <td>{{ $transaction->qty }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="6">Tidak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
                <!-- <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot> -->
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
</section>
@endsection

<!--  -->