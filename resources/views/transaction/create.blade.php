@extends('admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Transaction</h3>
                </div>
                <div class="card-body">
                    <!-- MENAMPILKAN ERROR APABILA TERDAPAT FLASH MESSAGE ERROR -->
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form id="formcari" action="{{ url('/transaction/cari') }}" method="post">
                        @csrf                       
                        <div class="form-group">
                            <label for="">Code</label>
                            <input type="text" name="kode" id="kode" cols="5" rows="5" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning btn-sm">Search</button>
                        </div>                        
                    </form>
                    
                </div>
            </div>
        </div>
        <div class="col-md-7">      
                <div class="card-body">  
                    <form action="{{ url('/transaction/tambah') }}" method="post">   
                      <input type="hidden" name="status" value="1">              
                      @csrf   
                      <table class="table table-hover">
                        <tbody id="isinetabel2">
                          <tr>
                             <th> Produks</th>
                             <th> Qty</th>
                             <th> Action </th>
                          </tr>              
                        </tbody>
                             <td><button type="submit" class="btn btn-danger btn-sm">Save</button></td>
                      </table>
                    </form>
              </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-5"> 
          <div class="card-body"> 
            <form class="tambah" >
                <table class="table table-hover">
                </thead>
                <tbody id="isinetabel">
                    <!-- <tr>
                      <th> Produks</th>
                      <th> Qty</th>
                    </tr>    -->          
                </tbody>
                      <td><button id="btn1" class="btn btn-info">Add</button></td>
                </table>
            </form> 
          </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<!-- @parent -->
<script type="text/javascript">
    // var nomer=1;
    $(document).ready(function(){
        $('#formcari').submit(function (e) {
            e.preventDefault();
            var data = new FormData($(this)[0]);
            $.ajax({
                url: $('#formcari').attr('action'),
                type: $('#formcari').attr('method'),
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(jancok, textStatus, jqXHR){
                  // jancok=JSON.parse(jancok)
                  // console.log(data);    
                       if (jancok.kode === undefined) {
                        alert('Maaf kode Tidak Ada')
                       }else{


                      $("#isinetabel").empty();
                      $("#isinetabel").append("<tr><td  class='idpro' name='idpro'><label>produk</label><input type='hidden' name='idpro' id='idpro' class='form-control' readonly value='"+jancok.id+"'><input type='text' name='produk' id='name' class='form-control' readonly value='"+jancok.name+"'></td><td><label>Qty </label> <input type='text' class='form-control' name='qty' id='qty'></td></tr>")
                  }
                },error: function (jqXHR, textStatus, errorThrown){
                    console.log("error: "+errorThrown);
                }
            });
        });

   })
</script>

<script type="text/javascript">
   
    $(document).ready(function(){
      $('#btn1').click(function (e) {
        e.preventDefault();
        // var nomer=1;
        var count = 0;
        var idpro = $("#idpro").val();             
        var name = $("#name").val();
        var qty = $("#qty").val();

        count = count + 1;
        output = '<tr class="records" id="row_'+count+'">';
        output += '<td>'+name+' <input type="hidden" name="produk[]" id="produk'+count+'" class="produk" value="'+idpro+'" /></td>';
        output += '<td class="ikibakaltakupdate">'+qty+' <input type="hidden" name="qty[]" id="qty'+count+'" value="'+qty+'" /></td>';
        output += '<td><input type="button" class="sifucker" name="x" value="Delete" onclick="jembut(this)" /></td>';
        output += '<td><input type="button" class="a" name="xy" value="Update" onclick="upd(this)" /></td>';
       
        output += '</tr>';

        $("#isinetabel2").append(output);
    });
     
    
  
    

})
</script>
<script type="text/javascript">
  function jembut(e){
    console.log(e)
    $(e).parent().parent().remove()
    // $('.xy')
      // var el = e.parentNode.parentNode
      // e.parentNode.parentNode.parentNode(el)
    }
</script>

<script type="text/javascript">
     function upd(e) {
       var nama = prompt("Update QTY", "");  
        $(e).parent().parent().find('.ikibakaltakupdate').empty()
       $(e).parent().parent().find('.ikibakaltakupdate').append(nama+' <input type="hidden" name="qty[]" id="qty" value="'+nama+'" />')
      }
</script> 

<script type="text/javascript">
    $(document).ready(function()
  {
    $('#save').submit(function(e)
    {
      e.preventDefault();
      var count_data = 0;
      $('.produk').each(function(){
        count_data = count_data + 1;
      });
      if(count_data > 0)
      {
        var form_data = $(this).serialize();
        $.ajax({          
          url: $('#save').attr('action'),
          type: $('#save').attr('method'),
          data:form_data,
          success:function(data)
          {
           alert(data);
 
          }
        })
      }else
      {
        $('#action_alert').html('<p>Please Add atleast one data</p>');
      }
      
    });

  })

</script>

@endsection

