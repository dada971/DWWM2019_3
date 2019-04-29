<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <a class="navbar-brand" href="../Café.php"><i class="material-icons" style="font-size:30px">home</i></span>
</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Article<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Commandes</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
  </div>
</nav>
</header>
<?php
    $nameErr=$commandeErr=$commentaireErr=$livraisonErr=$uniteErr="";
     $name=$commande=$commentaire=$livraison=$unite="";
    
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["name"]))
        {
            $nameErr="erreur veuiller rentrer un nom";
        }
        else{
            $name=test_input($_POST["name"]);
        }
        
        
        if(empty($_POST["commande"]))
        {
            $commandeErr="";
        }
        else{
            $commande=test_input($_POST["commande"]);
        }
        
        if(empty($_POST["commentaire"]))
        {
            $commentaireErr="";
        }
        else{
            $commentaire=test_input($_POST["commentaire"]);
        }
        if(empty($_POST["livraison"]))
        {
            $livraisonErr="le type livraison est requis";
        }
        else{
            $livraison=test_input($_POST["livraison"]);
        }
        if(empty($_POST["unite"]))
        {
            $uniteErr="";
        }
        else{
            $unite=test_input($_POST["unite"]);
        }
    }
    
    function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
    
    ?>
    
    <fieldset class="fieldset2">
        <h2 id="commandes">votre bon de commande</h2>
    <fieldset class="fieldset1">
    <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="name">produit</label>  
           <input type="text" name="name" id="name" placeholder="votre Nom" required maxlength="10"><span class="error">* <?php echo $nameErr;?></span>
        <br/><br/>
        
       <label for="commande">commande</label> 
        <input type="number" min="1" max="100" name="commande" id="commande" required><span class="error"><?php echo $commandeErr;?></span>
                    <select name="unite">
                    <option value="kg" selected>kg</option>
                    <option value="m3">m3</option>
                    <option value="other">Other</option><span class="error">* <?php echo $uniteErr;?></span>
                    </select>
                    <br><br>
        
        <label for="livraison">livraison</label>     
                    <select name="livraison">
                    <option value="domicile">Domicile</option>
                    <option value="magasin">Magasin</option>
                    <option value="other">Other</option><span class="error">* <?php echo $livraisonErr;?></span>
                    </select>
                    <br><br>
                    Spécifier une annotation: <textarea name="commentaire" rows="8" cols="40" placeholder="préciser une requète pour la livraison"></textarea>
        <br/><br/>
        <input type="submit" value="soumettre" name="submit">
    </form>   
    </fieldset>
    </fieldset>
    
      
  <?php
    
    
echo "<h2>Ma commande:</h2>";
echo "livraison: ";
echo $name;
echo "<br>";
echo "commande: ";
echo $commande." ".$unite;
echo "<br>";
echo $commentaire;
echo "<br>";
echo "Type de livraison: ";
echo $livraison;

    
    ?>
  
</body>
</html>
