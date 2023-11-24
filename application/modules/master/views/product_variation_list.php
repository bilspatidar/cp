






<style>
    .table_variation td,.table_variation th{padding:5px;}
</style>
<table class="table table-bordered table-hover table_variation">
    <thead>
        <tr>
            <th>Sr. No.</th>
            <?php $priceFlag =  $this->Common->get_col_by_key('product','product_id',$product_id,'priceFlag'); 
            if($priceFlag==0){ $display =''; } else{  $display = 'none';}
            
            ?>
             <?php 
        $this->db->select('product_attribute.*,attribute.name');
        $this->db->from('product_attribute');
        $this->db->join('attribute','attribute.id=product_attribute.attribute_id');
        $this->db->where('product_attribute.product_id',$product_id);
        $product_attribute = $this->db->get(); 
        if($product_attribute->num_rows()>0){
            $product_attribute_res = $product_attribute->result();
            foreach($product_attribute_res as $pa){
                ?>
               <th><?php echo$pa->name; ?></th> 
                <?php 
            }
            }
            ?>
           <th style="display:<?php echo $display; ?>">MRP</th> 
           <th style="display:<?php echo $display; ?>">Selling Price</th> 
           <th>Qty</th> 
           <th>Option</th>
            
        </tr>
    </thead>
    
    <tbody>
        <?php 
        $vsr = 1;
        $this->db->select('product_variation.*,variation.variation_name');
        $this->db->from('product_variation');
        $this->db->join('variation','variation.id=product_variation.variation_id');
        $this->db->where('product_variation.product_id',$product_id);
        $this->db->group_by('product_variation.common_key');
        $product_variation = $this->db->get(); 
        $totalCount =  $product_variation->num_rows(); 
        if($totalCount>0){
            $product_attribute_res = $product_variation->result();
            foreach($product_attribute_res as $pv){
                $variation_id = $pv->variation_id;
                $attribute_id = $pv->attribute_id;
                ?>
           <tr>
               <td><?php echo$vsr++; ?></td>
               
               
               
             <?php 
        $this->db->select('product_attribute.attribute_id');
        $this->db->from('product_attribute');
        //$this->db->join('attribute','attribute.id=product_attribute.attribute_id');
        $this->db->where('product_attribute.product_id',$product_id);
        $product_attributes = $this->db->get(); 
        if($product_attributes->num_rows()>0){
            $product_attribute_ress = $product_attributes->result();
            foreach($product_attribute_ress as $pas){
                 $attribute_id = $pas->attribute_id;
                 $common_key = $pv->common_key;
                
                $this->db->select('variation_id');
                $this->db->from('product_variation');
                $this->db->where('attribute_id',$attribute_id);
                $this->db->where('common_key',$common_key);
                $variData = $this->db->get();
                if($variData->num_rows()>0){
                    $variationResult = $variData->result();
                    $variation_id = $variationResult[0]->variation_id;
                }
               
        //  $variation_id = $this->db->get_where('product_variation',array('attribute_id'=>$attribute_id,'common_key'=>$common_key))->row()->variation_id; 
        
        $variation_name = $this->Common->get_col_by_key('variation','id',$variation_id,'variation_name');
        
        
                ?>
               <td><span style="padding:2px;"><?php echo $variation_name; ?></span></td> 
                <?php 
                }
            }
           // else{
             //   echo"<td>.</td>";
           // }
            ?>
               
               
               <td style="display:<?php echo $display; ?>"><?php echo $pv->mrp; ?></td>
               <td style="display:<?php echo $display; ?>"><?php echo $pv->selling_price; ?></td>
               <td><?php echo $pv->qty; ?></td>
               <td><?php 
               
            $edit_url = base_url().'master/edit_form/edit_level_two_category/level_two_category/level_two_category_id/'.$pv->common_key;
		    $del_url = base_url().'master/delete_product_variationP/'.$pv->common_key;
		  
		   $getDeleteOption = getDeleteOption();
		 echo  $delete_link = "<a href='javascript:void(0)' onclick='return $getDeleteOption(this.id);' id='$del_url' name='$product_id' class='session_deletes'><i class='ri-delete-bin-line'></i></a>";
    // 	echo $delete_link = "<a href='javascript:void(0)' onclick='return delete_variation(this.id);' id='$del_url'><i class='ri-delete-bin-line'></i></a>";
          echo" ";
        //   echo $edit_link = "<a href='javascript:void(0)' onclick='edit_me_lg(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></i></a>";
         
               
               ?></td>
           </tr>     
                <?php
            }
            }
        
        ?>
    </tbody>

</table>


