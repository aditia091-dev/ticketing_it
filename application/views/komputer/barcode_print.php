<html>
    <head>
        <style type="text/css">
           * {
                box-sizing: border-box;
            }

            body {
                font-family: Arial, Helvetica, sans-serif;
                font-size :14px;
            }

             /* Float four columns side by side */
            .column {
                float: left;
                width: 20%;
                padding: 4px 4px 4px 4px;
            }

            /* Remove extra left and right margins, due to padding */
            .row {margin: 0 -2px;}

                /* Clear floats after the columns */
            .row:after {
                content: "";
                display: table;
                clear: both;
            }

            /* Responsive columns */
            @media screen and (max-width: 600px) {
            .column {
                    width: 100%;
                    display: block;
                    margin-bottom: 10px;
                }
            }

            /* Style the counter cards */
            .card {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                padding: 10px;
                text-align: center;
                background-color: #f1f1f1;
            }
        </style>
    </head>
    <body onload="window.print(); setTimeout(window.close, 0);">
        <div class="row">
            <?php
            foreach ($barcode as $r) {                
                echo '<div class="column"><div class="card">';
                echo"<img width='120' heigth='120' src=" . base_url() . 'barcode/' . $r['barcode'] . " >";
                echo '<p>'.$r['kode_komputer'].'</p> ';
                echo'</div></div>';                
            }
            ?>  
        </div> 
    </body>
</html>