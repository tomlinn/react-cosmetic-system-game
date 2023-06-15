<!doctype html>

<?php
#header("Content-Type:text/html; charset=utf-8");
#ini_set( 'display_errors', 1 );
#ini_set( 'display_startup_errors', 1 );
#error_reporting( E_ALL );
error_reporting(0);
ini_set('display_errors', 0);
require('db.php');
$con = mysqli_connect($servername, $username, $password, $database);
mysqli_query($con, "set names `utf8`");
// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="preload" href="images/group_icon/T1C.png" as="image">
  <link rel="preload" href="images/group_icon/T2C.png" as="image">
  <link rel="preload" href="images/group_icon/T3C.png" as="image">
  <link rel="preload" href="images/group_icon/T4C.png" as="image">
  <link rel="preload" href="images/group_icon/T5C.png" as="image">
  <link rel="preload" href="images/group_icon/T6C.png" as="image">
  <link rel="preload" href="images/group_icon/T7C.png" as="image">
  <link rel="preload" href="images/group_icon/T8C.png" as="image">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600&amp;subset=latin-ext" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- JS -->
  <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
  <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
  <script type="text/javascript" src="qr_packed.js"></script>
  <!-- QRcode -->
  <script type="text/javascript">
    function openQRCamera(node) {
      var reader = new FileReader();
      reader.onload = function () {
        node.value = "";
        qrcode.callback = function (res) {
          if (res instanceof Error) {
            alert("No QR code found. Please make sure the QR code is within the camera's frame and try again.");
          } else {
            // refresh page
            if (res.includes("code")) {
              location.replace(res + "&id=" + document.location.href.split("id=")[1]);
            } else {
              location.replace(res);
            }
          }
        };
        qrcode.decode(reader.result);
      };
      reader.readAsDataURL(node.files[0]);
    }
    function showQRIntro() {
      return confirm("請以「拍照」的方式拍下您的QRCode.");
    }
  </script>

  <title>User Dashboard</title>
  <style>
    html,
    body {
      height: 100%;
      margin: 0px;
      background: url("user_display_img/bg_top.png");
    }

    .user {
      height: 35%;
      display: block;
      content: "";
      /*background: url("user_display_img/bg_top.png");*/
      background-size: 100% auto;
      box-shadow: 0 5px 5px -5px #333;
      max-width: 400px;
      /*border-left: 1px solid #0752a3;
  border-right: 1px solid #0752a3;
  border-top: 1px solid #0752a3;*/
    }

    .content2 {
      height: 55%;
      /*border-left: 1px solid #0752a3;
  border-right: 1px solid #0752a3;*/

      background-color: white;
      -webkit-overflow-scrolling: touch;
      overflow-x: scroll;
      white-space: nowrap;
      max-width: 400px;
      max-height: 600px;

      ::-webkit-scrollbar {
        display: none;
        /* Chrome Safari */
      }

      scrollbar-width: none;
      /* Firefox */
      -ms-overflow-style: none;
      /* IE 10+ */
      overflow-y:scroll;
      overflow-x:hidden;
      margin-left: 1px;
      margin-right: 1px;
    }

    .user_bottom {
      height: 10%;
      box-shadow: 0 -5px 5px -5px #333;
      /*background-image: url('user_display_img/bg_bottom.png');*/
      background-size: 100% auto;
      max-width: 400px;
      /*border-left: 1px solid #0752a3;
  border-right: 1px solid #0752a3;
  border-bottom: 1px solid #0752a3;*/

    }

    .user_img {
      height: 100%;
      display: inline-block;
      width: 40%;
      border: 1px solid #0752a3;
      background-color: white;
    }

    .user_img::before {
      display: block;
      content: "";
      height: 0%;
      /* add blank */
    }

    .user_top {
      margin-left: 10%;
      margin-right: 10%;
      height: 25%;
      width: 80%;
      display: flex;
      align-items: center;
    }

    .user_top::before {
      display: block;
      content: "";
      height: 30%;
      /* add blank */
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
      display: flex;
      align-items: center;
      justify-content: flex-start;

    }

    .collapsible3 {
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
      display: flex;
      align-items: center;
      justify-content: flex-start;

    }

    .active,
    .collapsible3:hover {
      background-color: #0853a4;
    }

    .collapsible3:after {
      margin-top: 2%;
      color: white;
      font-weight: bold;
    }

    .active,
    .collapsible:hover {
      background-color: #0853a4;
    }

    .collapsible:after {
      margin-top: 2%;
      content: url("user_display_img/icon_lock.png");
      color: white;
      font-weight: bold;
    }

    .collapsible2 {
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
      display: flex;
      align-items: center;
      justify-content: flex-start;

    }

    .active,
    .collapsible2:hover {
      background-color: #0853a4;
    }

    .collapsible2:after {
      margin-top: 2%;
      content: url("user_display_img/icon_arrow.png");
      color: white;
      font-weight: bold;
    }

    .collapsible3 {
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
      display: flex;
      align-items: center;
      justify-content: flex-start;

    }

    .active,
    .collapsible3:hover {
      background-color: #0853a4;
    }

    .collapsible3:after {
      margin-top: 2%;
      content: url("user_display_img/icon_check.png");
      color: white;
      font-weight: bold;
    }

    .active:after {
      content: url("user_display_img/icon_arrow-90.png");
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
      border-radius: 10px;
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

    .slidecontainer {
      width: 100%;
      height: 50px;
      margin-top: 25px;
    }

    .process {
      display: inline-block;
      margin-left: 5px;
      background-image: linear-gradient(305deg, transparent 10px, #f9da4a 10px);
      height: 60%;
      text-align: center
    }

    .process:before {
      content: "";
      display: inline-block;
      vertical-align: middle;
      height: 100%;
    }

    .process2 {
      display: inline-block;
      width: 0%;
      height: 90%;
      text-align: right;
      color: #f9da4a;
    }

    input[type="range"]::-webkit-slider-thumb {
      width: 20px;
      height: 20px;
    }

    .aaa {
      width: auto;
      height: 15%;
      position: absolute;
      z-index: 2;
    }

    .bbb {
      height: 15%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .ccc {
      width: 20%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: flex-end;
    }

    .ddd {
      margin-top: 5px;
      margin-left: 3px;
      white-space: normal;
      word-wrap: break-word;
    }

    .eee {
      background-color: #0853a4;
      height: 100%;
      width: 70%;
      display: inline-block;
      justify-content: center;
      display: flex;
      align-items: center;
    }

    .fff {
      height: 100%;
      width: 20%;
      display: inline-block;
      vertical-align: top;
      padding-left: 2px;
      padding-bottom: 2px;
      padding-top: 2px;
    }

    .hhh {
      width: 50%;
      display: inline-block;
      text-align: center;
      opacity: 0.0;
    }

    .iii {
      text-align: center;
      margin-bottom: 10px;
    }

    .kkk {
      width: 25%;
      display: inline-block;
    }

    .rrr {
      margin-left: 3px;
      margin-right: 3px;
    }

    .qqq {
      width: 25%;
      margin-top: 10px;
    }

    .ttt {
      width: 25%;
      display: inline-block;
      text-align: right;
    }

    .yyy {
      background: #FFFFFF;
    }

    #popup2 {
      position: absolute;
      width: 100%;
      z-index: 15;
      height: 100%;
      background: url(user_display_img/bg_top.png);
      border: 1px solid #000000;
    }

    .zzy {
      width: 100%;
      height: 100%;
      border: 5px solid #0752a3;
      max-width: 400px;
      position: absolute;
      left: 0;
      right: 0;
      margin-left: auto;
      margin-right: auto;
    }

    .yyz {
      width: 0;
      height: 0;
      opacity: 0;
    }

    .rrz {
      width: auto;
      height: 15%;
      position: absolute;
      z-index: 1;
    }

    .xyz {
      font-size: medium;
      font-weight: bold;
      font-family: 微軟正黑體;
    }

    .xxx {
      height: 8%;
      text-align: center
    }

    .www {
      width: 170px;
      height: 170px;
      border: 3px solid #000000;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      background-repeat: no-repeat;
      background-position: center;
      background-size: contain;
      background-blend-mode: soft-light;
      background-image: url(uploads/<?php echo $image ?>);
    }

    .wsd {
      position: absolute;
      width: 100%;
      z-index: 10;
      height: 100%;
      background: url(user_display_img/bg_top.png);
      border: 1px solid #000000;
      display: none;
    }

    .wsy {
      height: 10%;
      display: flex;
      align-items: flex-start;
      justify-content: center;
    }
  </style>

</head>
<?php

$p_id = $_GET['id'];
//echo $p_id;
$result = mysqli_query($con, "SELECT * FROM customer WHERE `id`='$p_id'");
while ($row = mysqli_fetch_array($result)) {
  $value = $row['name'];
  $image = $row['image_location'];
  $user_gif = $row['user_character'];
  $reward_img = $row['reward'];
  $gender = $row['gender'];
  $question = array();
  for ($i = 3; $i <= 18; $i++) {
    array_push($question, $row[$i]);
  }


  //echo $row['id'];
}

function generateUserGifImages($user_gif, $gender, $size)
{
  $suits = [
    "ca_all_bearTW.gif",
    "ca_all_bug.gif",
    "ca_all_cool.gif",
    "ca_all_cow.gif",
    "ca_all_cyber.gif",
    "ca_all_dico.gif",
    "ca_all_jojo.gif",
    "ca_all_zombi.gif",
    "ca_all_nuclear",
  ];
  $backClothes = [
    "ca_back_redbull.gif"
  ];
  $basic = ($gender) ? "ca fix long.gif" : "ca fix.gif";
  if (in_array($user_gif, $suits)) {
    $imageTop_src = "images/characters/" . $user_gif;
    $imageBottom_src = "images/characters/" . $basic;
  } else if (in_array($user_gif, $backClothes)) {
    $imageTop_src = "images/characters/" . $basic;
    $imageBottom_src = "images/characters/" . $user_gif;
  } else {
    $imageTop_src = "images/characters/" . $user_gif;
    $imageBottom_src = "images/characters/" . $basic;
  }

  $html .= '<img src="' . $imageTop_src . '" style="width:auto;height: ' . $size . '%;position:absolute;z-index:2;" id="user-gif-file1">';
  $html .= '<img src="' . $imageBottom_src . '" style="width:auto;height: ' . $size . '%;position:absolute;z-index:1;" id="user-gif-file2">';


  return $html;
}

function generateUserName($value)
{
  if ($value) {
    echo "<font class=\"xyz\">$value</font>";
  } else {
    echo "<font class=\"xyz\">沒有此使用者</font>";
  }
}

function generateUserReward($reward_img)
{
  if ($reward_img != null) {
    echo "<img src=\"images/rewards/$reward_img\" style=\"width: 80%;\">";
  } else {
    echo "<img src=\"images/rewards/blank_reward.png\" style=\"width: 80%;\">";
  }
}

function generateUserImage($image)
{
  if ($image != "") {
    echo '<div style="height: 80%; width: auto; justify-content:center; display:flex; align-items:center;">';
    echo '<img src="uploads/' . $image . '" width="auto" height="70%" style="border:1px solid #333333; border-radius: 50%;">';
    echo '</div>';
  } else {
    echo '<div style="height: 80%; width: auto; justify-content:center; display:flex; align-items:center;">';
    echo '<img src="images/default.png" width="80px" height="80px" style="border:1px solid #333333; border-radius: 50%;">';
    echo '</div>';
  }

}
?>



<body>
  <form id="form1" action="api_set_ans.php" method="POST" enctype="multipart/form-data" class="zzy">
    <div style="height: 0"><input type="submit" value="Submit" class="yyz" id="user_submit"><input name="id" type="text"
        value="22222222222111" class="yyz" id="id" readonly></div>
    <div id="popup2" onClick="hidepaper2()" style="display: none;">
      <div class="wsy">
        <img src="user_display_img/con_top.png" width="100%" height="auto">
      </div>
      <div class="bbb">
        <?php echo generateUserGifImages($user_gif, $gender, 15) ?>
      </div>
      <div class="xxx" id="rewards-name-con">
        <?php echo generateUserReward($reward_img) ?>
      </div>

      <div style="height: 11%; text-align: center" id="user-name-con">
        <div style="height: 20%; text-align: center;">
          <?php

          ?>
        </div>
      </div>

      <div style="height: 30%; display: flex; justify-content: center; align-items: center">
        <div class="www">
          <div
            style="width: 165px; height: 165px; background-color: WHITE; position: absolute; border-radius: 50%; opacity: 0.5;">
          </div>
          <canvas id="myCanvas2" width="130" height="130" style="z-index: 10">Your browser does not support the HTML5
            canvas tag.</canvas>
        </div>
        <div>
        </div>
      </div>

      <div style="height: 20%;display: flex;justify-content: center;align-items: center">
        <img src="user_display_img/con_center.png" width="80%" style="margin-left: 10%;margin-right: 10%" height="auto">
      </div>
      <div style="height: 6%;display: flex;justify-content: center;align-items: flex-end">
        <img src="user_display_img/con_down.png" width="100%" height="auto">
      </div>
    </div>
    <div id="cong" class="wsd">
      <div class="bbb">
        <div class="ccc">
          <?php echo generateUserGifImages($user_gif, $gender, 10) ?>
        </div>
        <div style="width: 60%;">
          <img src="user_display_img/title01.png" width="100%" height="auto">
        </div>
      </div>
      <div style="height: 5%;background: #FFFFFF">
        <img style="box-shadow: 0px 0px 3px grey;" src="user_display_img/button_previous page.png" width="20%"
          onClick="hidepaper()">
      </div>
      <div style="height: 40%;display: flex;justify-content: center;align-items: center;background: #FFFFFF">
        <div class="www">
          <div
            style="width: 165px;height: 165px;background-color: WHITE;position: absolute;border-radius: 50%;opacity:0.5;">
          </div>
          <canvas id="myCanvas" width="130" height="130" style="z-index: 11">
            Your browser does not support the HTML5 canvas tag.</canvas>
        </div>
        <div>
        </div>
      </div>
      <div style="height: 10%;display: flex;align-items: flex-end;background: #FFFFFF">
        <img src="user_display_img/final_QA_title.png" width="50%" height="auto" style="margin-bottom: 30px">
      </div>
      <div style="height: 20%;background: #FFFFFF">
        <img src="user_display_img/final_QA.png" width="80%" style="margin-left: 10%;margin-right: 10%" height="auto">
      </div>
      <div style="height: 10%;display: flex;justify-content: center;align-items: center">
        <img src="user_display_img/final_button.png" width="auto" height="60%" onClick="showpaper2()">
      </div>
    </div>
    <div class="user">
      <div class="user_top">

        <div style="display: inline-block;width: 50%;height: 70%">
          <img src="images/icons/icon_information.png" height="85%">
        </div>
        <div style="display: inline-block;width: 50%;height:70%;text-align: right;padding-right: 0px;mar">
          <input type="file" id="file" onclick="return showQRIntro();" onchange="openQRCamera(this);" type=file
            accept="image/*" capture=environment tabindex=-1 style="height: 0;overflow: hidden;width: 0;" />
          <label for="file" style="height:85%">
            <img src="images/icons/button_QRcode.png" height="100%" style="margin-right: 5px">
          </label>
          <label for="user_submit" style="height:85%">
            <a href="shopping.php?id=<?php echo $p_id ?>">
              <img src="icon-2.PNG" height="100%">
            </a>
          </label>
        </div>
      </div>
      <div style="margin-left: 10%;margin-right: 10%;height: 60%;width:80%;display: flex">

        <div class="user_img">
          <div style="height: 80%;width: auto;justify-content:center;display:flex;align-items:center;">
            <?php echo generateUserImage($image) ?>

          </div>
          <div style="height: 20%;text-align: center;">
            <?php
            echo generateUserName($value);
            mysqli_close($con);
            ?>
          </div>
        </div>
        <div
          style="display: inline-block;width: 60%;height: 100%;vertical-align: top;border: 1px solid #0752a3;background-color: white">
          <div style="height:5%;text-align: center;margin-top: 5%" id="stats">
          </div>
          <div style="height:35%;text-align: center" id="rewards-name">
            <?php echo generateUserReward($reward_img) ?>
          </div>
          <div style="height:60%;text-align: center" id="user-gif">
            <div style="height:80%;text-align: center;justify-content:center;display:flex;align-items:center;"
              id="user-gif">
              <input name="userid" type="text" hidden="true" value="<?php echo $p_id ?>" class="yyz" id="id" readonly>
              <input name="userid" type="text" hidden="true" value="<?php echo $p_id ?>" class="yyz" id="id" readonly>
              <input name="ans1" type="text" hidden="true" value="" class="yyz" id="ans1" readonly>
              <input name="ans2" type="text" hidden="true" value="" class="yyz" id="ans2" readonly>
              <input name="reward" type="text" hidden="true" value="<?php echo $reward_img ?>" class="yyz" id="reward"
                readonly>
              <input name="group" type="text" hidden="true" value="" class="yyz" id="group" readonly>
              <?php echo generateUserGifImages($user_gif, $gender, 10) ?>
            </div>
          </div>
        </div>
      </div>
      <div style="margin-left: 10%;margin-right: 10%;height: 15%;width:80%;display:flex">
        <div style="display:inline-flex;width:50%;height: 100%;text-align: left;align-items:flex-end">
        </div>
        <div style="display:inline-block;width:50%;height: 100%;text-align: right;vertical-align: top;margin-top: 2px">
          <a href="group_setting.php?id=<?php echo $p_id ?>">
            <img src="icon-3.PNG" height="75%" onClick="">
          </a>
        </div>
      </div>
    </div>
    <div class="content2">
      <?php
      $questions = [
        [
          "id" => "T1",
          "name" => "尋味",
          "questions" => [
            [
              "question" => "你為了美食走遍天涯的慾望強烈嗎？",
              "default" => 50,
              "id" => "myRange1-1",
              "icon" => "icon_Q1.png",
              "description" => "Value:",
              "options" => [
                "bad" => "弱",
                "good" => "強"
              ]
            ],
            [
              "question" => "美食對地方的記憶點與好感影響程度？",
              "default" => 50,
              "id" => "myRange1-2",
              "icon" => "icon_Q2.png",
              "description" => "Value:",
              "options" => [
                "bad" => "少",
                "good" => "多"
              ]
            ]
          ]
        ],
        [
          "id" => "T2",
          "name" => "悠礦墟",
          "questions" => [
            [
              "question" => "你喜歡經常改變自己的生活方式和習慣嗎？",
              "default" => 50,
              "id" => "myRange2-1",
              "icon" => "icon_Q1.png",
              "description" => "Value:",
              "options" => [
                "bad" => "不喜歡",
                "good" => "很喜歡"
              ]
            ],
            [
              "question" => "你喜歡挑戰自己做一些從未嘗試過的事情嗎？",
              "default" => 50,
              "id" => "myRange2-2",
              "icon" => "icon_Q2.png",
              "description" => "Value:",
              "options" => [
                "bad" => "不喜歡",
                "good" => "很喜歡"
              ]
            ]
          ]
        ],
        [
          "id" => "T3",
          "name" => "叫一下賣一下",
          "questions" => [
            [
              "question" => "聽到叫賣聲是否會勾起當時的回憶，懷念當時的味道、環境、情景？",
              "default" => 50,
              "id" => "myRange3-1",
              "icon" => "icon_Q1.png",
              "description" => "Value:",
              "options" => [
                "bad" => "沒感覺",
                "good" => "好懷念"
              ]
            ],
            [
              "question" => "將叫賣聲融入歌曲，會不會讓你更留意台灣街道上的特色聲音呢？",
              "default" => 50,
              "id" => "myRange3-2",
              "icon" => "icon_Q2.png",
              "description" => "Value:",
              "options" => [
                "bad" => "沒感覺",
                "good" => "更留意"
              ]
            ]
          ]
        ],
        [
          "id" => "T4",
          "name" => "平安鮭",
          "questions" => [
            [
              "question" => "你認為櫻花鉤吻鮭是屬於台灣代表動物之一嗎？",
              "default" => 50,
              "id" => "myRange4-1",
              "icon" => "icon_Q1.png",
              "description" => "Value:",
              "options" => [
                "bad" => "不太算",
                "good" => "非常算"
              ]
            ],
            [
              "question" => "以機台、牌卡等遊戲的方式會讓你更加深對櫻花鉤吻鮭的了解嗎？",
              "default" => 50,
              "id" => "myRange4-2",
              "icon" => "icon_Q2.png",
              "description" => "Value:",
              "options" => [
                "bad" => "沒增加",
                "good" => "很了解"
              ]
            ]
          ]
        ],
        [
          "id" => "T5",
          "name" => "抒發診聊所",
          "questions" => [
            [
              "question" => "沿途的美景會增加你選擇走蘇花公路的意願嗎？",
              "default" => 50,
              "id" => "myRange5-1",
              "icon" => "icon_Q1.png",
              "description" => "Value:",
              "options" => [
                "bad" => "沒有感覺",
                "good" => "意願上升"
              ]
            ],
            [
              "question" => "有影子的地方就有光，你相信負面能量可以轉為幽默嗎？",
              "default" => 50,
              "id" => "myRange5-2",
              "icon" => "icon_Q2.png",
              "description" => "Value:",
              "options" => [
                "bad" => "不信",
                "good" => "相信"
              ]
            ]
          ]
        ],
        [
          "id" => "T6",
          "name" => "踅街",
          "questions" => [
            [
              "question" => "你喜歡逛街、留意街道景色嗎？",
              "default" => 50,
              "id" => "myRange6-1",
              "icon" => "icon_Q1.png",
              "description" => "Value:",
              "options" => [
                "bad" => "不喜歡",
                "good" => "喜歡"
              ]
            ],
            [
              "question" => "街道美術館的設立有增加你留意街道風景的意願嗎？",
              "default" => 50,
              "id" => "myRange6-2",
              "icon" => "icon_Q2.png",
              "description" => "Value:",
              "options" => [
                "bad" => "不信",
                "good" => "相信"
              ]
            ]
          ]
        ],
        [
          "id" => "T7",
          "name" => "藝途",
          "questions" => [
            [
              "question" => "搭捷運時，你是否有注意及發現到，每站所設置的公共藝術有相似或不同之處？",
              "default" => 50,
              "id" => "myRange7-1",
              "icon" => "icon_Q1.png",
              "description" => "Value:",
              "options" => [
                "bad" => "完全沒注意",
                "good" => "有發現"
              ]
            ],
            [
              "question" => "你認為捷運所設置的公共藝術，與所設置的站點之間，兩者關係的緊密程度？",
              "default" => 50,
              "id" => "myRange7-2",
              "icon" => "icon_Q2.png",
              "description" => "Value:",
              "options" => [
                "bad" => "疏離",
                "good" => "緊密"
              ]
            ]
          ]
        ],
        [
          "id" => "T8",
          "name" => "溯源旅城",
          "questions" => [
            [
              "question" => "你認為農業灌溉技術的進步能夠解決靠天吃飯的問題嗎",
              "default" => 50,
              "id" => "myRange8-1",
              "icon" => "icon_Q1.png",
              "description" => "Value:",
              "options" => [
                "bad" => "不能",
                "good" => "能"
              ]
            ],
            [
              "question" => "在遊戲的過程中走訪與水圳有關的地點會對城市有不一樣的認識嗎",
              "default" => 50,
              "id" => "myRange8-2",
              "icon" => "icon_Q2.png",
              "description" => "Value:",
              "options" => [
                "bad" => "不會",
                "good" => "會"
              ]
            ]
          ]
        ]
      ];

      ?>

      <?php foreach ($questions as $index => $item): ?>
        <div class="collapsible" style="opacity: 0.3;">
          <div class="fff">
            <img src="images/group_icon/<?php echo $item['id']; ?>.png" class="yyy" height="100%">
          </div>
          <div class="eee">
            <?php echo $item['name']; ?>
          </div>
        </div>
        <div class="content">
          <?php foreach ($item['questions'] as $q_index => $q_item): ?>
            <img src="user_display_img/<?php echo $q_item['icon']; ?>" class="qqq">
            <div class="ddd">
              <?php echo $q_item['question']; ?>
            </div>
            <div class="slidecontainer">
              <input type="range" min="1" max="100"
                value="<?php echo ($q_item[0] == "") ? $q_item['default'] : $q_item[0]; ?>" <?php echo ($q_item[0] == "") ? "style=\"opacity:1\"" : ""; ?> class="slider" id="<?php echo $q_item['id']; ?>">
              <div>
                <div class="kkk">
                  <img src="user_display_img/icon_slider bad.png" height="65%" class="rrr">
                  <?php echo $q_item['options']['bad']; ?>
                </div>
                <div class="hhh">
                  <p>
                    <?php echo $q_item['description']; ?> <span id="demo1-<?php echo $index + 1; ?>">
                    </span>
                  </p>
                </div>
                <div class="ttt">
                  <?php echo $q_item['options']['good']; ?>
                  <img src="user_display_img/icon_slider good.png" height="65%" class="rrr">
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          <div class="iii">
            <img src="user_display_img/button_send.png" style="width: 30%" onClick="f_submit(this.id)"
              id="btn_<?php echo $index + 1; ?>">
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="user_bottom" style="justify-content:center;display:flex;align-items:center;">
      <?php if (in_array("", $question) or in_array("-1", $question)): ?>
        <div style="width: 15%;margin-left: 10%;display:flex;align-items:center;">進度</div>
        <div
          style="width: 65%;height: 30%; margin-right: 10%;background-color: black;padding-top: 5px;padding-bottom: 5px;display:flex;align-items:center;">
          <div role="progressbar" id="progress" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="process"
            style="width: 0%">
          </div>
          <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="process2">
          </div>
        </div>
      <?php else: ?>
        <img src="user_display_img/final_button.png" onclick="showpaper()"
          style="height: 60%;box-shadow: 0px 0px 3px grey;">
      <?php endif; ?>
    </div>

    <script>
      function f_submit(clicked_id) {
        document.getElementById("ans1").value = document.getElementById("myRange" + clicked_id[4] + "-1").value;
        document.getElementById("ans2").value = document.getElementById("myRange" + clicked_id[4] + "-2").value;
        document.getElementById("group").value = clicked_id[4];
        form1.submit();
      }
      function showpaper() {
        document.getElementById("cong").style.display = "";
      }
      function hidepaper() {
        document.getElementById("cong").style.display = "none";
      }
      function showpaper2() {
        document.getElementById("popup2").style.display = "";
      }
      function hidepaper2() {
        document.getElementById("popup2").style.display = "none";
      }

      <!--folder setting-->

      const coll = document.getElementsByClassName("collapsible");
      const qStatus = [];
      const qList = [
        "<?php echo implode('","', $question); ?>"
      ];
      for (let i = 0; i < 8; i++) {
        const q1 = qList[i * 2];
        const q2 = qList[i * 2 + 1];
        if (q1 === "" && q2 === "") {
          qStatus[i] = "lock";
        } else if (q1 !== "" && q2 !== "") {
          qStatus[i] = "done";
        } else {
          qStatus[i] = "ready";
        }
      }
      let count = 0;
      for (let i = 0; i < coll.length; i++) {
        const status = qStatus[i];
        if (status === "done") {
          count++;
        }
        if (status !== "lock") {
          coll[i].style.opacity = "1";
          coll[i].classList.add("collapsible2");
          if (status === "done") {
            coll[i].classList.add("collapsible3");
          }
          coll[i].addEventListener("click", function () {
            if (!this.classList.contains("collapsible3")) {
              this.classList.toggle("active");
            }
            const content = this.nextElementSibling;
            if (content.style.maxHeight) {
              content.style.maxHeight = null;
              const icon = this.firstElementChild.children[0];
              if (icon.src.includes("C.png")) {
                icon.src = icon.src.replace("C.png", ".png");
              }
            } else {
              const coll = document.getElementsByClassName("content");
              for (let i = 0; i < coll.length; i++) {
                coll[i].removeAttribute("style");
                const icon = document.getElementsByClassName("collapsible")[i].children[0].children[0];
                if (icon.src.includes("C.png")) {
                  icon.src = icon.src.replace("C.png", ".png");
                }
              }
              for (let i = 0; i < coll.length; i++) {
                const c = coll[i].parentNode;
                if (!c.classList.contains("collapsible3")) {
                  c.classList.remove("active");
                }
              }
              if (!this.classList.contains("collapsible3")) {
                this.classList.add("active");
              }
              content.style.maxHeight = content.scrollHeight + "px";
              const icon = this.firstElementChild.children[0];
              if (!icon.src.includes("C.png")) {
                icon.src = icon.src.replace(".png", "C.png");
              }
            }
          });
        }
      }

      // progress bar
      if (count == 8) {

      } else if (count == 0) {
        document.getElementById("progress").style.width = "0%"
        document.getElementById("progress").innerText = ""
      } else {
        document.getElementById("progress").style.width = (count / 8 * 100).toString() + "%";
        /*document.getElementById("progress").innerText=(Math.floor(count/8*100)).toString()+"%";*/
      }

      // <!-- params setting-->
      let urlParams = new URLSearchParams(window.location.search);
      if (urlParams.has('id')) {
        var l_id = urlParams.get('id');
        var f_id = document.getElementById("id");
        f_id.value = l_id;
      }; // true
      console.log(urlParams.get('id')); // "abc"
      console.log(urlParams.getAll('action')); // ["abc"]
      console.log(urlParams.toString()); // "q=1234&txt=abc"
      console.log(urlParams.append('page', '1')); // "q=1234&txt=abc&page=1"


      // <!-- for update data -->
      $(document).ready(function () {
        $('input[type="file"]').change(function (e) {
          var fileName = e.target.files[0].name;
          if (fileName != "") {
            //form1.submit();
          }
        });
      });

      //-------add range listener------- //
      $("input[type=range]").filter(function () {
        if (document.getElementsByClassName("collapsible")[this.id.slice(-10, -2).replace("myRange", "") - 1].classList.contains("collapsible3")) {
          this.setAttribute('disabled', true);
          document.getElementById("btn_" + this.id.slice(-10, -2).replace("myRange", "")).style.opacity = 0.3;
          document.getElementById("btn_" + this.id.slice(-10, -2).replace("myRange", "")).onclick = ""
        }
        this.addEventListener('input', function () {
          this.style.opacity = 1
        }, false);
      });


      const canvas2 = document.getElementById("myCanvas2");
      const ctx2 = canvas2.getContext("2d");

      const x = 0;
      const y = 130;
      var question = <?php echo json_encode($question); ?>;
      const isQuestionValid = question && !question.includes("") && !question.includes("-1");

      function drawLine(ctx, x, y, j, question) {
        ctx.lineTo(x + j * 15, y - j * 15 + question[0] * 0.2 - 10 + question[1] * 0.2 - 10);
      }

      if (isQuestionValid) {
        ctx2.beginPath();
        for (let i = 0, j = 1; i < 16; i += 2, j++) {
          const questionSlice = question.slice(i, i + 2);
          drawLine(ctx2, x, y, j, questionSlice);
        }
        ctx2.strokeStyle = "#ff0000";
        ctx2.lineWidth = 3;
        ctx2.stroke();
      }

    </script>
  </form>

</body>

</html>