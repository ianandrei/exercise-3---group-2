<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Operations</title>
    <style>
        .container {
            width: 80%; 
            margin: 0 auto;
            text-align: center;
        }
        pre {
            text-align: left; 
            background-color: #f4f4f4;
            padding: 10px; 
            border: 1px solid #ddd; 
        }
    </style>
</head>
<body>
    <div class="container" style="background-color: #e0e0e0; padding: 20px;">
        <?php
        $filename = 'data.txt';

        
        if (file_exists($filename)) {  
            
            $dataToWrite = "\n";
            $writeResult = file_put_contents($filename, $dataToWrite, FILE_APPEND);
            
            if ($writeResult === false) {
                echo "<div style='color: red;'>Failed to write to the file.</div><br>";
            } else {
                echo "<div style='color: green;'>Successfully wrote to the file.</div><br>";
            }

           
            $fileContent = file_get_contents($filename);
            if ($fileContent === false) {
                echo "<div style='color: red;'>Failed to read the file.</div><br>";
            } else {
                echo "<div style='font-size: 16px; margin-bottom: 10px;'>Content of the file:</div>";
                echo "<pre>" . htmlspecialchars($fileContent) . "</pre>";

                $fileLines = file($filename, FILE_IGNORE_NEW_LINES);
                if ($fileLines === false) {
                    echo "<div style='color: red;'>Failed to read the file lines.</div><br>";
                } else {
                    echo "<div style='font-size: 16px; margin-bottom: 10px;'>File lines:</div>";
                    foreach ($fileLines as $line) {
                        echo "<div style='color: #333;'>" . htmlspecialchars($line) . "</div><br>";
                    }
                }
            }
        } else {
           
            echo "<div style='color: red;'>The file '$filename' does not exist.</div><br>";
           
        }
        ?>
    </div>
</body>
</html>
