<?php  
  
    function my_sort($arrays,$sort_key,$sort_order=SORT_ASC,$sort_type=SORT_NUMERIC ){   
        if(is_array($arrays)){   
            foreach ($arrays as $array){   
                if(is_array($array)){   
                    $key_arrays[] = $array[$sort_key];   
                }else{   
                    return false;   
                }   
            }   
        }else{   
            return false;   
        }
        array_multisort($key_arrays,$sort_order,$sort_type,$arrays);   
        return $arrays;   
    }  
  
    $person =  array(  
                    array('name'=>'fj','id'=>1,'weight'=>100,'height'=>180),  
                    array('name'=>'tom','id'=>2,'weight'=>53,'height'=>150),  
                    array('name'=>'jerry','id'=>3,'weight'=>120,'height'=>156),  
                    array('name'=>'bill','id'=>4,'weight'=>110,'height'=>190),  
                    array('name'=>'linken','id'=>5,'weight'=>80,'height'=>200),  
                    array('name'=>'madana','id'=>6,'weight'=>95,'height'=>110),  
                    array('name'=>'jordan','id'=>7,'weight'=>70,'height'=>170)  
                );
    $arr = array(
        array('dog'),
        array('miser'),
        array('lucy'),
        array('hello'),
        array(10),
    );              
    
    array_multisort($arr,SORT_NUMERIC);
    // var_dump($person); 
   
    $person = my_sort($person,'name',SORT_ASC,SORT_STRING);  
  
    // var_dump($person);  
      
    $person = my_sort($person,'weight');  
  
    // var_dump($person); 

    
    $grade = array("score" => array(70, 67, 70.0, 60, "70"),
               "name" => array("Zhang San", "Li Si", "Wang Wu",
                               "Zhao Liu", "Liu Qi"));
    array_multisort($grade["score"], SORT_NUMERIC, SORT_DESC,
                    // 将分数作为数值，由高到低排序
                    $grade["name"], SORT_STRING, SORT_ASC);
                    // 将名字作为字符串，由小到大排序
    var_dump($grade);
?>  