<!doctype html>
<?php
//ini_set( 'display_errors', 1 );
//ini_set( 'display_startup_errors', 1 );
//error_reporting( E_ALL );
require( 'db.php' );
$con = mysqli_connect( $servername, $username, $password, $database ); // Check connection
if ( $con->connect_error ) {
  die( "Connection failed: " . $con->connect_error );
}
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600&amp;subset=latin-ext" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- JS --> 
<script src="assets/js/vendor/modernizr-2.8.3.min.js"></script> 
<script src="assets/js/vendor/jquery-1.12.0.min.js"></script> 
<script type="text/javascript" src="qr_packed.js"></script>

<script type="text/javascript">
	function openQRCamera(node) {
  var reader = new FileReader();
  reader.onload = function() {
    node.value = "";
    qrcode.callback = function(res) {
      if(res instanceof Error) {
        alert("No QR code found. Please make sure the QR code is within the camera's frame and try again.");
      } else {
      	// change path
		var res2=res.replace("http://road7.site/grroup.php","http://road7.site/group_setting.php?id=");
        // refresh page
		location.replace(res2);
      }
    };
    qrcode.decode(reader.result);
  };
  reader.readAsDataURL(node.files[0]);
}

function showQRIntro() {
  return confirm("請以「拍照」的方式拍下您的QRCode.");

}</script>
<script>
	$(".reward-name").click(function(){
 $(this).toggleClass("minus")  ; 
})</script>
<title>User Character Setting</title>
<style>

.user {
    height: 35%;
    display: block;
    content: "";
	/*background: url("user_display_img/bg_top.png");*/
	background-size: 100% auto;
	max-width: 400px;
}
.content2 {
    height: 55%;
	-webkit-overflow-scrolling: touch;
    overflow-x: scroll;
    white-space: nowrap;
	/*background: url("user_display_img/bg_top.png");*/
	background-size: 100% auto;
	max-width: 400px;
	max-height:600px;
}
.content2::-webkit-scrollbar {
	display: none;
}
.user_bottom {
    height: 10%;
	/*background-image: url('user_display_img/bg_top.png');*/
	background-size: 100% auto;
	max-width: 400px;
}
.user_img {
    height: 100%;
    display: inline-block;
    width: 40%;
	border-left: 1px solid #0752a3;
	border-top: 1px solid #0752a3;
	border-bottom: 1px solid #0752a3;
	background-color: white;
}
.user_img::before {
    display: block;
    content: "";
    height: 0%;/* add blank */
}
.user_top{
	margin-left: 10%;
	margin-right: 10%;
	height: 25%;
	width:80%;
	
}
.user_top::before{
	display: block;
    content: "";
    height: 30%;/* add blank */
}
.collapsible {
  background-color: #0853a4;
  color: white;
  cursor: pointer;
  /*padding: 18px;*/
  width: 80%;
  height: 13%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  margin-left: 10%;
  margin-right: 10%;
  margin-top: 15px;
  display:flex;align-items:center;
  justify-content: flex-start;
  
}

.active, .collapsible:hover {
  background-color: #0853a4;
}

.collapsible:after {
  content: '\002B';
  color: white;
  font-weight: bold;
}

.active:after {
  content: "\2212";
}

