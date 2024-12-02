<?php 

if(isset($_POST['input_submit'])){

    include_once('config_db.php');

    $username = $_POST['input_username'];
    $email = $_POST['input_email'];
    $pass = $_POST['input_password'];
    $passConfirm = $_POST['input_confirmPassword'];

    if ($pass !== $passConfirm){
        echo "<script>
            alert('A sua senha não coincidem');
            window.history.back()
            </script>";
        exit();
    }
    
    
    $result_db = mysqli_query($conn, "INSERT INTO register(username, email, pass, confirmpass) 
                                      VALUES ('$username', '$email', '$pass', '$passConfirm')");



    if ($result_db) {
    echo "<script>
            alert('Registro inserido com sucesso!');
            window.location.href = 'index.php';
          </script>";
    } else {
    echo "<script>
            alert('Erro ao inserir registro: " . mysqli_error($conn) . "');
          </script>";
    }




}
?>