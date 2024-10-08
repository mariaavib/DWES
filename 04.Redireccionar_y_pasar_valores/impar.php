<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-8">
     <title>Impar</title>
     <link rel="stylesheet" href="impar.css">
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
                    echo "<td>".$_GET["numImpar"]."</td>";
                    echo "<td>".$_GET["cuadrado"]."</td>";
               ?>
               <td>Impar</td>
          </tr>
     </table>
</body>
</html>