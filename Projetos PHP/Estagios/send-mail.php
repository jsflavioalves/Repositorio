<?

require ('conn.php');
mysql_select_db('estagios');

$name=$_POST['name'];
$Email=$_POST['email'];
$assunto=$_POST['assunto'];
$message=$_POST['message'];

date_default_timezone_set('America/Sao_Paulo');
$data = date('d/m/Y');
$hora = date('H:i:s');

$inserir = mysql_query("INSERT INTO emails VALUES ('', '$name', '$Email', '$data', '$hora')");
   
$body .= "Nome: " . $name . "\n"; 
$body .= "Email: " . $Email . "\n"; 
$body .= "Assunto: " . $assunto . "\n"; 
$body .= "Mensagem: " . $message . "\n"; 

//replace with your emailestagios@ufc.br
mail("estagios@ufc.br",$assunto,$body); 
 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="http://simbyone.com/wp-content/uploads/2014/04/3455e6f65c33232a060c28829a49b1cb.png">
<title>Enviando Email ...</title>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="images/ico/icon.png"> 
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png"> 
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png"> 
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png"> 
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href="_css/Icomoon/style.css" rel="stylesheet" type="text/css" />
<link href="_css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="_scripts/jquery-2.0.2.min.js"></script>
<script type="text/javascript" src="_scripts/main.js"></script>
<script type="text/javascript">setTimeout("document.location = 'http://www.estagios.ufc.br/siges/public_html/'",3000);
</script>
<style>
#loading{
    background-color: #00649d;
    height: 100%;
    width: 100%;
    position: fixed;
    z-index: 1;
    margin-top: 0px;
    top: 0px;
    margin-left: -8px;
}
#loading-center{
    width: 100%;
    height: 100%;
    position: relative;
    }
#loading-center-absolute {
    position: absolute;
    left: 50%;
    top: 50%;
    height: 20px;
    width: 100px;
    margin-top: -10px;
    margin-left: -50px;

}
.object{
    width: 20px;
    height: 20px;
    background-color: #FFF;
    -moz-border-radius: 50% 50% 50% 50%;
    -webkit-border-radius: 50% 50% 50% 50%;
    border-radius: 50% 50% 50% 50%;
    margin-right: 20px;
    margin-bottom: 20px;
    position: absolute; 
}


#object_one{
    -webkit-animation: object 2s linear infinite;
     animation: object 2s linear infinite;
     }
#object_two{ 
    -webkit-animation: object 2s linear infinite -.4s;
    animation: object 2s linear infinite -.4s;
     }
#object_three{ 
    -webkit-animation: object 2s linear infinite -.8s; 
    animation: object 2s linear infinite -.8s; 
    }
#object_four{ 
    -webkit-animation: object 2s linear infinite -1.2s;
    animation: object 2s linear infinite -1.2s; 
    } 
#object_five{ 
    -webkit-animation: object 2s linear infinite -1.6s; 
    animation: object 2s linear infinite -1.6s; 
    }
    
    
@-webkit-keyframes object{
  0% { left: 100px; top:0}
  80% { left: 0; top:0;}
  85% { left: 0; top: -20px; width: 20px; height: 20px;}
  90% { width: 40px; height: 15px; }
  95% { left: 100px; top: -20px; width: 20px; height: 20px;}
  100% { left: 100px; top:0; }      
    
}       
@keyframes object{
  0% { left: 100px; top:0}
  80% { left: 0; top:0;}
  85% { left: 0; top: -20px; width: 20px; height: 20px;}
  90% { width: 40px; height: 15px; }
  95% { left: 100px; top: -20px; width: 20px; height: 20px;}
  100% { left: 100px; top:0; }
}   
    
    
                                





</style>
</head>
<body>
<div id="loading">
<div id="loading-center">
<div id="loading-center-absolute">
<div class="object" id="object_one"></div>
<div class="object" id="object_two" style="left:20px;"></div>
<div class="object" id="object_three" style="left:100px;"></div>
<div class="object" id="object_four" style="left:60px;"></div>
<div class="object" id="object_five" style="left:80px;"></div>
</div>
</div>
 
</div>




</body>
</html>
