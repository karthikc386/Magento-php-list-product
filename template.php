<?php 

/**
    * Function name : generate_template
    *
    * Generate Bootstrap table template
    * 
    * @param  (Object) (product_data) 
    * @return (String) (result)
    */

function generate_template($product_data)
{

    $template = '';
    $template .= '<h3 class="text-center">Product Details</h3>
    <table class="table table-bordered"><thead><tr><th>SKU</th>
    <th>NAME</th><th>PRICE</th><th>STATUS</th><th>CREATED AT</th>
    </tr></thead><tbody>';

    foreach ($product_data as $prod_key => $prod_value) 
    {
        $template .= '<tr>';
        $template .= '<td>'.$prod_value->sku.'</td>';
        $template .= '<td>'.$prod_value->name.'</td>';
        $template .= '<td>'.$prod_value->price.'</td>';
        $template .= '<td>'.$prod_value->status.'</td>';
        $template .= '<td>'.$prod_value->created_at.'</td>';
        $template .= '<tr>';
    }            
   
    $template .='</tbody></table>';

    return $template;                        

}

?>
