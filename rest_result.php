<?php
if($_POST){

$url = "https://api.stackexchange.com/2.2/search/advanced?pagesize=99&&tagged=php&site=stackoverflow";
	
//print_r($feed); exit(); 

$context = stream_context_create(array('https' => array('header'=>'Connection: close\r\n')));
$json_array = file_get_contents($url, false, $context);
$data = gzdecode($json_array);





$json = json_decode($data);

   echo "<textarea rows='10' cols='20' id='text'>".json_encode($json, JSON_PRETTY_PRINT); "</textarea>"; exit();



} else{

	if($_GET){
		
$page  = $_GET['page'];
$rpp   = $_GET['rpp'];

// check rpp if it is empty make default value result to 99
if($rpp ==''){$rpp = 99;}

$sort  = $_GET['sort'];
$score = $_GET['score'];

if($score != ''){ $filterByCondition = '&min='.$score.'&sort=votes';} else{$filterByCondition ='&sort='.$sort;}

$urlFilter = "https://api.stackexchange.com/2.2/search/advanced?page=".$page."&pagesize=".$rpp.$filterByCondition."&tagged=php&site=stackoverflow";

$context = stream_context_create(array('https' => array('header'=>'Connection: close\r\n')));
$json_array = file_get_contents($urlFilter, false, $context);
$data = gzdecode($json_array);





$json = json_decode($data);
?>
<style>
    textarea {
                overflow-y: scroll;
                height: 600px;
                resize: none; /* Remove this if you want the user to resize the textarea */
                width:800px;
            }
</style>
<?php 
echo "<textarea rows='10' cols='20' id='text'>".json_encode($json, JSON_PRETTY_PRINT); "</textarea>"; exit();



//$url = "https://api.stackexchange.com/2.2/questions?order=desc&sort=activity&site=stackoverflow&key=LWZQv)aSj5D5e7qy0mYwfA((&access_token=MLTC733KBGFsos4Kal1fTg))&filter=withbody";
//https://api.stackexchange.com/2.2/questions?order=desc&sort=activity&site=stackoverflow&key=LWZQv)aSj5D5e7qy0mYwfA((&access_token=MLTC733KBGFsos4Kal1fTg))&filter=withbody
//$resut = file_get_contents($url);
//$feed = gzinflate($resut);

//$feed = json_decode($resut,true);
}
}
?>