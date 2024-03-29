<?php
    $sql = "SELECT db_ID, db_title, db_category, db_date, db_views FROM Metadata ORDER BY db_views DESC LIMIT 4";

    $query = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($query)) {
        
        $row_ID = $row['db_ID'];
        $row_Title = $row['db_title'];
        $row_Category = $row['db_category'];
        $row_Date = $row['db_date'];
        $row_views = $row['db_views'];

        if ($row_views > 1) {
            $row_views .= " views";
        } else {
            $row_views .= " view";
        }

        if  (strlen($row_Title) > 46) {
            $row_Title = substr($row_Title, 0, 45) . "...";
        }

        echo "
        <div class='column card is-one-quarter card has-text-centered'>
           <div class='card-content'>
                <figure class='image is-1by1'>
                    <a href='includes/previewprocess.inc.php?id=$row_ID'><img src='https://via.placeholder.com/100x150.png'></a>
                </figure> <br>
                <a class='title is-6' href='includes/previewprocess.inc.php?id=$row_ID'>
                    $row_Title
                </a>
           </div>

           <footer class='card-footer'>
                <p class='card-footer-item'>
                    Category: <a href='#'>$row_Category</a>
                </p>
                <p class='card-footer-item'>"
                    
                   . $row_views .
                    
                "</p>
           </footer>
        </div>
        
        ";
        //echo $row_Title;
        //echo $row_Author;
        //echo $row_Category;
        //echo $row_Date;
        //ang challenge na lang ay kung pano ilabas to ng naka-html form
    }
?>
