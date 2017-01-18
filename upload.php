<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$connected = @fsockopen("lovenlatte.yourtake.in", 80); 
                                        //website, port  (try 80 or 443)
    if ($connected){
        $is_conn = true; //action when connected
        fclose($connected);
    }else{
        $is_conn = false; //action in connection failure
    }
  
    if($is_conn){
                $dbc = mysql_connect('localhost', 'root', 'root');
                if(!$dbc){
                    die("Not connected".mysql_error());
                }

                $db_selected = mysql_select_db("yourtake",$dbc);
                if(!$db_selected){
                    die("DB Not selected".mysql_error());
                }

                $result = mysql_query("SELECT name,number, email, date, answer,question,ipaddress,type FROM client_reply");
                $ipaddress=null;
                $data = null;
                 $init=true;
                    $name=null;
                     $number=null;
                      $email=null;
                     $date=null;

                 while ($row = mysql_fetch_array($result)) { 

                                    echo 'entered<br/>';
                                if($init){
                                    echo 'new<br/>';
                                            $name=$row["name"];
                                            $number=$row["number"];
                                            $email=$row["email"];
                                            $date=$row["date"];
                                            $ipaddress=$row["ipaddress"];
                                            $type=$row["type"];
                                            $init=false;
                                            $data = array("name"=>$name,
                                                "number"=>$number,
                                                "email"=>$email,
                                                "date"=>$date,
                                                "ipaddress"=>$ipaddress,
                                                "type"=>$type);
                                }
                                //if same user
                                if($name==$row["name"]&&$number==$row["number"]&&$email==$row["email"]&&$date==$row["date"]&&$ipaddress==$row["ipaddress"]){
                                         echo 'same user<br/>';
                                        $answer=$row["answer"];
                                        $question=$row["question"];
                                        $data[$question]=$answer;
                                }
                                //if new user
                                else{
                                            try{
                                                        echo 'new user again. send data<br/>';
                                                        $ch = curl_init();
                                                        curl_setopt($ch, CURLOPT_URL,"http://lovenlatte.yourtake.in/feedback/response");
                                                        curl_setopt($ch, CURLOPT_POST, true);
                                                        echo http_build_query($data)."</br>";
                                                        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                                        $response = curl_exec($ch);
                                                        curl_close($ch);

                                                        echo 'new user again. delete data<br/>';
                                                        $delete_result =mysql_query( "DELETE FROM client_reply WHERE name='".$name."' AND number='".$number."' AND email='".$email."'" );
                                            }
                                            catch(Exception $e){

                                            }

                                                        echo 'new user again. create user<br/>';
                                            $name=$row["name"];
                                            $number=$row["number"];
                                            $email=$row["email"];
                                            $date=$row["date"];
                                            $ipaddress=$row["ipaddress"];
                                            $type=$row["type"];
                                            $data = array("name"=>$name,
                                                "number"=>$number,
                                                "email"=>$email,
                                                "date"=>$date,
                                                "ipaddress"=>$ipaddress,
                                                "type"=>$type,
                                                $question=>$answer);
                                }
                    }

                    //for last record
                    if(!$init){
                                try{
                                                echo 'new user again. send data<br/>';
                                                $ch = curl_init();
                                                curl_setopt($ch, CURLOPT_URL,"http://lovenlatte.yourtake.in/feedback/response");
                                                curl_setopt($ch, CURLOPT_POST, true);
                                                echo http_build_query($data)."</br>";
                                                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                                $response = curl_exec($ch);
                                                curl_close($ch);

                                                echo 'new user again. delete data<br/>';
                                                $delete_result =mysql_query( "DELETE FROM client_reply WHERE name='".$name."' AND number='".$number."' AND email='".$email."'" );
                                    }
                                    catch(Exception $e){

                                    }
                    }



                 $dbc->close();
  }
?>