.content {
  padding: 0 18px;
  max-height: 0;
  overflow: hidden;
  margin-left: 10%;
  margin-right: 10%;
  transition: max-height 0.2s ease-out;
  background-color: #f1f1f1;
}
.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 15px;
  border-radius: 5px;  
  background: #d3d3d3;
  border: 3px solid #0853a4;
  outline: none;
  /*opacity: 0.7;*/
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  border-radius: 50%; 
  background: #0853a4;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background: #0853a4;
  cursor: pointer;
}
.slidecontainer{
	width: 100%;
	height: 50px;
	margin-top: 25px;
}
.process{
	display: inline-block;
	width:70%;
	margin-left: 5px;
	background-image: linear-gradient(305deg, transparent 10px, #f9da4a 10px);
	height: 90%;
	text-align: center
}
.process:before {
    content: "";
    display: inline-block;
    vertical-align: middle;
    height: 100%;
}
.process2{
  display: inline-block;
  width:0%;
 height: 90%;
 text-align: right;
	color: #f9da4a;
}
.nick{
	margin-left: 2px;
	margin-right: 2px;
    box-shadow: 0px 0px 1px grey;
}
.v_item{
	margin-left:10%;
	margin-right:10%;
	height:85%;
	background-color: white;
	border-left: 1px solid #0752a3;
	border-right: 1px solid #0752a3;
	border-bottom: 1px solid #0752a3;
	-webkit-overflow-scrolling: touch;
    white-space: nowrap;
	::-webkit-scrollbar { 
    	display: none;  /* Chrome Safari */
	}
  	scrollbar-width: none; /* Firefox */
  	-ms-overflow-style: none;  /* IE 10+ */
  	overflow-y:scroll;
  	overflow-x:hidden;
}
.r_item{
	margin-left:10%;
	margin-right:10%;
	height:85%;
	background-color: white;
	border-left: 1px solid #0752a3;
	border-right: 1px solid #0752a3;
	border-bottom: 1px solid #0752a3;
	-webkit-overflow-scrolling: touch;
    white-space: nowrap;
	::-webkit-scrollbar { 
    	display: none;  /* Chrome Safari */
	}
  	scrollbar-width: none; /* Firefox */
  	-ms-overflow-style: none;  /* IE 10+ */
  	overflow-y:scroll;
  	overflow-x:hidden;
}

.reward_list{
	height:50%;text-align: center;margin-left: 5%;margin-right: 5%;margin-bottom: 10%;-webkit-overflow-scrolling: touch;
overflow-x: scroll;
white-space: nowrap;border-left: 1px solid #0752a3;border-right: 1px solid #0752a3;border-bottom: 1px solid #0752a3;
}
.reward_list::-webkit-scrollbar {
	display: none;
}
</style>
</head>
<body>
<?php
    $p_id = $_GET[ 'id' ];
    //echo $p_id;
    $result = mysqli_query( $con, "SELECT * FROM customer WHERE `id`='$p_id'" );
    while ( $row = mysqli_fetch_array( $result ) ) {
      $value = $row[ 'name' ];
      $image = $row[ 'image_location' ];
	  $user_gif = $row['user_character'];
	  $reward_img = $row['reward'];
		$gender = $row['gender'];
      //echo $row['id'];
    }
	$result = mysqli_query( $con, "SELECT * FROM item WHERE `category`=2" );
  $i = 0;
  $price = array();
  $num = array();
  $item = array();
  while ( $row = mysqli_fetch_array( $result ) ) {
    $price[ $i ] = $row[ 'price' ];
    $num[ $i ] = $row[ 'num' ];
    $item[ $i ] = $row[ 'item_name' ];
    //echo $price[$i]."-".$num[$i]."-".$item[$i]."<br>";
    $i++;
  }
    ?>
<form  id="form1"action="php_edit_user.php" method="POST" enctype="multipart/form-data" style="width: 100%;height: 100%;max-width: 400px;position: absolute;left: 0;right: 0;margin-left: auto;margin-right: auto;">
<div class="user">
  <div class="user_top">
	<div style="display: inline-block;width: 50%;height: 70%"><img src="images/icons/icon_information.png" height="75%"></div><div style="display: inline-block;width: 50%;height:70%;text-align: right;padding-right: 0px;mar"><input type="file" id="file" onclick="return showQRIntro();" onchange="openQRCamera(this);" type=file accept="image/*" capture=environment tabindex=-1 style="height: 0;overflow: hidden;width: 0;" />
            <label for="file" style="height:85%">
              <img src="images/icons/button_QRcode.png" height="100%" style="margin-right: 5px">
            </label><label for="user_submit" style="height:85%">
              <a href="shopping.php?id=<?php echo $p_id?>"><img src="icon-2.PNG" height="100%"></a>
            </label></div></div>
  <div style="margin-left: 10%;margin-right: 10%;height: 60%;width:80%;">
    
	
    <div class="user_img">
		<div style="height:80%;text-align: center;justify-content:center;display:flex;align-items:center;" id="user-gif"><input name="userid" type="text" hidden="true" value="<?php echo $p_id?>" style="width: 0;height: 0;opacity: 0" id="id" readonly ><input name="outlook" type="text" hidden="true" value="<?php echo $user_gif?>" style="width: 0;height: 0;opacity: 0" id="outlook" readonly ><input name="reward" type="text" hidden="true" value="<?php echo $reward_img?>" style="width: 0;height: 0;opacity: 0" id="reward" readonly >
			<?php if ($user_gif=="ca_all_bearTW.gif"||$user_gif=="ca_all_bug.gif"||$user_gif=="ca_all_cool.gif"||$user_gif=="ca_all_cow.gif"||$user_gif=="ca_all_cyber.gif"||$user_gif=="ca_all_dico.gif"||$user_gif=="ca_all_jojo.gif"||$user_gif=="ca_all_zombi.gif"){?>
			<img src="images/characters/<?php echo $user_gif?>" style="width:30%;height: auto;position:absolute;z-index: 2;" id="user-gif-file2">
			<img src="images/characters/<?php echo $user_gif?>" style="width:30%;height: auto;position:absolute;z-index: 1;" id="user-gif-file1"><?php ?>
			<?php }else if($user_gif!="ca_back_redbull.gif"){?>
			<img src="images/characters/<?php echo $user_gif?>" style="width:30%;height: auto;position:absolute;z-index: 2;" id="user-gif-file2">
			<img src="images/characters/<?php echo ($gender) ? "ca fix long.gif" : "ca fix.gif";?>" style="width:30%;height: auto;position:absolute;z-index: 1;" id="user-gif-file1">
			<?php }elseif($user_gif=="ca_back_redbull.gif"){?><img src="images/characters/<?php echo ($gender) ? "ca fix long.gif" : "ca fix.gif";?>" style="width:30%;height: auto;position:absolute;z-index: 2;" id="user-gif-file2">
			<img src="images/characters/<?php echo $user_gif?>" style="width:30%;height: auto;position:absolute;z-index: 1;" id="user-gif-file1"><?php;}?>
		</div>
		<div style="height: 20%;text-align: center"><?php echo $value?></div>
    </div><div style="display: inline-block;width: 60%;height: 100%;vertical-align: top;border-right: 1px solid #0752a3;border-top: 1px solid #0752a3;border-bottom: 1px solid #0752a3;background-color: white">
	  <div style="height:30%;text-align: center;margin-left: 5%;margin-right: 5%;margin-top: 10%;border: 1px solid #0752a3;" id="rewards-name" ><img src="images/rewards/<?php echo $reward_img?>" id="user_nick" name="nick" height="auto" width="80%;"></div>
	  <div class="reward_list" id="rewards-name">
	  <div class="nick"><img src="images/rewards/icon_title_1.png"  style="opacity:0.3" name="reward_img" height="30%" width="80%"></div>
	  <div class="nick"><img src="images/rewards/icon_title_2.png" style="opacity:0.3" name="reward_img" height="30%" width="80%"></div>
	  <div class="nick"><img src="images/rewards/icon_title_3.png" style="opacity:0.3" name="reward_img" height="30%" width="80%"></div>
	  <div class="nick"><img src="images/rewards/icon_title_4.png" style="opacity:0.3" name="reward_img" height="30%" width="80%"></div>
	  <div class="nick"><img src="images/rewards/icon_title_5.png"  style="opacity:0.3" name="reward_img" height="30%" width="80%"></div>
	  <div class="nick"><img src="images/rewards/icon_title_6.png" style="opacity:0.3" name="reward_img" height="30%" width="80%"></div>
	  <div class="nick"><img src="images/rewards/icon_title_7.png" style="opacity:0.3" name="reward_img" height="30%" width="80%"></div>
	  <div class="nick"><img src="images/rewards/icon_title_8.png" style="opacity:0.3" name="reward_img" height="30%" width="80%"></div></div>
    </div>
  </div>
  <div style="margin-left: 10%;margin-right: 10%;height: 15%;width:80%;">
	  <div style="display:inline-flex;width:50%;height: 100%;text-align: left;align-items:center"><img src="user_display_img/button_previous page.png" onClick="javascript:location.href='grroup.php?id=<?php echo $p_id?>'" style="height: 80%;box-shadow: 0px 0px 3px grey"></div><div style="display:inline-block;width:50%;height: 100%;text-align: right;vertical-align: top;margin-top: 2px"><img  src="user_display_img/button_check.png" id="edit_outfit" onClick="" style="opacity: 0.3;height: 80%"></div>
	  </div>
</div>
<div class="content2">
<div style="margin-left:10%;margin-right:10%;height:5%;background-color: white;text-align: center;border-left: 1px solid #0752a3;
	border-top: 1px solid #0752a3;
	border-right: 1px solid #0752a3;">填入標題(點選想替換的人物)</div>
<div class="v_item" id="virtual_item"><div style="text-align: center;margin-left: 5%;border-bottom: 1px solid #0853a4;margin-right: 5%;margin-bottom: 5%;">頭飾</div><div style="width: 100%;justify-content:center;display:flex;align-items:center;margin-top:10px;margin-bottom:10px;"><div class="gif_icon" style="text-align:center;width:25%;border: 1px solid #0752a3;margin-right: 5%;display: inline-block"><img src="images/characters/ca_top_afulo.gif" name="outfit"  style="margin-right: 5px;opacity: 0.3;width: 100%"></div><div class="gif_icon" style="text-align:center;width:25%;border: 1px solid #0752a3;margin-right: 5%;display: inline-block"><img src="images/characters/ca_all_nude.gif" name="outfit"  style="margin-right: 5px;opacity: 0.3;width: 100%"></div><div class="gif_icon" style="text-align:center;width:25%;border: 1px solid #0752a3;display: inline-block"><img src="images/characters/ca_back_redbull.gif" name="outfit"  style="margin-right: 5px;opacity: 0.3;width: 100%"></div></div><div style="width: 100%;justify-content:center;display:flex;align-items:center;;margin-bottom:10px;"><div class="gif_icon" style="text-align:center;width:25%;border: 1px solid #0752a3;margin-right: 5%;display: inline-block"><img src="images/characters/ca_face_eye cover.gif" name="outfit"  style="margin-right: 5px;opacity: 0.3;width: 100%"></div><div class="gif_icon" style="text-align:center;width:25%;border: 1px solid #0752a3;margin-right: 5%;display: inline-block"><img src="images/characters/ca_mask_1.gif" name="outfit"  style="margin-right: 5px;opacity: 0.3;width: 100%"></div><div class="gif_icon" style="text-align:center;width:25%;border: 1px solid #0752a3;display: inline-block"><img src="images/characters/ca_mask_cat.gif" name="outfit"  style="margin-right: 5px;opacity: 0.3;width: 100%"></div></div><div style="width: 100%;justify-content:center;display:flex;align-items:center;;margin-bottom:10px;"><div class="gif_icon" style="text-align:center;width:25%;border: 1px solid #0752a3;margin-right: 5%;display: inline-block"><img src="images/characters/ca_top_a re gu.gif" name="outfit"  style="margin-right: 5px;opacity: 0.3;width: 100%"></div><div class="gif_icon" style="text-align:center;width:25%;border: 1px solid #0752a3;margin-right: 5%;display: inline-block"><img src="images/characters/ca_mask_sk.gif" name="outfit"  style="margin-right: 5px;opacity: 0.3;width: 100%"></div><div class="gif_icon" style="text-align:center;width:25%;border: 1px solid #0752a3;display: inline-block"><img src="images/characters/ca_top_AI.gif" name="outfit"  style="margin-right: 5px;opacity: 0.3;width: 100%"></div></div><div style="width: 100%;justify-content:center;display:flex;align-items:center;;margin-bottom:10px;"><div class="gif_icon" style="text-align:center;width:25%;border: 1px solid #0752a3;margin-right: 5%;display: inline-block"><img src="images/characters/ca_top_buger.gif" name="outfit"  style="margin-right: 5px;opacity: 0.3;width: 100%"></div><div class="gif_icon" style="text-align:center;width:25%;border: 1px solid #0752a3;margin-right: 5%;display: inline-block"><img src="images/characters/ca_top_cap.gif" name="outfit"  style="margin-right: 5px;opacity: 0.3;width: 100%"></div><div class="gif_icon" style="text-align:center;width:25%;border: 1px solid #0752a3;display: inline-block"><img src="images/characters/ca_top_hat.gif" name="outfit"  style="margin-right: 5px;opacity: 0.3;width: 100%"></div></div><div style="width: 100%;justify-content:center;display:flex;align-items:center;;margin-bottom:10px;"><div class="gif_icon" style="text-align:center;width:25%;border: 1px solid #0752a3;margin-right: 5%;display: inline-block"><img src="images/characters/ca_top_holy.gif" name="outfit"  style="margin-right: 5px;opacity: 0.3;width: 100%"></div><div class="gif_icon" style="text-align:center;width:25%;border: 1px solid #0752a3;margin-right: 5%;display: inline-block"><img src="images/characters/ca_top_horror.gif" name="outfit"  style="margin-right: 5px;opacity: 0.3;width: 100%"></div><div class="gif_icon" style="text-align:center;width:25%;border: 1px solid #0752a3;display: inline-block"><img src="images/characters/ca_top_king.gif" name="outfit"  style="margin-right: 5px;opacity: 0.3;width: 100%"></div></div><div style="width: 100%;justify-content:center;display:flex;align-items:center;;margin-bottom:10px;"><div class="gif_icon" style="text-align:center;width:25%;border: 1px solid #0752a3;margin-right: 5%;display: inline-block"><img src="images/characters/ca_top_miku.gif" name="outfit"  style="margin-right: 5px;opacity: 0.3;width: 100%"></div><div class="gif_icon" style="text-align:center;width:25%;border: 1px solid #0752a3;margin-right: 5%;display: inline-block"><img src="images/characters/ca_top_onepice.gif" name="outfit"  style="margin-right: 5px;opacity: 0.3;width: 100%"></div><div class="gif_icon" style="text-align:center;width:25%;border: 1px solid #0752a3;display: inline-block"><img src="images/characters/ca_top_shark.gif" name="outfit"  style="margin-right: 5px;opacity: 0.3;width: 100%"></div></div><div style="text-align: center;margin-left: 5%;border-bottom: 1px solid #0853a4;margin-right: 5%;margin-bottom: 5%;">套裝</div><div style="width: 100%;justify-content:center;display:flex;align-items:center;;margin-bottom:10px;"><div class="gif_icon" style="text-align:center;width:25%;border: 1px solid #0752a3;margin-right: 5%;display: inline-block"><img src="images/characters/ca_all_cow.gif" name="outfit"  style="margin-right: 5px;opacity: 0.3;width: 100%"></div><div class="gif_icon" style="text-align:center;width:25%;border: 1px solid #0752a3;margin-right: 5%;display: inline-block"><img src="images/characters/ca_all_cyber.gif" name="outfit"  style="margin-right: 5px;opacity: 0.3;width: 100%"></div><div class="gif_icon" style="text-align:center;width:25%;border: 1px solid #0752a3;display: inline-block"><img src="images/characters/ca_all_dico.gif" name="outfit"  style="margin-right: 5px;opacity: 0.3;width: 100%"></div></div>
	<div style="width: 100%;justify-content:center;display:flex;align-items:center;;margin-bottom:10px;"><div class="gif_icon" style="text-align:center;width:25%;border: 1px solid #0752a3;margin-right: 5%;display: inline-block"><img src="images/characters/ca_all_cool.gif" name="outfit"  style="margin-right: 5px;opacity: 0.3;width: 100%"></div><div class="gif_icon" style="text-align:center;width:25%;border: 1px solid #0752a3;margin-right: 5%;display: inline-block"><img src="images/characters/ca_all_bug.gif" name="outfit"  style="margin-right: 5px;opacity: 0.3;width: 100%"></div><div class="gif_icon" style="text-align:center;width:25%;border: 1px solid #0752a3;display: inline-block"><img src="images/characters/ca_all_bearTW.gif" name="outfit"  style="margin-right: 5px;opacity: 0.3;width: 100%"></div></div>
	<div style="width: 100%;justify-content:center;display:flex;align-items:center;;margin-bottom:10px;"><div class="gif_icon" style="text-align:center;width:25%;border: 1px solid #0752a3;margin-right: 5%;display: inline-block"><img src="images/characters/ca_all_jojo.gif" name="outfit"  style="margin-right: 5px;opacity: 0.3;width: 100%"></div><div class="gif_icon" style="text-align:center;width:25%;border: 1px solid #0752a3;margin-right: 5%;display: inline-block"><img src="images/characters/ca_all_zombi.gif" name="outfit"  style="margin-right: 5px;opacity: 0.3;width: 100%"></div><div class="gif_icon" style="text-align:center;width:25%;border: 1px solid #0752a3;display: inline-block"><img src="images/characters/ca_all_nuclear.gif" name="outfit"  style="margin-right: 5px;opacity: 0.3;width: 100%"></div></div>

</div>


</div>

</div>

<div class="user_bottom" style="justify-content:center;display:flex;align-items:center;"><div style="width: 15%;margin-left: 10%;display:flex;align-items:center;"></div></div>
<script>
var nick = document.getElementsByClassName("nick");
var i=0;
var edit01=0;
var current_gif="<?php echo $user_gif?>";
var current_reward="<?php echo $reward_img?>";
for(i=0;i<nick.length;i++){
nick[i].addEventListener("click", function(i){
	var reward =this.getElementsByTagName("img")[0].src;
	if(this.getElementsByTagName("img")[0].style.opacity==1){
	document.getElementById("user_nick").src=this.getElementsByTagName("img")[0].src;
	if(!reward.includes(current_reward)){
			//document.getElementById("edit_outfit").style.opacity=1;
		if(this.getElementsByTagName("img")[0].style.opacity!=0.3){
			
			edit01=1;
		}
	}else{
		//document.getElementById("edit_outfit").style.opacity=0.3;
		edit01=0;
	}
	document.getElementById("reward").value=document.getElementById("user_nick").src.split("rewards/")[1];
	check_v();
	}
});
}
var nick2 = document.getElementsByClassName("gif_icon");
var edit02=0;
var i=0;

for(i=0;i<nick2.length;i++){
nick2[i].addEventListener("click", function(i){
	var tmp=this.getElementsByTagName("img")[0].src;
	var opt=this.getElementsByTagName("img")[0].style.opacity;
	
	 if(opt==1){
	  if(tmp=="images/characters/ca_all_cyber.gif"||tmp=="images/characters/ca_all_bearTW.gif"||tmp=="images/characters/ca_all_bug.gif"||tmp=="images/characters/ca_all_cool.gif"||tmp=="images/characters/ca_all_cow.gif"||tmp=="images/characters/ca_all_dico.gif"||tmp=="images/characters/ca_all_jojo.gif"||tmp=="images/characters/ca_all_zombi.gif"){
		document.getElementById("user-gif-file2").src=tmp;
		document.getElementById("user-gif-file1").src=tmp;
	}
	else if(this.getElementsByTagName("img")[0].src!="images/characters/ca_back_redbull.gif"){
		document.getElementById("user-gif-file2").src=tmp;
		if(<?php echo $gender?>==0){
			document.getElementById("user-gif-file1").src="images/characters/ca fix.gif";
		}else{
			document.getElementById("user-gif-file1").src="images/characters/ca fix long.gif";
		} //de
	} 
	else{
		document.getElementById("user-gif-file1").src=tmp;
		if(<?php echo $gender?>==0){
			document.getElementById("user-gif-file2").src="images/characters/ca fix.gif";
		}else{
			document.getElementById("user-gif-file2").src="images/characters/ca fix long.gif";
		}
	}
	if(!tmp.includes(current_gif||!reward.includes(current_reward))){
			//document.getElementById("edit_outfit").style.opacity=1;
		if(this.getElementsByTagName("img")[0].style.opacity!=0.3){
		edit02=1
		}
	}else{
		//document.getElementById("edit_outfit").style.opacity=0.3;
		edit02=0
	}
	for(var i=0;i<document.getElementsByClassName("gif_icon").length;i++){
		document.getElementsByClassName("gif_icon")[i].style.backgroundColor='white';
	}
	this.style.backgroundColor='#E1E1E1';
	document.getElementById("outlook").value=this.children[0].src.split("characters/")[1];
	check_v();
}});
}
	function f_submit(){
		//form1.submit();
		var userid=document.getElementById("id").value;
		var outlook=document.getElementById("outlook").value;
		var reward=document.getElementById("reward").value;
		$.post("php_edit_user.php", { userid: userid, outlook: outlook,reward:reward},
	   function(data) {
		var list_data=data.split("-");
		for(var i=0;i<27;i++){
			if(document.getElementsByClassName("gif_icon")[i].children[0].src.includes(list_data[0])){
				document.getElementsByClassName("gif_icon")[i].innerHTML=document.getElementsByClassName("gif_icon")[i].innerHTML.replace("width: 70%;\"><div name=\"product_price\" style=\"height: 20%; color: white; background-color: #0752a3;\">裝備中</div>","width: 100%;\">");
				current_gif=list_data[1];
				current_reward=list_data[2];
				document.getElementById("edit_outfit").style.opacity=0.3;
				document.getElementById("edit_outfit").onclick=null;
			}
			if(document.getElementsByClassName("gif_icon")[i].children[0].src.includes(list_data[1])){
				document.getElementsByClassName("gif_icon")[i].style.backgroundColor='#E1E1E1';
				document.getElementsByClassName("gif_icon")[i].children[0].style.width="70%";
				document.getElementsByClassName("gif_icon")[i].style.height="90%";
				document.getElementsByClassName("gif_icon")[i].innerHTML+="<div name=\"product_price\" style=\"height: 20%; color: white; background-color: #0752a3;\">裝備中</div>";
				document.getElementsByClassName("gif_icon")[i].style.textAlign="center";
				document.getElementById("outlook").value=list_data[1];
			}
		}
	    });
	}
	function check_v(){
	if(edit01||edit02){
	   document.getElementById("edit_outfit").style.opacity=1;
	   document.getElementById("edit_outfit").onclick=f_submit;
	}else{
		document.getElementById("edit_outfit").style.opacity=0.3;
		document.getElementById("edit_outfit").onclick=null;
	}
	}
</script>
<!-- init -->
<script>
if(document.getElementById("user-gif-file1").src!="images/characters/ca fix long.gif"&&document.getElementById("user-gif-file1").src!="images/characters/ca fix.gif"){
	for(var i=0;i<27;i++){
		if(document.getElementById("user-gif-file2").src.includes(document.getElementsByName("outfit")[i].src)){
		document.getElementsByClassName("gif_icon")[i].style.backgroundColor='#E1E1E1';
		document.getElementsByClassName("gif_icon")[i].children[0].style.width="70%";
		document.getElementsByClassName("gif_icon")[i].style.height="90%";
		document.getElementsByClassName("gif_icon")[i].innerHTML+="<div name=\"product_price\" style=\"height: 20%; color: white; background-color: #0752a3;\">裝備中</div>";
		document.getElementsByClassName("gif_icon")[i].style.textAlign="center";
		}
	}
}
for(var i=0;i<8;i++){
	if(document.getElementById("user_nick").src==document.getElementsByName("reward_img")[i].src){
		document.getElementsByName("reward_img")[1].parentNode.style.backgroundColor='#E1E1E1';
	}
}
</script>
	<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
		
    } else {
		var coll = document.getElementsByClassName("content");
		for (i = 0; i < coll.length; i++) {
			coll[i].removeAttribute("style");
		}
		var coll = document.getElementsByClassName("collapsible");
		for (i = 0; i < coll.length; i++) {
			coll[i].classList.remove("active");
		}
		this.classList.add("active");
      content.style.maxHeight = content.scrollHeight + "px";
		
    } 
  });
}
</script>
<!-- params setting-->
<script type="text/javascript">
	let urlParams = new URLSearchParams(window.location.search);
	if(urlParams.has('id')){
		var l_id=urlParams.get('id');
		var f_id=document.getElementById("id");
		f_id.value=l_id;
	}; // true
	console.log(urlParams.get('id')); // "abc"
	console.log(urlParams.getAll('action')); // ["abc"]
	console.log(urlParams.toString()); // "q=1234&txt=abc"
	console.log(urlParams.append('page', '1')); // "q=1234&txt=abc&page=1"
	</script>
