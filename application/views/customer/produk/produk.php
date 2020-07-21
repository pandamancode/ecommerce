<div class="product-sec1">
    <!-- <h3 class="heading-tittle">Produk</h3> -->
    <?php 
    if($produk->num_rows()>0){
        foreach($produk->result() as $p){ ?>
    <div class="col-md-4 product-men">
        <div class="men-pro-item simpleCart_shelfItem">
            <div class="men-thumb-item">
                <img src="<?=base_url()?>public/produk/<?=$p->foto_produk?>" alt="">
                <div class="men-cart-pro">
                    <div class="inner-men-cart-pro">
                        <a href="<?=base_url()?>" class="link-product-add-cart">Quick View</a>
                    </div>
                </div>
                <!--span class="product-new-top">New</span-->
            </div>
            <div class="item-info-product ">
                <h4>
                    <a href="single.html"><?=$p->nama_produk?></a>
                </h4>
                <div class="info-product-price">
                    <span class="item_price">Rp. <?=format_rp($p->harga_jual)?>,-</span>
                    <!-- <del>$110.00</del> -->
                </div>
                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                    <input type="button" onclick="add_to_cart('<?=$p->kode_produk?>')" name="submit" value="Add to cart" class="button" />
                </div>

            </div>
        </div>
    </div>
    <?php } }else{ echo "<div class='col-md-12 product-men'><div class='alert alert-warning alert-dismissible'>
                	<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                	<h4><i class='icon fa fa-info-circle'></i> Informasi</h4>
               		Data Produk belum tersedia !
            	</div></div>"; }?>
    <div class="clearfix"></div>
</div>

<script>
function add_to_cart(id){
    $.get("<?=base_url()?>Customer/Home/add_to_cart/"+id, function( data ) {
        if(data=='success'){
            var title = data[3];
            var text = data[2];
            swal({
                title: "Done",
                text: "Berhasil Memasukkan ke Keranjang",
                timer: 1500,
                showConfirmButton: false,
                type: "success"
            });
        }else if(data=='error'){
            var title = data[3];
            var text = data[2];
            swal({
                title: "Failed",
                text: "Anda Harus Login",
                timer: 1500,
                showConfirmButton: false,
                type: "error"
            });
        }
    });
}
</script>