<?php
function remove_folder($folder){
    if(is_dir($folder) === true){
        
        $folder_files= scandir($folder);
        unset($folder_files[0],$folder_files[1]);
        
        foreach($folder_files as $F => $F_Name){
            $currentPath = $folder.'/'.$F_Name;
            $filetype = filetype($currentPath);
            if($filetype == 'dir'){
                remove_folder($currentPath);
            }else{
                unlink($currentPath);
            }
            unset($folder_files[$F]);
        }
        rmdir($folder);
    }
    
}

function code_website() {
    # Alert Text File
    $alert_txt_path = 'User/alert.txt';
    if (file_exists($alert_txt_path)) {
        $alert = file_get_contents($alert_txt_path, true);
    }else {
        $alert = 'No Alert At This Time';
    }

    $e_homepage_file = fopen("../index.html", "w") or die("Unable to open file!");
    fwrite($e_homepage_file, "<html>\n");
    fwrite($e_homepage_file, "<head>\n");
    fwrite($e_homepage_file, "<title>UA Alert</title>\n");
    fwrite($e_homepage_file, "<meta charset=\"UTF-8\">\n");
    fwrite($e_homepage_file, "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n");
    fwrite($e_homepage_file, "<style>\n");
    fwrite($e_homepage_file, "body{\n");
    fwrite($e_homepage_file, "background-color:#fff;\n");
    fwrite($e_homepage_file, "color:#000;\n");
    fwrite($e_homepage_file, "font-family: Arial, Helvetica, sans-serif;\n");
    fwrite($e_homepage_file, "padding:10px;\n");
    fwrite($e_homepage_file, "}\n");
    fwrite($e_homepage_file, "h1{\n");
    fwrite($e_homepage_file, "font-size:30px;\n");
    fwrite($e_homepage_file, "}\n");
    fwrite($e_homepage_file, "</style>\n");
    fwrite($e_homepage_file, "</head>\n");
    fwrite($e_homepage_file, "<body>\n");
    fwrite($e_homepage_file, "<h1>Alert</h1>\n");
    fwrite($e_homepage_file, "<p>".$alert."</p>\n");  
    fwrite($e_homepage_file, "</body>\n");
    fwrite($e_homepage_file, "</html>\n");
    fclose($e_homepage_file);
    # Go To Website
    header("Location: ../index.html");
    # Remove UA Alert From Server
    remove_folder("../uaalert");
}
?>