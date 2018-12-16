<!DOCTYPE html>
<html>

<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 40%;
    }

    td, th {
        border: 1px solid; #dddddd;
        text-align: left;
        padding: 8px;
    }
</style>
    <h2>Calculadora de prestamo</h2>

    <form method="POST">
        <table>
            <tr>
                <td>
                    Monto del prestamo: <input type="text" name="montoPrestamo">
                </td>
            </tr>
            <tr>
                <td>
                    Plazo: <input type="text" name="numPlazo">
                </td>
            </tr>
            <tr>
                <td>
                    Tasa de Porcentaje: <input type="text" name="tasaPorcentaje">
                </td>
            </tr>
        </table>
        <button type="Submit" name="calculated">Calcular</button> 
    </form>
</html>
<?php
    if($_POST){

        $prestamo = $_POST['montoPrestamo'];
        $plazo = $_POST['numPlazo'];
        $tasa = $_POST['tasaPorcentaje']/100;

        //Convertir la tasa en negativo para calcular la cuota fija
        if ($plazo  > 0) $plazoNegative = -$plazo;
        $cuotaFija = $prestamo / ((1 - (1 + ($tasa/12))**$plazoNegative)/($tasa/12));

        echo "La tasa es: ".$tasa."<br/>";
        echo "Cuota fija es: ".$cuotaFija."<br/>";
        echo $test;
        echo "<table id = 'table1'> \n";
        
        echo
        "<tr>
            <td>Numero de Plazo</td>
            <td>Fecha de pago</td>
            <td>Cuota Fija</td>
            <td>Capital</td>
            <td>Interes</td>
            <td>Saldo</td>
        </tr>";

        $saldo = $prestamo;

        for ($fila = 1; $fila <= $plazo;$fila++) {

            $interes = $saldo *($tasa/12);
            $capital = $cuotaFija - $interes;
            $saldo -= $capital;
            echo "<tr>\n";
                
                echo "<td>".$fila."</td>\n";
                echo "<td> Fecha </td>\n";
                echo "<td>".$cuotaFija."</td>\n";
                echo "<td>".$capital."</td>\n";
                echo "<td>".$interes."</td>\n";
                echo "<td>".$saldo."</td>\n";

            echo "</tr>\n";
        }      
        echo "</table>\n";
    }
?>

