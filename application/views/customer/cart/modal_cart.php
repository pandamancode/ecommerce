
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title" id="myModalLabel"><i class="fa fa-cart-arrow-down fa-fw"></i> Keranjang Belanja</h4>
</div>

<form method="post" action="<?php echo base_url() ?>Administrator/Matauji/store">
  <div class="modal-body">
  <!--Cek Data-->
        <div class="table-responsive">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th>Product</th>
                    <th style="width:10%">Price</th>
                    <th style="width:22%" class="text-center">Subtotal</th>
                    <th style="width:10%"></th>
                </tr>
            </thead>
            <tbody id="data-result">
                
            </tbody>
            
                
            
        </table>
        </div>
  </div>
  
</form>

<script type="text/javascript">
$(function () {
    load_cart();
});

function load_cart(){
    $.get("<?=base_url()?>Customer/Home/get_data_cart", function( data ) {
        $( "#data-result" ).html( data );
    });
}

$(document).on('keydown', 'body', function(e){
    var charCode = ( e.which ) ? e.which : event.keyCode;
    if(charCode == 13) //ENTER
    {
        load_cart();
        return false;
    }
});

function ubah_qty(id){
    var idc = id;
    var nama_form = '#f_'+id;
    dataString = $('#f_'+id).serialize();
    //alert(dataString);
    $.ajax({
        type:"POST",
        url:"<?php echo base_url(); ?>Customer/Home/update_qty",
        //data:dataString,
        data : "id="+idc + "&"+dataString,
        success:function(x){
            load_cart();
            swal({
                title: "Done",
                text: "Quantity Berhasil Diubah",
                timer: 1500,
                showConfirmButton: false,
                type: x
            });
            return false;
        },
    });
}

function batalkan(id){
    var idp = id;

    $.ajax({
        type:"POST",
        url:"<?php echo base_url(); ?>Customer/Home/batalkan",
        //data:dataString,
        data : "id="+idp,
        success:function(x){
            load_cart();
            swal({
                title: "Done",
                text: "Item Berhasil Dihapus",
                timer: 1500,
                showConfirmButton: false,
                type: x
            });
            return false;
        },
    });
}
</script>