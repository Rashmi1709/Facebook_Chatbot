<?php
//if(isset($_SESSION)){
	
// session_start();
// }
$val1 = 'false';
$my_verify_token = "123456789FBChatbot";
$challenge = $_GET['hub_challenge'];
	$verify_token=$_GET['hub_verify_token'];
	
if($my_verify_token===$verify_token){
		
echo $challenge;
exit;
}

include './api.php';
include './config.php';

$access_token = "EAAIz9mq06RoBADOeLwbXn2UBkEmZAZArFHMDfmRnn2dV8JqHJxD8pVNw1UqugYntlCjrNnOxBhXlVsRtFmdUrlHMlBeBXmyqRIC3ua72yCaAOMergQy48wtIxCUZCE35DgHSV9I62bX42iV34M0eDaVrFQwYwWPHV0Yk49N5rYyb12P2VIY";

$response = file_get_contents("php://input");

//file_put_contents("text.txt",$response);

$response = json_decode($response, true);

$message = $response['entry'][0]['messaging'][0]['message']['text'];
$message_val = $response['entry'][0]['messaging'][0]['message']['payload'];
$payload_quick = '';
if (isset($response['entry'][0]['messaging'][0]['message']['quick_reply']['payload'])) {
$payload_quick = $response['entry'][0]['messaging'][0]['message']['quick_reply']['payload']; 
} 	
// $payload_txt = $input['entry'][0]['messaging'][0]['message']['quick_reply']‌​['payload'];
// $session_val = array();
// if ($val1 = true)
if ($message) {
	 /* $config = new Config();
    $con = $config->connect();
    $sql= $con->query('TRUNCATE TABLE `day`');
	$sql= $con->query('TRUNCATE TABLE `time`');
	$sql= $con->query('TRUNCATE TABLE `category`');
	$sql= $con->query('TRUNCATE TABLE `sub_category`');*/
    $replay_message = '{
		"messaging_type":"RESPONSE",
		"recipient":{
			"id":"3042180345900194"
		},
		
  "message":{
	
    "text": "Hi, thank you for contacting us, please give me your Online Order to click Sushi Bento or Shushi Platters",
    "quick_replies":[
      {
        "content_type":"text",
        "title":"Sushi Bento",
        "payload":"http://localhost/FB_Chatbot/FBChatbot.php",
        "image_url":""
      },{
        "content_type":"text",
        "title":"Sushi Platters",
        "payload":"http://localhost/FB_Chatbot/FBChatbot.php",
        "image_url":"http://example.com/img/green.png"
      }
    ]
  }
		
	}';
}

