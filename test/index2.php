<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        .error{
            color: #FF0000;
        }
        
        .forme{
            
            
        }
        
        label{
            display: inline-block;
            min-width: 200px;
        }
    </style>

</head>
<body>
<?php
    $nameErr=$prenomErr=$emailErr=$websitErr=$commentaireErr=$genreErr="";
     $name=$prenom=$email=$website=$commentaire=$genre="";
    
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["nom"]))
        {
            $nameErr="erreur veuiller rentrer un nom";
        }
        else{
            $name=test_input($_POST["nom"]);
        }
        
        if(empty($_POST["prenom"]))
        {
            $prenomErr="erreur veuiller rentrer un prenom";
        }
        else{
            $name=test_input($_POST["prenom"]);
        }
        
        if(empty($_POST["email"]))
        {
            $emailErr="erreur veuiller rentrer un email";
        }
        else{
            $email=test_input($_POST["email"]);
        }
        
        if(empty($_POST["website"]))
        {
            $websiteErr="";
        }
        else{
            $website=test_input($_POST["website"]);
        }
        
        if(empty($_POST["commentaire"]))
        {
            $commentaireErr="";
        }
        else{
            $name=test_input($_POST["commentaire"]);
        }
        if(empty($_POST["genre"]))
        {
            $genreErr="le genre est requis";
        }
        else{
            $genre=test_input($_POST["genre"]);
        }
    }
    
    function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
    
    ?>

    <form class="forme" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="nom">nom:</label>  
           <input type="text" name="nom" id="nom "placeholder="votre Nom" required maxlength="10"><span class="error">* <?php echo $nameErr;?></span>
        <br/><br/>
        <label for="prenom">prenom:</label> 
        <input type="text" name="prenom" id="prenom" placeholder="votre prenom" required maxlength="10"><span class="error">* <?php echo $prenomErr;?></span>
        <br/><br/>
        <label for="email">email:</label> 
       <input type="email" name="email" id="email" placeholder="votre email" required maxlength="35"><span class="error">* <?php echo $emailErr;?></span>
       <br/><br/>
       <label for="website">website:</label> 
        <input type="text" name="website" id="website">
  <span class="error"><?php echo $websitErr;?></span>
  <br><br>
        commentaire: <textarea name="comment" rows="8" cols="40" placeholder="un pti commentaire"></textarea>
        <br/><br/>
        genre:     <input type="radio" name="genre" value="female">Female
                    <input type="radio" name="genre" value="male">Male
                    <input type="radio" name="genre" value="other">Other<span class="error">* <?php echo $nameErr;?></span>
                    <br><br>
        <input type="submit" value="soumettre" name="submit">
    </form>   
    
      
  <?php
    
    
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $commentaire;
echo "<br>";
echo $genre;

    
    ?>
  
</body>
</html>