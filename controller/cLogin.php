<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cLogin
 *
 * @author Douglas
 */
class cLogin {
    //put your code here
    
    public function logar() {
        if(isset($_POST['logar'])){
            $email = $_POST['email'];
            $pas = $_POST['pas'];
            
            $pdo = require_once '../pdo/connection.php';
            $sql = "select * from usuario where email = ? and pas = ?";
            
            $statement = $pdo->prepare($sql);
            $statement->execute([$email,]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $count = $statement->rowCount();
            
            if($Count() > 0){
                if(password_verify($pas, $result['pas'])){
                    session_start();
                    $_SESSION['usuario'] = $result['nomeUser'];
                    $_SESSION['email'] = $result['email'];
                    $_SESSION['logado'] = true;
                    header("Location: cadUsuario.php");
                    
                    
                }
            }else{
                echo "<br>Não foi possivel logar!";
                header("Location: login.php");
            }
            unset($statement);
            unset($pdo);
            unset($result);
        }
        
    }
}