$val = '';
$val_1 = $val_2 = $val_3 = $val_4 = $val_5 = $val_0 = '';
if ($message == 'Select this Shop') {

	$val = '';	
	 $fields = array('shopId'=> 101, 'serviceId' => 1);
	$api_data = get_data('post', 'company/get-shop-service-timeslot-info', $fields);
$name = '';
$val1 = $val2 = $val3 = $val4 = $val5 = $val6 = '';

if($api_data){

 $name .='Which day would you like to get order?'.'\n\n';
	if($api_data[0]->weekDay == 1){
		$message1 = $val1 = date('Y-m-d');
	}
	if($api_data[1]->weekDay == 2){
		$message2 = $val2 = date('Y-m-d', strtotime('+1 day', strtotime($val1)));
	}
	if($api_data[2]->weekDay == 3){
		$message3 = $val3 = date('Y-m-d', strtotime('+1 day', strtotime($val2)));
	}
	if($api_data[3]->weekDay == 4){
		$message4 = $val4 = date('Y-m-d', strtotime('+1 day', strtotime($val3)));
	}
	if($api_data[4]->weekDay ==5){
		$message5 = $val5 = date('Y-m-d', strtotime('+1 day', strtotime($val4)));
	}
	if($api_data[5]->weekDay == 6){
		$message6 = $val6 = date('Y-m-d', strtotime('+1 day', strtotime($val5)));
	}
	if($api_data){
	}
}
 $replay_message = '{
		"messaging_type":"RESPONSE",
		"recipient":{
			"id":"3042180345900194"
		},
		
  "message":{
    "text": "'.$name.'",
    "quick_replies":[
      {
        "content_type":"text",
        "title":"' . date('l',strtotime($val1)).'",
"payload":"http://localhost/FB_Chatbot/FBChatbot.php"		
      },
	  {
        "content_type":"text",
      "title":"' . date('l',strtotime($val2)).'",
			"payload":"http://localhost/FB_Chatbot/FBChatbot.php"
      },
	  {
        "content_type":"text",
        "title":"' . date('l',strtotime($val3)).'",
			"payload":"http://localhost/FB_Chatbot/FBChatbot.php"
      },
	  {
        "content_type":"text",
        "title":"' . date('l',strtotime($val4)).'",
		"payload":"http://localhost/FB_Chatbot/FBChatbot.php"
      },
	  {
        "content_type":"text",
        "title":"' . date('l',strtotime($val5)).'",
		"payload":"http://localhost/FB_Chatbot/FBChatbot.php"
      },
	  {
        "content_type":"text",
        "title":"' . date('l',strtotime($val6)).'",
		"payload":"http://localhost/FB_Chatbot/FBChatbot.php"
      }
    ]
  }
  
		
	}';
}
// select time slot
$val = '';
if ($message == 'Select Time'){
	$val = 'Proceed';	
	 $fields = array('shopId'=> 101, 'serviceId' => 1);
	$api_data = get_data('post', 'company/get-shop-service-timeslot-info', $fields);
$name = '';
if($api_data){

	$name .= 'Opening Time : '. $api_data[0]->from . '\n\n And \n\n Closing Time : ' . $api_data[0]->to .'\n\n';
// $name .= $value->from . ' ' . $value->to;

}
 $replay_message = '{
		"messaging_type":"RESPONSE",
		"recipient":{
			"id":"3042180345900194"
		},
  "message":{
    "text": "'.$name.'",
    "quick_replies":[
      {
        "content_type":"text",
        "title":"'.$val.'",
        "payload":"http://localhost/FB_Chatbot/FBChatbot.php",
     
      }
    ]
  }
  
		
	}';
}

