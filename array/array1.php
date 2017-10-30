<?php
error_reporting(E_ALL);
//1.比较简单类的
/*
array_change_key_case:(数组，CASE_LOWER/CASE_UPPER),将数组键转成小写/大写输出
array_chunk:(数组，size[新数组的大小,最后一个数组可能会少],true/false[是否保留原键名])，分割成新的数组块
array_column:(array[必须是多维数组],column_key[要返回哪列的值，可以为null，则返回整个数组],index_key[以哪列作为新建名，可以省略])
array_combine:(keys[键名数组],values[键值数组])
array_count_values:(array),对数组的值进行计数，键名为原来数组的值，键值为统计的个数
array_diff(array1,array2,array3...),返回差集数组，该数组包括了所有在被比较的数组（array1）中，但是不在任何其他参数数组（array2 或 array3 等等）中的键值。
array_diff_assoc:(array1,array2,array3...),用于比较两个（或更多个）数组的键名和键值 ，并返回差集。
array_diff_key:(array1,array2,array3...),用于比较两个（或更多个）数组的键名 ，并返回差集
array_diff_uassoc:(array1,array2,array3..,myfunction[用户自定义的函数]),用于比较两个（或更多个）数组的键名和键值 ，并返回差集
array_diff_ukey:(array1,array2,array3...,myfunction),用于比较两个（或更多个）数组的键名 ，并返回差集
array_fill:(index,number,value),将数组以index的位置开始填充个数为number的value
array_fill_keys:(array,value),返回以array的值为键，value为值的数组
array_filter:(array,callbackfunction),该函数把输入数组中的每个键值传给回调函数。如果回调函数返回 true，则把输入数组中的当前键值返回结果数组中。数组键名保持不变。
array_flip:(array),返回反转键名和值的数组
array_intersect:(array1,array2,array3....),函数用于比较两个（或更多个）数组的键值，只比较键值，并返回交集。
该函数比较两个（或更多个）数组的键值，并返回交集数组，该数组包括了所有在被比较的数组（array1）中，同时也在任何其他参数数组（array2 或 array3 等等）中的键值。
array_intersect_assoc:(array1,array2,array3...),比较多个数组的键名和键值，并返回交集
array_intersect_key:(array1,array2,array3..),比较多个数组的键名，并返回交集
array_intersect_uassoc:(array1,array2,array3...,myfunction),使用用户自定义的函数来返回多个数组中的交集，比较键值和键名
array_intersect_ukey:(array1,array2,array3...,myfunction),只比较键名，使用用户自定义的键名比较函数
array_key_exists(key,array),判断键名是否存在数组中，存在返回true，不存在返回false
array_map:(callbackfunction,arr1,arr2...),将用户自定义函数作用到数组中的每个值上，并返回用户自定义函数作用后的带有新值的数组。
回调函数接受的参数数目应该和传递给 array_map() 函数的数组数目一致
array_merge:(array1,array2,array3...),将多个数组合并成一个数组返回，如果关联数组，则键名重复的，后者会覆盖前者。索引数组则会重新索引。
array_merge_recursive:(array1,array2,array3...),将多个数组合并成一个数组，如果关联数组键名重复，则会将相同键名的值递归成一个数组。
array_pad:(array,size,value),返回指定size大小，包含value的数组，如果size的大小小于数组长度，则返回原数组，如果size为负数，则在开头插入value返回
array_pop:(array),删除数组最后一个元素（出栈）
array_product:(array),返回数组中所有数的乘积（关联数组为0，空数组为1）
array_push:(array,value1,value2...),给数组末尾添加一个或多个元素（入栈），返回操作后数组的长度。
*/
$age=array("Bill"=>"MIKE","STEVE"=>"56","Mark"=>"31");
// print_r(array_chunk($age,2,true)); die;
$newAge = array_change_key_case($age,CASE_UPPER);
// print_r($age) die;
$cars=array("Volvo","BMW","Toyota","Honda","Mercedes","Opel");
// print_r(array_chunk($cars,2,true)); die;

$a = array(
  array(
    'id' => 5698,
    'first_name' => 'Bill',
    'last_name' => 'Gates',
  ),
  array(
    'id' => 4767,
    'first_name' => 'Steve',
    'last_name' => 'Jobs',
  ),
  array(
    'id' => 3809,
    'first_name' => 'Mark',
    'last_name' => 'Zuckerberg',
  ),
  array(
    'id' => 3709,
    'first_name' => 'Mike',
    'last_name' => 'Ironman',
  )
);
$last_names = array_column($a,'last_name','first_name');
// print_r($last_names) die;

$fname=array("Bill","Steve","Mark");
$age1=array("60","56","31");
$c = array_combine($fname,$age1);
// print_r($c); die;

$a1 = array("A","Cat","Dog","A","Dog","a");
// print_r(array_count_values($a1)); die;

$a2=array("a"=>"reed","b"=>"green","c"=>"blue","h"=>"yelloww");
$a3=array("a"=>"red","b"=>"black","g"=>"bluue");
$a4=array("a"=>"red","g"=>"black","h"=>"yellow","f"=>"white");
$result = array_diff($a2,$a3,$a4);
// print_r($result); die;

