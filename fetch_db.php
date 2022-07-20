<?php
include("connection.php");
$db=$conn;
// fetch query
$c= "customers";
$f= "transaction";

function fetch_data($table){
    global $db;
    $sql="select * from ".$table;
    // $sql = "select * from customers";
    $result = mysqli_query($db, $sql);
    return $result;
}

function show_data_json($Cdata, $Tdata){    
    
    // Find the number of records returned and put in array
    $num1 = mysqli_num_rows($Cdata);
    $num2 = mysqli_num_rows($Tdata);
    $row_array1 = array();    
    $row_array2 = array();  
    if($num1> 0){
        $i= 0;
        $k= 0;
        while($row = mysqli_fetch_assoc($Cdata)){
            $row_array1[$i] = $row;
            $i++;
        }

        while($row = mysqli_fetch_assoc($Tdata)){
            $row_array2[$k] = $row;
            $k++;
        }
    }
    
    //Converting data to json 
    //CUSTOMER TABLE
    $j= 0;
    while($j<$num1 && $num1>0){
        $empty = 0;
        $new_msg = $row_array1[$j];
        
        if($j==0){
            $first_record = array($new_msg);
        }else{
            array_push($first_record, $new_msg);
        }  
        $j++;
    }
    $customer_records = $first_record;

    //TRANSACTION TABLE 
    $j= 0;
    while($j<$num2 && $num2>0){   
        $new_msg = $row_array2[$j];
        if($j==0){      
            $starter_record = array($new_msg);      
        }
        else{
            array_push($starter_record, $new_msg);
        }         
        $j++;
    }

    if($num2>0){
        $transaction_records = array('transaction'=> $starter_record);
        array_push($customer_records, $transaction_records);
    }
    else{
        $empty_array=array();
        $transaction_records = array('transaction'=> $empty_array);
        array_push($customer_records, $transaction_records);        
    }
    $data_to_save=  $customer_records;
    $encoded_data = json_encode($data_to_save, JSON_PRETTY_PRINT);
    echo $encoded_data;

}

$Cdata= fetch_data("customers");
$Tdata= fetch_data("transaction");
show_data_json($Cdata, $Tdata);


?>