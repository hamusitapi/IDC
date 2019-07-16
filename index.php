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
    <section id="sh">
        <div id="flex_box" >
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
        $sql = "SELECT ID, website_name,website_link,admin_qq,admin_mail,found_time,descriptions FROM idc";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // 输出数据
            while($row = $result->fetch_assoc()) {
                echo '<div class="idc_block" title="查看详情" onclick="know('.$row["ID"].')">'.'<h3>'.$row["website_name"].'</h3>'.'<p>'. $row["descriptions"].'</p></div>';
            }
        } else {
            echo "0 结果";
        }
        $conn->close();
        ?>
        </div>
        <footer><p><a href="">Copyright 个人IDC导航站 Rights Reserved.</a></p></footer>
    </section>
    
    <script>
    function know(k) {
        window.open("/info.php?idc="+k)
            }
    </script>
</body>
</html>