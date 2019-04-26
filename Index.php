<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
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
<fieldset>
    <legend>Article</legend>
    <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="name">nom:</label>  
           <input type="text" name="name" id="name" placeholder="votre Nom" required maxlength="10"><span class="error">* <?php echo $nameErr;?></span>
        <br/><br/>
        
       <label for="commande">commande:</label> 
        <input type="number" min="1" max="100" name="commande" id="commande" required><span class="error"><?php echo $commandeErr;?></span>
                    <select name="unite">
                    <option value="kg" selected>kg</option>
                    <option value="m3">m3</option>
                    <option value="other">Other</option><span class="error">* <?php echo $uniteErr;?></span>
                    </select>
                    <br><br>
  <br><br>
        
        livraison:<select name="livraison">
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