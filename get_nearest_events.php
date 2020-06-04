<!DOCTYPE html>
<?php
require("config.php");
require("gen_elements.php");
session_start();
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    function haversine($lat1, $lon1, 
                   $lat2, $lon2) 
    { 
        // distance between latitudes 
        // and longitudes 
        $dLat = ($lat2 - $lat1) * 
                    M_PI / 180.0; 
        $dLon = ($lon2 - $lon1) *  
                    M_PI / 180.0; 
    
        // convert to radians 
        $lat1 = ($lat1) * M_PI / 180.0; 
        $lat2 = ($lat2) * M_PI / 180.0; 
    
        // apply formulae 
        $a = pow(sin($dLat / 2), 2) +  
            pow(sin($dLon / 2), 2) *  
                cos($lat1) * cos($lat2); 
        $rad = 6371; 
        $c = 2 * asin(sqrt($a)); 
        return $rad * $c; 
    } 
    if (isset($_POST['latitude']))
    {
        $latitude = mysqli_real_escape_string($con, $_POST['latitude']);
    }
    else
    {
        $latitude = 37.9839;
    }
    if (isset($_POST['longitude']))
    {
        $longitude = mysqli_real_escape_string($con, $_POST['longitude']);
    }
    else
    {
        $longitude = 37.9839;
    }
    
    $sql = "SELECT * FROM posts ORDER BY date_of_event ASC";
    $result = mysqli_query($con, $sql);
    $ids = [];
    //$dists = [];
    $results = [];
    $max_count = 10;
    $count = 0;
    while($row = mysqli_fetch_array($result))
    {
        $results[] = $row;
    }
    foreach ($results as &$row)
    {
        $d = haversine($latitude, $longitude, $row['latitude'], $row['longitude']);
        if ($d<100)
        {
            $ids[] = $row['id'];
            //$dists[] = $d;
            $count += 1;
            if ($max_count==$count)
            {
                break;
            }
        }   
    }
    if (count($ids)==0)
    {
        $max_count = 10;
        $count = 0;
        $new_ids = [];
        //$new_dists = [];
        foreach ($results as &$row)
        {
            $d = haversine($latitude, $longitude, $row['latitude'], $row['longitude']);
            $new_ids[] = $row['id'];
            //$new_dists[] = $d;
            $count += 1;
            if ($max_count==$count)
            {
                break;
            }  
        }
        if (count($new_ids)==0)
        {
            echo "<div align=\"center\" id=\"forum\" class=\"table-container container\">
            <table class=\"topics-table\">
            There are no events to be shown...
            </table>
            </div>";
        }
        else
        {
            //$dists = $new_dists;
            $ids = $new_ids;
            //array_multisort($dists, $ids);
            echo "<div id=\"forum\" class=\"table-container\">
                <table class=\"topics-table\">
                    <thead style=\"border-bottom:1px solid teal\">    
                        <tr>
                            <th scope=\"cοl\" 10%>Για Ημερομηνία</th>
                            <th scope=\"col\" 15%>Πόλη</th>
                            <th scope=\"col\" 60%>Θέμα</th>
                            <th scope=\"col\" 15%>Από</th>
                        </tr>
                        </thead>";
            foreach ($ids as &$id) {
                foreach ($results as &$row)
                {
                    if ($row['id']==$id)
                    {
                        $sql1 = "SELECT username FROM users WHERE email=\"".$row['poster_email']."\"";
                        $result1 = mysqli_query($con, $sql1);
                        $poster_username = mysqli_fetch_row($result1)[0];
                        echo "<tr>
                        <td>".$row['date_of_event']."</td>
                        <td><a class=\"city\" href = \"ActionCall_forum.php?search=".$row['city']."\">".$row['city']."</a></td>
                        <td><a class=\"post\" href = \"ActionCall_event.php?postId=".$row['id']."\">".$row['title']."</a></td>
                        <td><a class=\"user\" href = \"ActionCall_forum.php?username=".$poster_username."\">".$poster_username."</a></td>
                        </tr>";
                    }
                }
            }
            echo "
            </table>
            </div>";
        }
    }
    else
    {
        //array_multisort($dists, $ids);
        echo "<div id=\"forum\" class=\"table-container\">
            <table class=\"topics-table\">
                <thead style=\"border-bottom:1px solid teal\">    
                    <tr>
                        <th scope=\"cοl\" 10%>Για Ημερομηνία</th>
                        <th scope=\"col\" 15%>Πόλη</th>
                        <th scope=\"col\" 60%>Θέμα</th>
                        <th scope=\"col\" 15%>Από</th>
                    </tr>
                    </thead>";
        foreach ($ids as &$id) {
            foreach ($results as &$row)
            {
                if ($row['id']==$id)
                {
                    $sql1 = "SELECT username FROM users WHERE email=\"".$row['poster_email']."\"";
                    $result1 = mysqli_query($con, $sql1);
                    $poster_username = mysqli_fetch_row($result1)[0];
                    echo "<tr>
                    <td>".$row['date_of_event']."</td>
                    <td><a class=\"city\" href = \"ActionCall_forum.php?search=".$row['city']."\">".$row['city']."</a></td>
                    <td><a class=\"post\" href = \"ActionCall_event.php?postId=".$row['id']."\">".$row['title']."</a></td>
                    <td><a class=\"user\" href = \"ActionCall_forum.php?username=".$poster_username."\">".$poster_username."</a></td>
                    </tr>";
                }
            }   
        }
        echo "
        </table>
        </div>";
    }
}
?>
