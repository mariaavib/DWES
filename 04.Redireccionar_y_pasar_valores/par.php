<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-8">
     <title>Par</title>
     <link rel="stylesheet" href="par.css">
</head>
<body>
     <table>
          <tr>
               <th>Numero</th>
               <th>Cuadrado</th>
               <th>¿Par o impar?</th>
          </tr>
          <tr>
               <?php
                    echo "<td>".$_GET["numPar"]."</td>";
                    echo "<td>".$_GET["cuadrado"]."</td>";
               ?>
               <td>PAR</td>
          </tr>
     </table>
</body>
</html>