<head>
    <style>
        table{
            text-align: center;
            border: 2px solid black;
        }
        th, td{
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>
<body>
<div class="row">    
    <?php
    if(isset($res)){        
        ?>
    <div class="col-12">
        <div>
            <table>
                <tr>
                    <th>Usuarios</th>
                </tr>
            <?php
                    foreach ($res as $row){
                        ?>
                <tr>
                    <td><?php echo $row['username'] ?></td>
                </tr>
                        <?php
                    }
            ?>
            </table>
        </div>
    </div>
    <?php
    }
