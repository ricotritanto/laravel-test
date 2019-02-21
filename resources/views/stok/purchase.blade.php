@extends('admin')

@section('content')
<section class="content-header">
</section>
<section class="content">
      <div class="row">
        <div class="col-xs-10">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">report Purchase - IN</h3>
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
                    <th>Purchase</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                    @php ($no =1)
                    @forelse($stok as $abc)     
                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ $abc->produks->kode }}</td>                                  
                        <td>{{ $abc->produks->kategoris->name }}</td> 
                        <td>{{ $abc->produks->name }}</td>
                        <td>{{ $abc->qty}}</td>       
                        <td>{{ $abc->create_at}}</td> 
                         
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

<!--  -->