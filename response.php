<!DOCTYPE html>
<!-- saved from url=(0037)feedback/response -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
          
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="Souvik Das">
            <title>Love And Latte - Feedback</title>
            
            <link href="assets/css/images/logo.png" rel="shortcut icon">
            <link type="text/css" href="assets/css/jquery-ui-1.10.4.css" rel="stylesheet">
            
            <link type="text/css" href="assets/css/font-awesome.min.css" rel="stylesheet">
            <link type="text/css" href="assets/css/star-rating.min.css" rel="stylesheet">
            <link type="text/css" href="assets/css/theme.min.css" rel="stylesheet">
            <link type="text/css" href="assets/css/feedback.css" rel="stylesheet">   
            <link href="assets/css/css" rel="stylesheet">
                                    
            
    </head>
       
    <body>
          <div class="site-wrapper">
            <div class="site-wrapper-inner">
                       <div class="container">
                           <div class="header clearfix">
                                <center>
                                  <h1>GANESH DALVI (CPF)</h1><hr>
                          
                               </center>
                           </div>
                       </div> 
                         <div class="container">
                                <div class="row">
                                 <div class="col-xs-12">
                                     <a style="color:white" href="index.php"> <h3 style="text-align: left"><span >&#xab;</span>&nbsp;Back</h3></a>
                                 </div>
                              </div>
                                </div>
                                 <div class="container">
                             <div class="row">
                                 <center>
                                 <h2><b>Thank You for you feedback</b></h2>
                                 </center>
                             
                                 
    
           </div>

                             </div>
                                   <br>
                               <center>
                                   Powered by <img src="assets/css/images/yourtake.png" width="50" height="25">
                               </center>
                         </div>
                </div>
        
    <center>
 <?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$dbc = mysql_connect('localhost', 'root', 'root');

if(!$dbc){
    die("Not connected".mysql_error());
}
$db_selected = mysql_select_db("yourtake",$dbc);

if(!$db_selected){
    die("DB Not selected".mysql_error());
}

$name=  mysql_real_escape_string($_POST['name']);
$email=  mysql_real_escape_string($_POST['email']);
$number=  mysql_real_escape_string($_POST['number']);
        
$relevance=  mysql_real_escape_string($_POST['relevance']);
$materials = mysql_real_escape_string($_POST['materials']);
$instructions = mysql_real_escape_string($_POST['instructions']);
$expectations = mysql_real_escape_string($_POST['expectations']);
$length = mysql_real_escape_string($_POST['length']);
$presentation = mysql_real_escape_string($_POST['presentation']);
$content = mysql_real_escape_string($_POST['content']);
$enjoy= mysql_real_escape_string($_POST['enjoy']);
$learn= mysql_real_escape_string($_POST['learn']);
$implement= mysql_real_escape_string($_POST['implement']);
$subscribe= mysql_real_escape_string($_POST['subscribe']);

$ipaddress= mysql_real_escape_string($_SERVER['REMOTE_ADDR']);
$date= date("Y-m-d");

   $retval1 = mysql_query( 'INSERT INTO client_reply '.'(name,number, email, date, answer,question,ipaddress,type) '.'VALUES ("'.$name.'", "'.$number.'","'.$email.'", "'.$date.'","'.$relevance.'","relevance","'.$ipaddress.'","" )', $dbc );
    $retval2 = mysql_query( 'INSERT INTO client_reply '.'(name,number, email, date, answer,question,ipaddress,type) '.'VALUES ("'.$name.'", "'.$number.'","'.$email.'", "'.$date.'","'.$materials.'","materials","'.$ipaddress.'","" )', $dbc );
    $retval3 = mysql_query( 'INSERT INTO client_reply '.'(name,number, email, date, answer,question,ipaddress,type) '.'VALUES ("'.$name.'", "'.$number.'","'.$email.'", "'.$date.'","'.$instructions.'","instructions","'.$ipaddress.'","" )', $dbc );
    $retval4 = mysql_query( 'INSERT INTO client_reply '.'(name,number, email, date, answer,question,ipaddress,type) '.'VALUES ("'.$name.'", "'.$number.'","'.$email.'", "'.$date.'","'.$expectations.'","expectations","'.$ipaddress.'","" )', $dbc );
    $retval5 = mysql_query( 'INSERT INTO client_reply '.'(name,number, email, date, answer,question,ipaddress,type) '.'VALUES ("'.$name.'", "'.$number.'","'.$email.'", "'.$date.'","'.$length.'","length","'.$ipaddress.'","" )', $dbc );
    $retval6 = mysql_query( 'INSERT INTO client_reply '.'(name,number, email, date, answer,question,ipaddress,type) '.'VALUES ("'.$name.'", "'.$number.'","'.$email.'", "'.$date.'","'.$presentation.'","presentation","'.$ipaddress.'","" )', $dbc );
    $retval7 = mysql_query( 'INSERT INTO client_reply '.'(name,number, email, date, answer,question,ipaddress,type) '.'VALUES ("'.$name.'", "'.$number.'","'.$email.'", "'.$date.'","'.$content.'","content","'.$ipaddress.'","" )', $dbc );
    $retval8 = mysql_query( 'INSERT INTO client_reply '.'(name,number, email, date, answer,question,ipaddress,type) '.'VALUES ("'.$name.'", "'.$number.'","'.$email.'", "'.$date.'","'.$enjoy.'","enjoy","'.$ipaddress.'","" )', $dbc );
    $retval9 = mysql_query( 'INSERT INTO client_reply '.'(name,number, email, date, answer,question,ipaddress,type) '.'VALUES ("'.$name.'", "'.$number.'","'.$email.'", "'.$date.'","'.$learn.'","learn","'.$ipaddress.'","" )', $dbc );
    $retval10 = mysql_query( 'INSERT INTO client_reply '.'(name,number, email, date, answer,question,ipaddress,type) '.'VALUES ("'.$name.'", "'.$number.'","'.$email.'", "'.$date.'","'.$implement.'","implement","'.$ipaddress.'","" )', $dbc );
    $retval11 = mysql_query( 'INSERT INTO client_reply '.'(name,number, email, date, answer,question,ipaddress,type) '.'VALUES ("'.$name.'", "'.$number.'","'.$email.'", "'.$date.'","'.$subscribe.'","subscribe","'.$ipaddress.'","" )', $dbc );
        
if(!($retval1&&$retval2&&$retval3&&retval4&&retval5&&$retval6&&$retval7&&$retval8&&$retval9&&$retval10&&retval11)){
    
    die("Not updated".mysql_error());
}
$dbc->close();
echo '~'
   ?>
    </center>
</body></html>