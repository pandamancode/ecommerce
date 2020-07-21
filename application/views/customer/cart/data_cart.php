<?php if($cart->num_rows()>0){
    foreach($cart->result() as $r){
?>
<tr>
    <td data-th="Product">
        <div class="row">
            <div class="col-sm-2"><img width="40px" src="<?=base_url()?>public/produk/<?=$r->foto_produk?>" alt="..." class="img-responsive"/></div>
            <div class="col-sm-10">
                <h4 class="nomargin"><?=$r->nama_produk?></h4>
            </div>
        </div>
    </td>
    <td data-th="Price">
        Rp. <?=format_rp($r->harga_jual)?>,-
        <input type="number" class="form-control text-center" value="<?=$r->qty?>">
    </td>
    <td data-th="Subtotal" class="text-center">Rp. <?=format_rp($r->harga_jual * $r->qty)?>,-</td>
    <td class="actions" data-th="">
        <a href="" class="btn btn-danger btn-flat btn-sm"><i class="fa fa-trash-o"></i></a>								
    </td>
</tr>

<?php } }else{ echo "<tr><td align='center' colspan='4'>Tidak Ada Data</td></tr>"; } ?>
<tr>
    <td colspan="4"><strong>Total 1.99</strong></td>
</tr>
<tr>
    <td colspan="4"><a href="javascript:;" class="btn btn-success btn-flat">Checkout <i class="fa fa-angle-right"></i></a></td>
</tr>