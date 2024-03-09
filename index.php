<style>
    .login {
        border: 5px solid black;
        width: 700px;
        height: 350px;

background-image: url(89045.jpg);
         background-size: cover;
         background-image: no-repeat;
         background-position: left;
        color: black;
        border-radius: 20px;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 75);

        background-position: center;
        overflow: hidden;
        text-align: center;
        margin-left: auto;
        margin-right: auto;
    }

    

    h1 {
        font-weight: normal;
        font-size: 24px;
        text-shadow: none;
        margin-bottom: 60px;
        color: black;
    }

    label {
        color:black;
        text-transform: uppercase;
        font-size: 10px;
        letter-spacing: 3px;
        padding-right: 20px;
    }

    input {
        background: white;
        height: 40px;
        line-height: 40px;
        border-radius: 20px;
        padding: 0px 20px;
        border: none;
        margin-bottom: 20px;
        color: black;
         
        margin: 10px 0px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 3);
    }
    body{
         background-color: whitesmoke;
    }
  
img {
    width: 220px;
    height: 180px;
    margin-right: 3px;
    border-radius: 50px;
    padding: 8px 16px;
     
    color: black;
    border-radius: 120px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 75);
}
 
</style>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

</head>

<body>
<header>
    <img src="nini.png">
</header>
    <div class="login">
        <h1>Page de connexion</h1>

        <form method="POST">
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" name="username" required> <br>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" required> <br>

            <input type="submit" value="Se connecter">

        </form>

        <?php
        //Verfifier si le formulaire a ete soumis
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Récuperer les valeurs du formulaire
            $username = $_POST['username'];
            $password = $_POST['password'];
            //Verifier les informations de connexion 
            if ($username === 'fall' && $password === '3112') {
                //Redirection vers la page de sécurisée 
                header('Location:nini.php');
                exit;
            } else {
                echo ' <p>Nom d\'utilisateur ou mot de passe incorrect. </p>';
            }
        }
        ?>
</body>

</html>