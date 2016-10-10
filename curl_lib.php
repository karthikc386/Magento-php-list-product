<?php
class Curl
{

    /**
    * Function name : Get Token
    *
    * Returns token for future access of other API's
    *
    * @param  (String) (request_url)
    * @param  (array)  (login_data)
    * @return (String) (Token)
    */

    public function getToken($request_url, $login_data)
    {

        $adminUrl    = $request_url.'integration/admin/token';
        $ch          = curl_init();
        $data        = $login_data; array("username" => "karthik", "password" => "ka02et386");                                                                    
        $data_string = json_encode($data);                       
        $ch          = curl_init($adminUrl); 

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
        );       

        $token = curl_exec($ch);
        $token =  json_decode($token);   

        
        return $token;
    }

    /**
    * Function name : getProduct
    *
    * Returns List of Products or One Product
    *
    * @param  (String) (request_url)
    * @param  (String) (token)
    * @param  (String) (product_sku) 
    * @return (Object) (result)
    */

    public function getProduct($request_url, $token, $product_sku = '', $pageSize = 20)
    {
        $headers = array("Authorization: Bearer $token"); 


        //check if Product SKU exists
        if($product_sku == '')
        {
            $requestUrl = $request_url.'products?searchCriteria[pageSize]='.$pageSize;
        }
        else
        {
            $requestUrl = $request_url.'products'.$product_sku;
        }

        $ch = curl_init();
        $ch = curl_init($requestUrl); 

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   

        $result = curl_exec($ch);

        return json_decode($result);       
    }
}
?>