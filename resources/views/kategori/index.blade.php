@extends('admin')

@section('content')
<section class="content">
      <div class="row">
        <div class="col-xs-8">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Menu Category</h3>
            </div>
            <div class="col-md-6">
                <a href="{{ url('/kategori/new') }}" class="btn btn-primary btn-sm float-right">Add Data</a>
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
                  <th>NO</th>
                  <th>Category</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @php ($no =1)
                    @forelse($kategoris as $kategori)   
                    <tr>
                      <td>{{ $no++}}</td>
                        <td>{{ $kategori->name }}</td>
                        <td>
                        <form action="{{ url('/kategori/' . $kategori->id) }}" method="POST">
                        @csrf
                            <input type="hidden" name="_method" value="DELETE" class="form-control">
                            <a href="{{ url('/kategori/' . $kategori->id) }}" class="btn btn-warning btn-sm">Update</a>
                            <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                     @empty
                    <tr>
                        <td class="text-center" colspan="6">Tidak ada data</td>
                    </tr>
                    @endforelse
               
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




