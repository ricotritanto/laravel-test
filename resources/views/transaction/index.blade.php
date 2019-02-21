@extends('admin')

@section('content')
<section class="content-header">
</section>
<section class="content">
      <div class="row">
        <div class="col-xs-10">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Transaction</h3>
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
                    <th>Masuk</th>
                    <th>Keluar</th>
                </tr>
                </thead>
                <tbody>
                    @php ($no =1)
                    @forelse($transactions as $abc)     
                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ $abc->produks->kode }}</td>                                  
                        <td>{{ $abc->produks->kategoris->name }}</td>                                  
                        <td>{{ $abc->produks->name }}</td>       
                        @forelse ($abc->transaction as $aa)
                          <td align="center">
                            @if($aa->transaction_status->id==1)
                              {{ $abc->qty }}
                            @endif
                          </td>
                            @if($aa->transaction_status->id==2)
                              <td bgcolor="yellow" align="center">
                                {{ $abc->qty }}
                              </td>                              
                            @endif
                        @endforeach
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