<?php

function getDirectory( $path = '.' ){ 

    $ignore = array('.', '..' ); 
    // Directories to ignore when listing output. Many hosts 
    // will deny PHP access to the cgi-bin. 

    $dh = @opendir( $path ); 
    // Open the directory to the 2handle $dh 
     
    while( false !== ( $file = readdir( $dh ) ) ){ 
    // Loop through the directory 
     
        if( !in_array( $file, $ignore ) ){ 
        // Check that this file is not to be ignored 
             
            // $spaces = str_repeat( '&nbsp;', ( $level * 4 ) ); 
            // Just to add spacing to the list, to better 
            // show the directory tree. 
             
            if( is_dir( "$path/$file" ) ){ 
            // Its a directory, so we need to keep reading down... 
             
                getDirectory( "$path/$file"); 
                // Re-call this same function but on a new directory. 
                // this is what makes function recursive. 
             
            } else { 
                        $ex = explode('.' ,$file);
                        $ex=end($ex);
                        if($ex=='png' || $ex=='jpg'){
                            echo "<br>". "<img width='320' height='240' src=\"$path/$file\" alt= srcset=>" ."<br>";
                        }else if($ex=='mp4'){
                          echo"
                           <video width='320' height='240' controls>
                               <source src=\"$path/$file\" type='video/mp4'>
                               </video>"."<br>";
                        }
                        else{
                            echo "<br>"."
                            <a href=\"$path/$file\">$file</a>"."<br>";
                        }
                    }
            } 
         
        } 
     
    } 