if ($message == 'Monday' || $message == 'Tuesday' || $message == 'Wednesday' || $message == 'Thursday' || $message == 'Friday' || $message == 'Saturday' || $message == 'Sunday') {
	  set_session_value('Day', $message);

  $config = new Config();
    $con = $config->connect();
    $query = 'INSERT INTO `day` (`name`) VALUES ("' . $message. '")';
    $con->query($query);
		
	 $fields = array('shopId'=> 101, 'serviceId' => 1);
	$api_data = get_data('post', 'company/get-shop-service-timeslot-info', $fields);
$name = '';
$val = 'Select Time';
$arr = $arr1 = array();
if($api_data){

 $name .= '*Opening Time :*\n\n'. $api_data[0]->from . '\n\n And \n\n *Closing Time :*\n\n' . $api_data[0]->to .'\n\n'.'At what time would you like to prefer order?'.'\n\n';

//  $from = date('H:i',strtotime($api_data[0]->from));
 $delay = 1; // $api_data[0]->delay;
      
			/* foreach($api_data as $k => $value){
				 
				if($k == 0){
					// $name .= date('H:i',strtotime($value->from)).'\n\n';
					$from = date('H:i',strtotime($value->from));
				}
				else {
				if($value->to >= $from){
					
				// $name .= date('H:i',strtotime("+$delay hour", strtotime($from))).'\n\n';
				$from = date('H:i',strtotime("+$delay hour", strtotime($from)));
				}
				}
				  if ($value->to >= $from) {
                $tmp = array();
                $tmp["content_type"] = "text";
                $tmp["title"] = $from;
                $tmp["payload"] = $val;
                $arr[] = $tmp;
            }
        }*/
		$start_time = $api_data[0]->from;
		$end_time = $api_data[0]->to;
		for($i=8; $i<=20 ; $i++){
		
			if($i == 8){
					// $name .= date('H:i',strtotime($value->from)).'\n\n';
					$from = date('H:i',strtotime($start_time));
				}
				else {
				if($end_time >= $from){
					
				// $name .= date('H:i',strtotime("+$delay hour", strtotime($from))).'\n\n';
				$from = date('H:i',strtotime("+$delay hour", strtotime($from)));
				}
				}
				  if ($end_time >= $from) {
                $tmp = array();
                $tmp["content_type"] = "text";
                $tmp["title"] = $from;
                $tmp["payload"] = $val;
                $arr[] = $tmp;
            }
		}
        $arr1 = json_encode($arr);
    }

    $replay_message = '{
		"messaging_type":"RESPONSE",
		"recipient":{
			"id":"3042180345900194"
		},
                
        "message":{
          "text": "' . $name . '",
          "quick_replies":' . $arr1 . '
        }
    }';
}
if ($message == '08:00' || $message == '09:00' || $message == '10:00' || $message == '11:00' || $message == '12:00' || $message == '13:00' || $message == '14:00' || $message == '15:00' || $message == '16:00' || $message == '17:00' || $message == '18:00' || $message == '19:00' || $message == '20:00') {
	$get_data=array();
  $config = new Config();
    $con = $config->connect();
    $sql= $con->query('Select * from `day`');
	if (mysqli_num_rows($sql) > 0) {
            $get_data = mysqli_fetch_assoc($sql);
        }
	$query = 'INSERT INTO `time` (day_id, `name`) VALUES ("' . $get_data['id']. '", "' . $message. '")';
    $con->query($query);
	

	 // set_session_value('Time', $message);
    $val = 'Menu';
    // $fields = array('shopId'=> 101, 'serviceId' => 1);
    $api_data = get_data('get', 'itemCategory/get-all');
    $from = '';
    $arr = $arr1 = array();
    if ($api_data) {
		
        foreach ($api_data as $value) {
           //  $name .= trim($value->name) . '\n\n';
		  
		   $name = 'Please choose food category'.'\n\n';
			$from = trim($value->name);

            $tmp = array();
            $tmp["content_type"] = "text";
            $tmp["title"] = $from;
            $tmp["payload"] = $val;
            $arr[] = $tmp;
        }
    }
	$arr1 = json_encode($arr);
    $replay_message = '{
		
		"messaging_type":"RESPONSE",
		"recipient":{
			"id":"3042180345900194"
		},
		
        "message":{
			
          "text": "' . $name . '",
          "quick_replies":' . $arr1 . '
        }
    }';
}				
if ($message == 'FOOD' || $message == 'THAISALAD' || $message == 'SOUPS' || $message == 'CHEFREC' || $message == 'QUICKWOK' || $message == 'NOODLES' || $message == 'FRIEDRICE' || $message == 'ENTREES' || $message == 'CURRY' || $message == 'CHICKLOVE' || $message == 'ADDITIONS') {
    $get_data=array();
  $config = new Config();
    $con = $config->connect();
    $sql= $con->query('Select * from `time`');
	if (mysqli_num_rows($sql) > 0) {
            $get_data = mysqli_fetch_assoc($sql);
        }
	$query = 'INSERT INTO `category` (time_id,day_id, `name`) VALUES ("' . $get_data['id']. '","' . $get_data['day_id']. '", "' . $message. '")';
    $con->query($query);
	
	// $set_session_value('Category',$message);
	$val = 'Select dishes';	
	 // $fields = array('shopId'=> 101, 'serviceId' => 1);
	$api_data = get_data('get', 'saleItem/get-all');
	 $from = '';
    $arr = $arr1 = array();
$name = 'Please choose your food item.';
if($api_data){
				// foreach($api_data as $k => $value){
				for($i = 0; $i<=10; $i++)
				{
				$from = $api_data[$i]->name;
				$tmp = array();
            $tmp["content_type"] = "text";
            $tmp["title"] = $from;
            $tmp["payload"] = $val;
            $arr[] = $tmp;
				}
			// }
			
	
}
$arr1 = json_encode($arr);
    $replay_message = '{
		"messaging_type":"RESPONSE",
		"recipient":{
			"id":"3042180345900194"
		},
		
        "message":{
          "text": "' . $name . '",
          "quick_replies":' . $arr1 . '
        }
    }';
}
if ($message == 'PAD THAI SPRING ROLL...' || $message == 'CURRY PUFF (V) (4PCS...' || $message == 'LARB MONEY BAGS (4PC...' || $message == 'SATAY CHICKEN (3 STI...' || $message == 'SATAY TOFU (4PCS)' || $message == 'FISH CAKES ( 5 PCS)' || $message == 'MIX ENTREE' || $message == 'CALAMARI RINGS' || $message == 'CRISPY PORK BELLY WI...' || $message == 'MASSAMAN LAMB SHANKS' || $message == 'BLACK PEPPER BEEF'){
	   $get_data = $get_data1=array();
  $config = new Config();
    $con = $config->connect();
    $sql= $con->query('Select * from `time`');
	if (mysqli_num_rows($sql) > 0) {
            $get_data = mysqli_fetch_assoc($sql);
        }
		$message1= str_replace('...','',$message);
		 $sql1= $con->query("Select * from sub_category_price where name like '%$message1%'");
	if (mysqli_num_rows($sql1) > 0) {
            $get_data1 = mysqli_fetch_assoc($sql1);
        }
	$query = 'INSERT INTO `sub_category` (time_id,day_id, `name`,price) VALUES ("' . $get_data['id']. '","' . $get_data['day_id']. '", "' . $message. '","' . $get_data1['price']. '")';
    $con->query($query);
   //  set_session_value('Sub_Category',$message);
	$val = 'Next Order';	
	 // $fields = array('shopId'=> 101, 'serviceId' => 1);
	 $api_data = get_data('get', 'itemCategory/get-all');
$name = '';
if($api_data){
					 $name .='Would you like to add another item to your order?'.'\n\n';
				  $val .= $api_data[$i]->name.'\n\n';
				
			// }
			
	
}
 $replay_message = '{
		"messaging_type":"RESPONSE",
		"recipient":{
			"id":"3042180345900194"
		},
		
  "message":{
    "text": "'.$name.'",
       "quick_replies":[
       {
        "content_type":"text",
        "title":"Add another item",
        "payload":"http://localhost/FB_Chatbot/FBChatbot.php",
		 "image_url":""
      },{
        "content_type":"text",
        "title":"Proceed to checkout",
        "payload":"http://localhost/FB_Chatbot/FBChatbot.php",
      }
    ]
  }
  
		
	}';
}
if ($message == 'Add another item') {
	$val = 'Select dishes';
    // $fields = array('shopId'=> 101, 'serviceId' => 1);
    $api_data = get_data('get', 'itemCategory/get-all');
    $from = '';
    $arr = $arr1 = array();
    if ($api_data) {
		
        foreach ($api_data as $value) {
           //  $name .= trim($value->name) . '\n\n';
		   $name = 'Please select food category'.'\n\n';
			$from = $value->name;

            $tmp = array();
            $tmp["content_type"] = "text";
            $tmp["title"] = $from;
            $tmp["payload"] = $val;
            $arr[] = $tmp;
        }
    }
	$arr1 = json_encode($arr);
    $replay_message = '{
		"messaging_type":"RESPONSE",
		"recipient":{
			"id":"3042180345900194"
		},
		
        "message":{
          "text": "' . $name . '",
          "quick_replies":' . $arr1 . '
        }
    }';
}
// https://developers.facebook.com/docs/messenger-platform/send-messages/quick-replies/#phone
if ($message == 'Proceed to checkout') {
$val = 'Phone';
$name = "Please type your phone number";
$val1 = 'true';
    $replay_message = '{
		"messaging_type":"RESPONSE",
		"recipient":{
			"id":"3042180345900194"
		},
		
 "message":{
	 "text": "'.$name.'",
    
    "quick_replies":[
      {
		  
        "content_type":"text",
        "title":"'.$val.'",
        "payload":"Phone"
      },
	        {
        "content_type":"text",
        "title":"Skip",
        "payload":"Phone"
      }
    ]
  }
		
	}';
}
if ($payload_quick == 'Phone') {
$val = 'Email';
$name = "Please enter your email address";
    $replay_message = '{
		"messaging_type":"RESPONSE",
		"recipient":{
			"id":"3042180345900194"
		},
		
 "message":{
	 "text": "'.$name.'",
    
    "quick_replies":[
      {
        "content_type":"text",
        "title":"'.$val.'",
        "payload":"Email"
      },
	  {
        "content_type":"text",
        "title":"Skip Email",
        "payload":"http://localhost/FB_Chatbot/FBChatbot.php"
      }
    ]
  }
		
	}';
}
if ($payload_quick == 'Email') {//'Proceed to checkout') {
    
    $val = 'Confirm order';
      $day = $time = $category = $sub_category =array();
  $config = new Config();
    $con = $config->connect();
    $sql1= $con->query('Select * from `day`');
	if (mysqli_num_rows($sql1) > 0) {
            $day = mysqli_fetch_assoc($sql1);
        }
	    $sql2= $con->query('Select * from `time`');
	if (mysqli_num_rows($sql2) > 0) {
            $time = mysqli_fetch_assoc($sql2);
        }
		/*    $sql3= $con->query("Select * from `category` where day_id='".$day['id']."' and time_id='".$time['id']."'");
		if (mysqli_num_rows($sql3) > 0) {
           while ($row = mysqli_fetch_assoc($sql3)) {
                $category[] = $row;
            }
        }*/
		$total = 0;
		  		    $sql4= $con->query("Select * from `sub_category` where day_id='".$day['id']."' and time_id='".$time['id']."'");
		if (mysqli_num_rows($sql4) > 0) {
           while ($row = mysqli_fetch_assoc($sql4)) {
                $sub_category['name'][] = $row['name'];
				$sub_category['price'][] = $row['price'];
				$total += $row['price'];
            }
        }
    $api_data = get_data('get', 'company/get-info');
	
//  $api_data = get_data('get', 'company/get-online-services');
    $name = '';
  
	// $day = $_SESSION['Day'];
	$weekday = $day['name'];
	$date = date('Y-m-d');
	
	$getdate = '';
	for($i = 1; $i <= 6; $i++){
		if($weekday != $day['name']){
			$date = date('Y-m-d', strtotime('+1 day', strtotime($date)));
			$weekday = date('l', strtotime($date));
		}
		if($weekday == $day['name']){
		  $getdate = $date;
		}
	}

    if ($api_data) {
        foreach ($api_data as $value) {
		//	$name .= get_session_value('Day'). '\n\n';
		
		$name .= '*-:ORDER DETAILS:-*\n\n';
            $name .= '*SHOP :*\n\n' . trim($value->name) . '\n\n';
            // $name .= '<img src="'.$value->smallIcon.'">'.'\n\n';
        }
    }
    
   // if(isset($_SESSION)){
		$name .= '*PICKUP :*\n\n' . date('d/m/Y', strtotime($getdate)) . ' (' . $day['name'] . ') ' . $time['name'].'\n\n';
		$name .= '*Customer Detail :*\n\n'; // (Guest) as a
        if ($profile = get_profile_info($access_token)) {
            $name .= '(' . $profile['first_name'] . ' ' . $profile['last_name'] . ')\n\n';
        }
		// Display category detaion on confirm order
		/*	$name .= '*CATEGORY :*\n\n';
			if($category){
				foreach($category as $val){
					$name .= $val['name'].'\n\n';
					
				}
			}
			*/
    /*  while ($row = mysqli_fetch_assoc($sql3)) {
                $name .= $row['name'].'\n\n';
            }*/
			$name .= '*SUB_CATEGORY :*\n\n';
	if($sub_category['name']){
				foreach($sub_category['name'] as $key => $val){
					
					$name .= $sub_category['name'][$key] . ' => $' . $sub_category['price'][$key] .'\n\n';
									
				}
			}
			$name .= '*TOTAL :* $' .$total.'\n\n';
			$gst = (15*$total)/100;
			$name .= '*Total includes GST of:* $' .$gst.'\n\n';
			$name .= "Do you want to confirm the above order?";
			
       //  session_destroy();
  //   }
  
    $replay_message = '{
		"messaging_type":"RESPONSE",
		"recipient":{
			"id":"3042180345900194"
		},
		
 "message":{
	 "text": "'.$name.'",
    
    "quick_replies":[
      {
        "content_type":"text",
        "title":"Yes",
        "payload":"http://localhost/FB_Chatbot/FBChatbot.php",
        "image_url":""
      },{
        "content_type":"text",
        "title":"No",
        "payload":"http://localhost/FB_Chatbot/FBChatbot.php",
        "image_url":"http://example.com/img/green.png"
      }
    ]
  }
		
	}';
}
if ($message == 'Yes') {

	$val = 'Confirm order';	
	 $name .='Thank you very much for your order'.'\n\n';
	  $config = new Config();
    $con = $config->connect();
    $sql= $con->query('TRUNCATE TABLE `day`');
	$sql= $con->query('TRUNCATE TABLE `time`');
	$sql= $con->query('TRUNCATE TABLE `category`');
	$sql= $con->query('TRUNCATE TABLE `sub_category`');
    
 $replay_message = '{
		"messaging_type":"RESPONSE",
		"recipient":{
			"id":"3042180345900194"
		},
		
  "message":{
    "text": "'.$name.'",
  }	
	}';
}
if ($message == 'No') {

	$val = 'Cancel order';	
   $replay_message = '{
		"messaging_type":"RESPONSE",
		"recipient":{
			"id":"3042180345900194"
		},
		
  "message":{
	
    "text": "What do you want to do with your order.",
     "quick_replies":[
      {
        "content_type":"text",
        "title":"Add a new item",
        "payload":"http://localhost/FB_Chatbot/FBChatbot.php",
        "image_url":""
      },{
        "content_type":"text",
        "title":"Delete Order",
        "payload":"http://localhost/FB_Chatbot/FBChatbot.php",
        "image_url":"http://example.com/img/green.png"
      },{
        "content_type":"text",
        "title":"Cancel Order",
        "payload":"http://localhost/FB_Chatbot/FBChatbot.php",
        "image_url":"http://example.com/img/green.png"
      }
    ]
  }	
	}';
}
if ($message == 'Add a new item') {
	$val = 'Select dishes';
    // $fields = array('shopId'=> 101, 'serviceId' => 1);
    $api_data = get_data('get', 'itemCategory/get-all');
    $from = '';
    $arr = $arr1 = array();
    if ($api_data) {
		
        foreach ($api_data as $value) {
           //  $name .= trim($value->name) . '\n\n';
		   $name = 'Please select food category'.'\n\n';
			$from = $value->name;

            $tmp = array();
            $tmp["content_type"] = "text";
            $tmp["title"] = $from;
            $tmp["payload"] = $val;
            $arr[] = $tmp;
        }
    }
	$arr1 = json_encode($arr);
    $replay_message = '{
		"messaging_type":"RESPONSE",
		"recipient":{
			"id":"3042180345900194"
		},
		
        "message":{
          "text": "' . $name . '",
          "quick_replies":' . $arr1 . '
        }
    }';
}
if ($message == 'Delete Order') {
    $val = 'Delete order';
	$arr = $arr1 = array();
      $day = $time = $category = $sub_category =array();
  $config = new Config();
    $con = $config->connect();
    $sql1= $con->query('Select * from `day`');
	if (mysqli_num_rows($sql1) > 0) {
            $day = mysqli_fetch_assoc($sql1);
        }
	    $sql2= $con->query('Select * from `time`');
	if (mysqli_num_rows($sql2) > 0) {
            $time = mysqli_fetch_assoc($sql2);
        }
		  		    $sql4= $con->query("Select * from `sub_category` where day_id='".$day['id']."' and time_id='".$time['id']."'");
		if (mysqli_num_rows($sql4) > 0) {
           while ($row = mysqli_fetch_assoc($sql4)) {
                $sub_category['name'][] = $row['name'];
				$sub_category['price'][] = $row['price'];
            }
        }
	$name .= '*SUB_CATEGORY :*\n\n';
	if($sub_category['name']){
				foreach($sub_category['name'] as $key => $val){
					
					// $name .= $sub_category['name'][$key] . ' => ' . $sub_category['price'][$key] .'\n\n';
				$from = 'D: '. $sub_category['name'][$key];
				$tmp = array();
            $tmp["content_type"] = "text";
            $tmp["title"] = $from;
            $tmp["payload"] = "http://localhost/FB_Chatbot/FBChatbot.php";
            $arr[] = $tmp;
				}
			}
			
			$name .= "Which items do you want to delete?";
$arr1 = json_encode($arr);
    $replay_message = '{
		"messaging_type":"RESPONSE",
		"recipient":{
			"id":"3042180345900194"
		},
		
        "message":{
          "text": "' . $name . '",
          "quick_replies":' . $arr1 . '
        }
    }';
}
if ($message == 'D: PAD THAI SPRING R...' || $message == 'D: CURRY PUFF (V) (4...' || $message == 'D: LARB MONEY BAGS (...' || $message == 'D: SATAY CHICKEN (3 ...' || $message == 'D: SATAY TOFU (4PCS)' || $message == 'D: FISH CAKES ( 5 PCS)' || $message == 'D: MIX ENTREE' || $message == 'D: CALAMARI RINGS' || $message == 'D: CRISPY PORK BELLY...' || $message == 'D: MASSAMAN LAMB SHA...' || $message == 'D: BLACK PEPPER BEEF'){
// delete the item
$config = new Config();
    $con = $config->connect();
	$value = str_replace('D: ','',$message);
	$value = str_replace('...','',$value);
    $sql1= $con->query("delete from `sub_category` where name like '%".$value."%'");
			
			$name = "Do you want to another item delete?";
	$replay_message = '{
		"messaging_type":"RESPONSE",
		"recipient":{
			"id":"3042180345900194"
		},
		
 "message":{
	 "text": "'.$name.'",
    
    "quick_replies":[
      {
        "content_type":"text",
        "title":"Y",
        "payload":"http://localhost/FB_Chatbot/FBChatbot.php",
        "image_url":""
      },{
        "content_type":"text",
        "title":"N",
        "payload":"http://localhost/FB_Chatbot/FBChatbot.php",
        "image_url":"http://example.com/img/green.png"
      }
    ]
  }
		
	}';
}
if ($message == 'Y'){
// delete the item
$config = new Config();
    $con = $config->connect();
	
	$arr = $arr1 = array();
      $day = $time = $category = $sub_category =array();
  $config = new Config();
    $con = $config->connect();
    $sql1= $con->query('Select * from `day`');
	if (mysqli_num_rows($sql1) > 0) {
            $day = mysqli_fetch_assoc($sql1);
        }
	    $sql2= $con->query('Select * from `time`');
	if (mysqli_num_rows($sql2) > 0) {
            $time = mysqli_fetch_assoc($sql2);
        }
		  		    $sql4= $con->query("Select * from `sub_category` where day_id='".$day['id']."' and time_id='".$time['id']."'");
		if (mysqli_num_rows($sql4) > 0) {
           while ($row = mysqli_fetch_assoc($sql4)) {
                $sub_category['name'][] = $row['name'];
				$sub_category['price'][] = $row['price'];
            }
        }
	$name .= '*SUB_CATEGORY :*\n\n';
	if($sub_category['name']){
				foreach($sub_category['name'] as $key => $val){
					
					// $name .= $sub_category['name'][$key] . ' => ' . $sub_category['price'][$key] .'\n\n';
				$from = 'D: '. $sub_category['name'][$key];
				$tmp = array();
            $tmp["content_type"] = "text";
            $tmp["title"] = $from;
            $tmp["payload"] = "http://localhost/FB_Chatbot/FBChatbot.php";
            $arr[] = $tmp;
				}
			}
			
			$name .= "Which items do you want to delete?";
$arr1 = json_encode($arr);
    $replay_message = '{
		"messaging_type":"RESPONSE",
		"recipient":{
			"id":"3042180345900194"
		},
		
        "message":{
          "text": "' . $name . '",
          "quick_replies":' . $arr1 . '
        }
    }';
}
if ($message == 'N') {
 $name = "Now your item must be deleted";
$replay_message = '{
		"messaging_type":"RESPONSE",
		"recipient":{
			"id":"3042180345900194"
		},
		
  "message":{
    "text": "'.$name.'",
       "quick_replies":[
       {
        "content_type":"text",
        "title":"Proceed to checkout",
        "payload":"http://localhost/FB_Chatbot/FBChatbot.php",
		 "image_url":""
      },{
        "content_type":"text",
        "title":"Cancel Order",
        "payload":"http://localhost/FB_Chatbot/FBChatbot.php",
      }
    ]
  }
  
		
	}';
}
if ($message == 'Cancel Order') {

	$val = 'Confirm order';	
	 $name .='Your order is now cancelled'.'\n\n';
	  $config = new Config();
    $con = $config->connect();
    $sql= $con->query('TRUNCATE TABLE `day`');
	$sql= $con->query('TRUNCATE TABLE `time`');
	$sql= $con->query('TRUNCATE TABLE `category`');
	$sql= $con->query('TRUNCATE TABLE `sub_category`');
    
 $replay_message = '{
		"messaging_type":"RESPONSE",
		"recipient":{
			"id":"3042180345900194"
		},
		
  "message":{
    "text": "'.$name.'",
  }	
	}';
}
if ($message == 'Sushi Bento' || $message == 'Sushi Platters') {
	$val = 'Select this Shop';
	// $api_data = get_data('get', 'region-shop/get-all');
	 $fields = array('serviceId' => 1);
	$api_data = get_data('post', 'region-shop/get-all', $fields);
	$name = '';
    if($api_data){
      
			foreach($api_data->shops as $value){
				$name = trim($value->name);
				
			}
    }
	
    $replay_message = '{
		"messaging_type":"RESPONSE",
		"recipient":{
			"id":"3042180345900194"
		},
		
  "message":{
    "text": "'.$name.'",
    "quick_replies":[
      {
        "content_type":"text",
        "title":"'.$val.'",
        "payload":"http://localhost/FB_Chatbot/FBChatbot.php",
     
      }
    ]
  }
  
		
	}';
}

send_reply($access_token, $replay_message);

function send_reply($access_token = '', $reply = '') {
    $url = "https://graph.facebook.com/v2.6/me/messages?access_token=$access_token";
    $ch = curl_init();
    $headers = array("Content-type: application/json");
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $reply);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $st = curl_exec($ch);
    $result = json_decode($st, TRUE);
    return $result;
}
function get_profile_info($access_token = '') {
    $url = "https://graph.facebook.com/3042180345900194?fields=first_name,last_name,profile_pic&access_token=$access_token";
    $ch = curl_init();
    $headers = array("Content-type: application/json");
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $st = curl_exec($ch);
    $result = json_decode($st, TRUE);
    return $result;
}


?>
