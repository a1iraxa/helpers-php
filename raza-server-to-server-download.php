<?php 

set_time_limit(0); // unlimited max execution time

// Initialize a file URL to the variable 
$url = 'https://proactivemensmedical.com/wp-content/ai1wm-backups/proactivemensmedical.com-20210802-190256-8bcwbe.wpress'; 
  
// Initialize the cURL session 
$ch = curl_init($url); 
  
// Inintialize directory name where file will be save 
$dir = './'; 
  
// Use basename() function to return the base name of file  
$file_name = basename($url); 
  
// Save file into file location 
$save_file_loc = $dir . $file_name; 
  
// Open file  
$fp = fopen($save_file_loc, 'wb'); 
  
// It set an option for a cURL transfer 
curl_setopt($ch, CURLOPT_FILE, $fp); 
curl_setopt($ch, CURLOPT_HEADER, 0); 
  
// Perform a cURL session 
curl_exec($ch); 
  
// Closes a cURL session and frees all resources 
curl_close($ch); 
  
// Close file 
fclose($fp); 

