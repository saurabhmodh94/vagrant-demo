<?php
    $conn = mysqli_connect('localhost:3306', 'root', 'root');
    if( !$conn ){
        die('Could not connect:'. mysqli_error());
    }
    echo 'Connected Successfully!';
    mysqli_select_db($conn, 'test');
    $query = "SELECT * FROM posts";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vagrant</title>
</head>

<body>
    <h1>Hello World</h1>
    <?php if(mysqli_num_rows($result) > 0): ?>
        <ul>
            <?php while($row= mysqli_fetch_object($result)): ?>
                <li>
                    <?php echo $row->msg; ?>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p>No Posts</p>
    <?php endif; ?>
</body>

</html>