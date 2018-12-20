<?php
$json = file_get_contents("todo.json");
$parsed_json = json_decode($json);
$html1="";
$html2="";
                            if ($parsed_json)
                            {
                                foreach ($parsed_json as $value) {
                                    foreach ($value as $value2) {
                                        if(!empty(trim($value2[0]))) { 
                                            if($value->statut == true){
                                                $html1 .= '<li><p><label><input type=checkbox name=tic[] value='.$value->id.' ><span>'.$value2.'</span></label></p></li>';
                                               
                                            }
                                            else{
                                               
                                            }
                                    }
                                }
                            }
                        }
                           


//                            ------------

                            if ($parsed_json)
                            {
                                foreach ($parsed_json as $value) {
                                    foreach ($value as $value2) {
                                        if(!empty(trim($value2[0]))) { 
                                            if ($value->statut== false){
                                                $html2 .= '<p><label><s>'.'<span>'.$value2.'</span></s></label></p>'; 
                                            }
                                        }
                                    }
                                }
                            }
                            

             //   ----------------

             


                    
                ?>