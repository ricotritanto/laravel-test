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
         <!-- table input item akan ditampung disini -->
        <div class="col-md-7">      
          <div class="card-header">
              <h3 class="card-title">Details</h3>
          </div>
                <div class="card-body">  
                    <form action="{{ url('/transaction/tambah') }}" method="post">   
                      <input type="hidden" name="status" value="1">              
                      @csrf   
                      <table class="table table-hover">
                          <tr>
                             <th> Produks</th>
                             <th> Qty</th>
                             <th> Action </th>
                          </tr>  
                        <tbody id="isinetabel2">             
                        
                        </tbody>
                             <td><button type="submit" class="btn btn-danger btn-sm">Save</button></td>
                      </table>
                    </form>
              </div>
        </div>
    </div>
</div>
<!-- table hasil pencarian -->
<div class="container">
    <div class="row">
        <div class="col-md-5"> 
          <div class="card-body"> 
            <form class="tambah" >
                <table class="table table-hover">
                </thead>
                <tbody id="isinetabel">

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
    $(document).ready(function(){ //function search kode item
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
  var tampung = []; //untuk menampung data sementara, jika saat input data dengan kode item yg sama maka otomatis data akan ditambahkan dengan data yg sebelumnya
    $(document).ready(function(){ 
      $('#btn1').click(function (e) {
        e.preventDefault();
        // var count = 0;
        var idpro = $("#idpro").val();             
        var name = $("#name").val();
        var qty = $("#qty").val();
        addToCart(idpro,name,qty); //diarahkan ke function addTocart untuk melakukan pengecekan data
})

  function addToCart(idpro,name,qty) {
        if (qty=="") 
        {
          alert('QTY tidak boleh kosong')
        }
        else
        {
          for (var i in tampung) {
              if(tampung[i].Id == idpro)
              {
                  //jika data available then
                  tampung[i].Qty = parseInt(tampung[i].Qty)+parseInt(qty);
                  showCart(); //panggil fungsi showCart                 
                  return; 
              }          
          }
          var item = { Id: idpro, Nama:name, Qty:qty}; 
          tampung.push(item);
          showCart();
        }
      }  

  function showCart() { //function untuk menampilkan data ke dalam table sementara sebelum di save ke db 
          $("#isinetabel2").empty();
          for (var i in tampung) 
          { 
            var item = tampung[i];
            var row = '<tr><td>'+item.Nama+' <input type="hidden" name="produk[]" id="produk" class="produk" value="'+item.Id+'" /></td><td class="ikibakaltakupdate">'+item.Qty+' <input type="hidden" name="qty[]" id="qtyne" value="'+item.Qty+'" /></td><td><input type="button" class="a" name="xy" value="Update" onclick="upd(this)" /></td><td><input type="button" class="sifucker" name="x" value="Delete" onclick="hapuse(this)" /></td></tr>';      
            $("#isinetabel2").append(row); 
          }
        }     
        })   
</script>


<script type="text/javascript">
  function hapuse(e){
    console.log(e)
    $(e).parent().parent().remove()
    }
</script>

<script type="text/javascript">
     function upd(e) { //function update qty
       var nama = prompt("Update QTY", "");  
        $(e).parent().parent().find('.ikibakaltakupdate').empty()
       $(e).parent().parent().find('.ikibakaltakupdate').append(nama+' <input type="hidden" name="qty[]" id="qty" value="'+nama+'" />')
      }
</script> 

<script type="text/javascript"> //function tambah data (arahkan ke controller)
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

