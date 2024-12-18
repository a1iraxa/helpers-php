<?php 

// Set unlimited max execution time to prevent script timeout during long downloads
set_time_limit(0);

// Define the URL of the file to be downloaded
$url = 'https://proactivemensmedical.com/wp-content/ai1wm-backups/proactivemensmedical.com-20210802-190256-8bcwbe.wpress'; 

// Specify the directory where the downloaded file will be saved
$saveDir = './'; 

// Extract the base name of the file from the URL
$fileName = basename($url); 

// Construct the full file path by combining the directory and file name
$saveFilePath = $saveDir . $fileName; 

// Check if the directory exists and is writable before proceeding
if (!is_dir($saveDir) || !is_writable($saveDir)) {
    die("Error: Directory does not exist or is not writable: $saveDir\n");
}

// Open a file in write-binary mode to save the downloaded content
$fileHandle = fopen($saveFilePath, 'wb'); 
if ($fileHandle === false) {
    die("Error: Unable to open file for writing: $saveFilePath\n");
}

// Initialize a cURL session for downloading the file
$ch = curl_init($url); 
if ($ch === false) {
    fclose($fileHandle); // Ensure the file handle is closed if cURL initialization fails
    die("Error: Unable to initialize cURL session\n");
}

// Set cURL options
curl_setopt($ch, CURLOPT_FILE, $fileHandle); // Write the downloaded content directly to the file
curl_setopt($ch, CURLOPT_HEADER, 0); // Exclude headers from the downloaded data
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects if the URL is redirected
curl_setopt($ch, CURLOPT_FAILONERROR, true);    // Treat HTTP errors as failures
curl_setopt($ch, CURLOPT_TIMEOUT, 300);         // Set a timeout (in seconds) for the operation

// Execute the cURL session to download the file
if (!curl_exec($ch)) {
    $error = curl_error($ch); // Retrieve the error message from cURL
    fclose($fileHandle);      // Close the file handle
    curl_close($ch);          // Close the cURL session
    die("Error: cURL error: $error\n"); // Display the error and terminate the script
}

// Close the cURL session after successful execution
curl_close($ch); 

// Close the file to flush any remaining data and release resources
fclose($fileHandle); 

// Print a success message with the file's save location
echo "File downloaded successfully: $saveFilePath\n";
