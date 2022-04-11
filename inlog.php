<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">

<link rel="stylesheet" href="styles.css">

    <ul>
        <li class="terugg"><a class="terug" href="hoofdpagina.html">Terug</a></li>
    </ul>
    <br>


<main class="container">

    <form method="POST">

      username: <input class="form-control" type="name" name="name" required/>
      <br>
      password <input class="form-control" type="password" name="password" required/>

        <button class="btn btn-light" type="submit" name ="login">inloggen</button>

        <a class="btn btn-warning mt-3" href ="inloggen.php">AANMELDING</a>
</form>

<?php

//select het informatie en controleren

if(isset($_POST['login'])){

    $username = "root";
    $password = "";
    $database = new PDO("mysql:host=localhost; dbname=game;",$username,$password);
    

      $login = $database->prepare("SELECT * FROM inlogg WHERE Name = :name AND Password = :password");
      $login->bindParam("name",$_POST['name']);
      $login->bindParam("password",$_POST['password']);
      $login->execute();

if($login->rowCount()===1){

      $user = $login-> fetchObject();
      echo 'Hallo :' .$user->Name;
     echo '<a class="terug" href ="hoofdpagina.html">clik</a>';

}else{
    echo'fout';
}


}

?>
</main>

