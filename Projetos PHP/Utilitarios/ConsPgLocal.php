<?php

$conexaopg = pg_connect("host=localhost port=5432 dbname=Academia user=postgres password=fla123");

$result = pg_query($conexaopg, "select * from curso");
while($campo = pg_fetch_array($result)){
    // echo $campo["id_curso"] & " " & $campo["nome_curso"];
    print $campo['nome_curso']."\n";
}

?>