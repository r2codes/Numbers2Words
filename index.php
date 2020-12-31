<?php
function NoTowords($num)
{

$ones = array(
0 =>"ZERO",
1 => "ONE",
2 => "TWO",
3 => "THREE",
4 => "FOUR",
5 => "FIVE",
6 => "SIX",
7 => "SEVEN",
8 => "EIGHT",
9 => "NINE",
10 => "TEN",
11 => "ELEVEN",
12 => "TWELVE",
13 => "THIRTEEN",
14 => "FOURTEEN",
15 => "FIFTEEN",
16 => "SIXTEEN",
17 => "SEVENTEEN",
18 => "EIGHTEEN",
19 => "NINETEEN",

);
$tens = array( 
0 => "ZERO",
1 => "TEN",
2 => "TWENTY",
3 => "THIRTY", 
4 => "FORTY", 
5 => "FIFTY", 
6 => "SIXTY", 
7 => "SEVENTY", 
8 => "EIGHTY", 
9 => "NINETY" 
); 
$hundreds = array( 
"HUNDRED", 
"THOUSAND", 
"MILLION", 
"BILLION", 
"TRILLION", 
"QUARDRILLION" 
);
$num = number_format($num,2,".",","); 
$num_arr = array_reverse(explode(",",$num)); 
krsort($num_arr,1); 
$Words = ""; 
foreach($num_arr as $key => $i){
	
while(substr($i,0,1)=="0")
		$i=substr($i,1,5);
if($i < 20){ 
$Words .= $ones[$i];
 }elseif($i < 100){ 
if(substr($i,0,1)!="0") $Words .= $tens[substr($i,0,1)]; 
if(substr($i,1,1)!="0") $Words .= " ".$ones[substr($i,1,1)]; 
}else{ 
if(substr($i,0,1)!="0") $Words .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
if(substr($i,1,1)!="0")$Words .= " ".$tens[substr($i,1,1)]; 
if(substr($i,2,1)!="0")$Words .= " ".$ones[substr($i,2,1)]; 
} 
if($key > 0){ 
$Words .= " ".$hundreds[$key]." "; 
}
} 

return $Words;
}
extract($_POST);

?>
<!DOCTYPE html>
<html>
	<head>
        <title>Conver Number to Words in PHP</title>
     <style>
         .myForm{
             display: grid;
             place-items: center;
             margin-top: 150px;

         }
         .myForm input:nth-child(1){
            border: 2px solid hotpink;
            height: 50px;
            width: 80%;
            text-align: center;
            border-radius: 36px;
            outline: 0;
            font-size: 25px
         }
         #submit {
             border-radius: 7px;
             background-color: green;
             color: #fff;
             font-size: 21px;
             outline: 0;
             border: none; 
             padding: 7px;        
         }
         .output {
            align:center;
            color:blue;
            font-size: 29px;
         }
    </style>
	</head>
	<body>
		<form method="post" class="myForm">

                <input type="text" name="num" value="<?php if(isset($num)){echo $num;}?>" placeholder="Enter The Number"/><br>
				<input type="submit" value="Number to Words Converter" name="convert" id="submit"/>
           
           <?php 
           if(isset($convert))
            {
                 echo "<p class='output'>".NoTowords("$num")."</p>";
            }
           ?>
         
		 </form> 

	</body>
</html>