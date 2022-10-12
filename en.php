<?php
if(10>10):
    echo 'welcome ya 3mnaaa';
else:
    echo 'elsee';
endif;
echo '<br>';
$a=5;
echo "this is a ". ($a > 8 ? "bad" : "good")." language";
echo '<br>';
$countries=["eg","sa","qa","dy"];
$countries=["eg"=>50,"sa"=>40,"qa"=>30,"dy"=>20];
foreach($countries as $country){
    echo $country;
}


echo '<br>';

foreach($countries as $country => $discount){
    echo "country name is $country <br/>";
    echo "discount is $discount <br/>";

}
