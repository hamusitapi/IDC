<?php
   
    $servername = "localhost";
    $username = "root";
    $password = "123456";
    $dbname = "idc";
    // 创建连接
    $conn = new mysqli($servername, $username, $password, $dbname);
    // 检测连接
    if ($conn->connect_error) {
        die("数据库连接失败: " . $conn->connect_error);
    } 
    $result = mysqli_query($conn,"SELECT * FROM idc WHERE ID="."'".$_GET['idc']."'");
    
    $row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="zh_cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>个人IDC导航站</title>
    <link rel="stylesheet" href="style.1.css">
</head>
<body>
    <header>
        <h1>个人IDC导航站<small> - 专注个人IDC收录</small></h1>
    </header>
    <section style="height:600px">
        <h2><?php echo $row['website_name']; ?></h2>
        <p>爬取时间：<?php echo $row['found_time']; ?></p>
        <p>直达地址：<a href="<?php echo $row['website_link']; ?>" target="_blank"><?php echo $row['website_name']; ?></a></p>
        <p><?php echo $row['descriptions']; ?></p>
        
    </section>
    <?php $conn->close(); ?>
    <footer>
        <p><a href="">Copyright 个人IDC导航站 Rights Reserved.</a></p>
    </footer>
</body>
</html>