<?php
session_start();
setcookie('pid', '');
?>
<style>
  #points {color: #FF0000;}
</style>
<?php 
?> <h1 class="text-size-50 text-white text-center center text-uppercase"> <b>Username : </b>
     <style> h1 {color: #FF0000;}</style> <b>  <?php echo $_SESSION["username"] ; ?> </b> </h1> <?php
  ?> <h1 id="points" class="text-size-50 text-white text-center center text-uppercase"> <?php 
$i=0;
$host = "localhost";
$username = "root";
$password = "";
$dbname = "fleles";
    $dsn = "mysql:host=$host;dbname=$dbname"; 
       // $sql4 = "SELECT cpc FROM basepoints as b ,users as u where b.username=u.username and b.id>0"; 
    $user=$_SESSION['username'];
        $sql4 = 'SELECT cpc FROM basepoints  WHERE username = "'.$user.'" ';
 try{      
     $pdo = new PDO($dsn, $username, $password);
     $stmt = $pdo->query($sql4);
if($stmt === false ){
        die("Erreur");
     }
     
        }catch (PDOException $e){
        echo $e->getMessage();
    }
     $cpctab=array();
 while   ($row = $stmt->fetch(PDO::FETCH_ASSOC)):
     $i++;
     $cpctab[$i]=$row['cpc'];
 

   ?>  <?php endwhile;
 foreach ($cpctab as $i => $value) {
        
   ?>    <?php   echo "   $cpctab[$i]   ";     ?>         
         <?php                              
                                        }
?></h1>
<html lang="en">
  <head>
     <script>
     
var cpcarray=  <?php echo json_encode($cpctab); ?>;

window.addEventListener("click", function(){
  console.log('Window clicked');

//reglage cookies

var a=document.getElementById("points").innerHTML;
let z=parseInt(a)+2;
document.getElementById("points").innerHTML=z;
var g=parseInt(z);
console.log(g);

    document.cookie= "pid="+g; 
//ajout de points
<?php 
 if(isset($_COOKIE['pid'])){
$user=$_SESSION['username'];
$sql5=' UPDATE basepoints
SET cpc = cpc+2
WHERE username = "'.$user.'" ';
 try{      
     $pdo = new PDO($dsn, $username, $password);
     $s = $pdo->query($sql5);
if($s == false ){
      die("Erreur base de données");
     }
      }catch (PDOException $e){
      echo $e->getMessage();
    }
  }
    ?>

});


</script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
      
      <!--   Font Awesome        --> 
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  
    <link rel="icon" type="img/gif" href="logo1.png">

   <link rel="stylesheet" type="text/css" href="myStyle.css">

    <title>Game Box | Snake</title>


  </head>

  <body>

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="..\index.html"><img src="logo1.png" width="30" height="30" class="d-inline-block align-top" style="margin-right: 10px; margin-left: 10px;" >
    GAME BOX</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="  false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ">
      <li class="nav-item ">
        <a class="nav-link" href="..\index.html">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="..\about.html">About</a>
      </li>
  </div>
</nav>
       <div class="container">
         <div class="row">
        <div class="col-4 ">
          <img src="snake.png" style="height: 130px; width: 130px;" class="mx-auto d-block" >
        </div>
          
         <div class="col-4 ">
            <h1 class="d-none d-sm-block"> WELCOME</h1>
         </div>
             
        <div class ="col-4 d-block d-sm-none">
             
            <h3 style="margin-top: 20px;"><button id= "restart" class="btn btn-danger button">Restart</button></h3>
        </div>     

         <div class="col-4 d-none d-sm-block">
             <button class="btn btn-danger" data-toggle="modal"  data-target="#exampleModal" style="margin-top: 30px; float: right; ">Rules</button>

           <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                 <h3 style="color: black;"> RULES</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
             </div>
              <div class="modal-body">
                  
                  <br>
                  <h6>1. You have to eat food as many as you can to increase your score</h6>
                  <h6>2. In Case of No boundary snake can move anywhere but crashes when hit itself</h6>
                  <h6>3. In case of Boundary if snake hits the boundary and itself it crashes</h6>
                  <h6>4. whenever snake crashes game is Over</h6>

                  <br>
              </div>
     
            </div>
          </div>
       </div>


         </div>

        
      </div>
      </div>
        

      <div class="container">
        <div class="row ">
           <div class="col-3 d-none d-sm-block ">
              
            <h5 style="margin-top: 50px;">Select the level before starting the game.</h5>  
            <h5 style="margin-top: 35px;"><button type="button" class="btn btn-primary " style="background-color: #C82333;" id= "level1">ON</button> Level 1</h5>
            <h5><button type="button" class="btn btn-primary " id= "level2">OFF</button> Level 2</h5>
             <h5><button type="button" class="btn btn-primary " id= "level3">OFF</button> Level 3</h5>

            </div>

           <div class="col-6">
             <canvas height="300" width="350" style="border: 1px solid blue ;" id = "ctx" class="rounded mx-auto d-block"></canvas>
           </div>
           <div class="col-3 ">
               
           </div>
        </div>
       </div>


       <h3 class="d-none d-sm-block"><button id= "restart" class="btn btn-danger button">Restart</button></h3>
     
     <div class ="d-block d-sm-none" style="margin-top: 20px;">
         <h3><i class="fas fa-arrow-circle-up" id ="up" style="font-size: 30px;"></i></h3>

         <h3><i class="fas fa-arrow-circle-left" id ="left" style="font-size: 30px;"></i>  <i class="fas fa-arrow-circle-down" id ="down" style="font-size: 30px;"></i>  <i class="fas fa-arrow-circle-right" id ="right" style="font-size: 30px;"></i></h3>
     </div>


   <script type="text/javascript" src="myjavascript.js"></script>
    <script type="text/javascript">
        

          var level1 = document.getElementById("level1") ;
          var level2 = document.getElementById("level2") ;
          var level3 = document.getElementById("level3");
          var l1 = true;
          var l2 = false ;
          var l3 = false ;

        
    </script>
    
     

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
     <a href="../../../acceuil.php"><h3>Return Home </h3></a> <style> h3 {color: #FF0000;}</style>
        <?php
            if(isset($_COOKIE['pid'])){
                echo 'Votre ID de session est le ' .$_COOKIE['pid'];
            }
        ?>
  </body>
</html>
 	