<?php

function greetion($name,$gender){
    if ($gender=="male"){
        echo "hello MR $name";
    } elseif ($gender=="femal"){
        echo "hello Miss $name";
    }
}
greetion("abdullah saied","male");
echo "<br/>";
function calculate(){
    /*if didn't know the number of argumets */
    print(func_num_args());
    echo "<br/>";
    print(func_get_arg(3));
    echo "<br/>";
    print_r(func_num_args());

}
/*spread syntax*/
function calculate_with_spread_syntax(...$nums){
    /*if didn't know the number of argumets */
    print_r($nums);
}
calculate(10,5,5,9,4);
echo "<br/>";
calculate_with_spread_syntax(10,5,5,9,4);
echo "<br/>";
$the_all_skills=["data analisys","flutter","backend","frontend"];
function get_data($name,$country="private",...$skills){
    echo"hello $name your country is $country <br/>";
    foreach ($skills as $skill){
        echo "--$skill <br/>";
    }
}
get_data("Abdullah saied","Egypt",...$the_all_skills);