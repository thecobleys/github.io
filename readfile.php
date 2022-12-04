<?php
$row = 1;
$target = 'ESOU';

$headerHtml = '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Happy Christmas from Dan and Zella</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../splide/splide.min.css" />
  </head>
  <body>
    <script src="../index.js"></script>
    <script src="../splide/splide.min.js"></script>
    <script src="../https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <timeline-section id="timeline-section0">


      <timeline-title>Happy Christmas</timeline-title>
      <div id="carousel0" >
        <img src="../img/santa_vertical.jpg" />
        <timeline-text>
        <div class="centered">Dear ';
$midHtml = ', congratulations on making it through the bar code hurdle!       <a>See more below</a>
</timeline-text>
</div>

</div>


</timeline-section>
<timeline-section id="timeline-section1">
<timeline-homepage id="timeline-column0">
<timeline-me
  ><a
    href="https://thecobleys.github.io"
    target="_blank"
    rel="noopener noreferrer"
    ><img src="../img/dan_zell_Westminster.jpg" /></a
></timeline-me>
<timeline-text>
';

$endHtml = '        </timeline-text>
</timeline-homepage>
</timeline-section>

</body>
</html>';


$articleHtml = $headerHtml;

if (($handle = fopen("/Users/zellaking/Downloads/Christmas card list 2022.xlsx - Royal_Mail.csv", "r")) !== FALSE) {
    echo "File is readable";
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo $data[13];
        // echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        if ($data[12] == $target) {
            echo "<h1> Happy Christmas $data[1] <br /></h1>\n";
            $articleHtml .= $data[1].
            $midHtml.$data[12].$endHtml;

            // $filename = $data[11].'.txt';
            $dir = $data[12];

            if ( !file_exists($dir) ) {
                mkdir ($dir, 0744);
            }

            file_put_contents ($dir.'/hello.html', $articleHtml );

            
            // if (is_writable($filename)) {

            //     // In our example we're opening $filename in append mode.
            //     // The file pointer is at the bottom of the file hence
            //     // that's where $somecontent will go when we fwrite() it.
            //     if (!$fp = fopen($filename, 'a')) {
            //         echo "Cannot open file ($filename)";
            //         exit;
            //     }

            //     // Write $somecontent to our opened file.
            //     if (fwrite($fp, $articleHtml ) === FALSE) {
            //         echo "Cannot write to file ($filename)";
            //         exit;
            //     }

            //     echo "Success, wrote ($articleHtml) to file ($filename)";

            //     fclose($fp);

            // } else {
            //     echo "The file $filename is not writable";
            // }

        }
        
        //for ($c=0; $c < $num; $c++) {
        //    echo $data[$c] . "<br />\n";
        //}
    }
    fclose($handle);
} else {
    echo "The file is not readable";
}



// echo $articleHtml;

?>