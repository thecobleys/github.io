<?php
$row = 1;

$headerHtml = '<!DOCTYPE html>
<html lang="en">

<head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-P3E4WQH208"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag("js", new Date());

  gtag("config", "G-P3E4WQH208");
</script>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Happy Christmas from Dan and Zella</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="splide/splide.min.css" />
</head>

  <script src="index.js"></script>
  <script src="splide/splide.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="js/fittext.js"></script>

  <timeline-section id="timeline-section0">


    <!-- <timeline-title>Happy Christmas</timeline-title> -->
    <div >
      <img style="width:100%;" src="img/santa_vertical.jpg" />
      <timeline-title class="centered" id= "centred_text"><p>Happy Christmas ';
$midHtml = '</p>
<a href="#timeline-section1" class="Arrow"></a>
</timeline-title>


</div>



</timeline-section>
<timeline-section id="timeline-section1" style = "height: 100vw" >
<!-- <timeline-homepage id="timeline-column0"> -->
<timeline-me><a href="https://thecobleys.github.io" target="_blank" rel="noopener noreferrer"><img
  src="img/dan_zell_Westminster.jpg" /></a>
</timeline-me>
<timeline-text >
<div >
<p>
';

$endHtml = '</p>
</div>
<a href="#timeline-section2" class="Arrow"></a>




</timeline-text>
<!-- </timeline-homepage>  -->
</timeline-section>

<timeline-section id="timeline-section2">


<div >
<img style="width:100%;" src="img/santa_vertical.jpg" />
<timeline-text class="centered"><p>With mulled wine and smartphone in hand</p><p>
A Christmas card barcode was scanned </p><p>
It shared good festive cheer </p><p>
And a happy new year</p><p>
As Dan, Zell and Santa had planned! </p>
<a href="#footer" class="Arrow"></a>
</timeline-text>


</div>



</timeline-section>
</body>

<div>
<footer class = "footer-basic" id="footer">
<p>Artwork by Dan | Web design by <a href="bencobley.com">Ben</a> | Web build by Zella</p>
</footer>
</div>



</html>';


if (($handle = fopen("/Users/zellaking/Downloads/Christmas card list 2022.xlsx - Royal_Mail.csv", "r")) !== FALSE) {
    echo "File is readable";
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        // echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        print($data[13]);
        $articleHtml = $headerHtml;
        if ($data[13] != '' & $data[13] != 'Code') {
            echo "<$data[13]\n";
            $articleHtml .= trim($data[15]).
            $midHtml.trim($data[16]).$endHtml;

            // PHP needs permission to write to folder
            // Therefore let PHP attempt to create the folder
            // This will grant the permission 

            $filename = $data[13].'.html';
            $dir = '/Users/zellaking/Repos/thecobleys.github.io';

            if ( !file_exists($dir) ) {
                mkdir ($dir, 0744);
            }

            file_put_contents ($dir.'/'.$filename, $articleHtml );

            
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