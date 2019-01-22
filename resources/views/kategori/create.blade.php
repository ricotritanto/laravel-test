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
            <form class="form-horizontal" action="{{ url('/kategori') }}" method="post">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Category</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" placeholder="Enter category...">
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

