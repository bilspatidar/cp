


   <?php $range = $this->db->get_where('price_qty_range',array('product_id'=>$product_id))->result(); foreach($range as $range_row){
    $del_qty_url = base_url().'master/delete_price_qty_range/'.$range_row->id;
   ?>
    <tr>
   
            <td class="text-center"><input type="text" class="form-control" name="min_qty[]" value="<?php echo$range_row->min_qty; ?>"></td>
            <td class="text-center"><input type="text" class="form-control" name="max_qty[]" value="<?php echo$range_row->max_qty; ?>"></td>
            <td class="text-center"><input type="text" class="form-control" name="price[]" value="<?php echo$range_row->price; ?>"></td>
            <td class="text-center"><input type="text" class="form-control" name="mrp[]" value="<?php echo$range_row->mrp; ?>"></td>
            <td class="text-center"><a href="javascript:void(0)" onclick="delete_qty_range(this.id)" id="<?php echo $del_qty_url; ?>"><i class="fa fa-trash"></i></a></td>
            
            
            
    </tr>
    <?php } ?>