<!-- for update data -->
<script>
    $(document).ready(function(){
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            if(fileName!=""){
				//form1.submit();
			}
        });
    });
</script>
<!-- show user outfit list -->
<script>
	<?php $result2 = mysqli_query( $con, "SELECT * FROM product WHERE `buyer_id`='$p_id'" );
	$items =array();
    while ( $row2 = mysqli_fetch_array( $result2 ) ) {
      $value2 = $row2[ 'p_name' ];
	  $items[$row2[ 'p_name' ]] +=$row2[ 'num' ] ;
      //echo $row['id'];
		?>for(i=0;i<document.getElementsByTagName("img").length;i++){
		  if(document.getElementsByTagName("img")[i].name==("outfit")){
		  if(document.getElementsByTagName("img")[i].src.includes("<?php echo $value2 ?>")){
			  document.getElementsByTagName("img")[i].style.opacity="1";
		  }
	  }
	  }<?php
    }
	?>
<?php foreach($items as $key => $value){
	if (!strpos($key, 'gif') !== false){
echo "document.getElementsByName(\"left_\"+\"".$key."\")[0].textContent=".$value.";";
	}
}?>
</script>
<script>
	<?php $result3 = mysqli_query( $con, "SELECT * FROM reward WHERE `rewarder_id`='$p_id'" );
	
    while ( $row3 = mysqli_fetch_array( $result3 ) ) {
      $value3 = $row3[ 'r_name' ];
      //echo $row['id'];
		?>for(i=0;i<document.getElementsByTagName("img").length;i++){
		  if(document.getElementsByTagName("img")[i].name==("reward_img")){
		  if(document.getElementsByTagName("img")[i].src.includes("<?php echo $value3 ?>")){
			  document.getElementsByTagName("img")[i].style.opacity="1";
		  }
	  }
	  }<?php
    }
	?>
	  
</script>
</form>
</body>
</html>