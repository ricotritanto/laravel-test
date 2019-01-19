@extends('admin')

@section('content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
                 <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form class="form-horizontal" action="{{ url('/kategori/' . $kategoris->id) }}" method="post">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Category</label>
                  <input type="hidden" name="_method" value="PUT" class="form-control">
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="{{ $kategoris->name }}">
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


