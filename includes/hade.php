<?php
echo phpversion(). "\n";
function add($a,$b){
    return $a + $b;
}
$funcName = 'add';
echo $funcName(1, 2);

?>
<?php
function pay($qty, $price){
    return $qty * $price;

}

echo pay(2,12);
$had = "hammed Rafiu";
echo $had[4];
?>