<?php
$row = 1;
$target = '20';
$articleHtml = "";


if (($handle = fopen("test.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        // echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        if ($data[11] == $target) {
            echo "<h1> Happy Christmas $data[1] <br /></h1>\n";
            $articleHtml .= "<timeline-text>".$data[1]."</timeline-text>";
        }
        
        //for ($c=0; $c < $num; $c++) {
        //    echo $data[$c] . "<br />\n";
        //}
    }
    fclose($handle);
}

echo $articleHtml;

?>