$a5=array("a"=>"red","b"=>"black","c"=>"blue");
// print_r(array_diff_assoc($a4,$a5)); die;
// print_r(array_diff_key($a4,$a5)); die;

function myfunction($a,$b)
{
	if ($a===$b)
	{
	  return 0;
	}
  	return ($a>$b)?1:-1;
}
$res = myfunction($a4,$a5);
// print_r($res); die;
$result1 = array_diff_uassoc($a4,$a5,"myfunction");
//说实话，这个方法我没弄懂，这个myfunction怎么就给数组排序了
// print_r($result1); die;

// print_r(array_diff_ukey($a4,$a5,"myfunction"));

$b = array_fill(3,3,"blue");
// print_r($b); die;

$keys=array("mike"=>"a","b","c","d");
// print_r(array_fill_keys($keys, "blue")); die;

function test_odd($var)
{
	return($var & 1);
}
$b2=array("a","b",2,3,4,"4");
// print_r(array_filter($b2,"test_odd")); die;

$result2 = array_flip($a5);
// print_r($result2); die;

$result2 = array_intersect($a4, $a5,$a3);
// print_r($result2); die;
// print_r(array_intersect_assoc($a3,$a4)); die;
// print_r(array_intersect_key($a3,$a4)); die;
// print_r(array_intersect_uassoc($a3, $a4,"myfunction")); die;
// print_r(array_intersect_ukey($a3,$a4, "myfunction")); die;

// print_r(array_key_exists(0,$b2)); die;

// print_r(array_keys($b2,'4',false)); die;

function myfunction2($v)
{
  return($v*$v);
}
$b3 = array(1,2,3,4,5);
// print_r(array_map("myfunction2",$b3)); die;
$ar1 = array("d"=>"Dog","c"=>"Cat","Rabbit");
$ar2 = array("Puppy","Kitten","Elephant");
// print_r(array_map(null, $ar1,$ar2)); die;

// print_r(array_merge($ar1,$ar2)); die;
// print_r(array_merge_recursive($ar1,$ar2)); die;
//  先放在这，待会处理 array_multisort(arr)

// print_r(array_pad($ar2, -5, "yell")); die;

// array_pop($ar2);
// print_r($ar2); die;

$ar3 = array(10,5,8);
// echo array_product($ar3); die;

// echo array_push($ar3, 'abc','blue');
// print_r($ar3); die;

function myfunction3($v1,$v2)
{
	var_dump($v1);
	var_dump($v2);
	echo 'here <br/>';
	return $v1 + $v2;
}
// print_r(array_reduce($ar3, "myfunction3",7)); die;

// print_r(array_replace($a3, $a4,$a2)); die;

// print_r(array_reverse($ar3)); die;

// $a=array("a"=>"5","b"=>5,"c"=>"5");
// echo array_search(5,$a);

// print_r(array_splice($ar3, 1,1,'blue'));
// print_r($ar3); die;

// $firstname = "Bill";
// $lastname = "Gates";
// $age = "60";
// $location = 'BeiJing';
// $name = array("firstname", "lastname");
// $value = array("location");
// $result = compact($name, $value, "age");
// print_r($result); die;

// $people = array("Bill", "Steve", "Mark", "David");
// echo current($people) . "<br>"; // 当前元素是 Bill
// echo next($people) . "<br>"; // Bill 的下一个元素是 Steve
// echo current($people) . "<br>"; // 现在当前元素是 Steve
// echo prev($people) . "<br>"; // Steve 的上一个元素是 Bill
// echo end($people) . "<br>"; // 最后一个元素是 David
// echo prev($people) . "<br>"; // David 之前的元素是 Mark
// echo current($people) . "<br>"; // 目前的当前元素是 Mark
// echo reset($people) . "<br>"; // 把内部指针移动到数组的首个元素，即 Bill
// echo next($people) . "<br>"; // Bill 的下一个元素是 Steve
// echo end($people) . "<br>";
// echo next($people);
// var_dump(each($people)); die;
// print_r (each($people)); // 返回当前元素的键名和键值（目前是 Steve），并向前移动内部指针

// $a = "Original";
// $blog = 'Weibo';
// $my_array = array("a" => "Cat", "blog" => "Dog", "col" => "Horse");
// extract($my_array, EXTR_PREFIX_SAME, "dup");
// echo "\$a = $a; \$blog = $blog; \$col = $col; \$dup_a = $dup_a; \$dup_blog = $dup_blog";

// $age=array("Bill"=>"60","Steve"=>"56","mark"=>"31");
// krsort($age);
// print_r($age); die;

// $my_array = array("Dog","Cat","Wind","Horse");
// list($a, $b, $c, $d) = $my_array;
// echo "I have several animals, a $a, a $b and a $c,a $d.";

$temp_files = array("temp15.txt","Temp10.txt",
"temp1.txt","Temp22.txt","temp2.txt","rap25.txt");
natsort($temp_files);
echo "自然排序：";
print_r($temp_files);
echo "<br />";
natcasesort($temp_files);
echo "不区分大小写的自然排序：";
print_r($temp_files);