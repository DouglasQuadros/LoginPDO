<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $pdo = require_once 'pdo/connection.php';
        $pas = password_hash('admin123', PASSWORD_DEFAULT);
        $sql = "insert into usuario (nomeUser, email, pas) values (?,?,?)";
        $statement = $pdo->prepare($sql);
        $statement->execute(['douglas','douglas@gmail.com',$pas]);
        
        foreach ($pdo->query('select * from usuario') as $row){
            print_r($row);
        }
        ?>
    </body>
</html>
