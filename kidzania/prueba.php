<?php  
    $cantidad = 3;
 ?>
<div id="contenedor">
    <form id="datos" action="inserta.php" method="post">
        <div id="tabla">
            <table>
                <?php for ($i=0; $i<=$cantidad; $i++) { 

                ?>
 <tr>
                <td colspan="4" align="center">
                    Nombre:<input id="nombre" type="text" name="usuario[<?= $i ?>][nombre]" />
                </td>
            </tr>
            <tr>
                <td colspan="4" align="center">
                    No Fase:<input id="nofase" type="text" name="usuario[<?= $i ?>][nofase]" />
                </td>
            </tr>
            <tr>
                <td colspan="4" align="center">
                    Dias Duracion:<input id="diasdu" type="text" name="usuario[<?= $i ?>][diasdu]" />
                </td>
            </tr>
            <tr>
                <td colspan="4" align="center">
                    Precio:<input id="presio" type="text" name="usuario[<?= $i ?>][presio]" />
                </td>
            </tr>
            <?php } ?>
            </table><br>
            </div>

        <input id="guarda" type="submit" value="Guardar" />
        <a href="#"><input id="cance" type="button" value="Cancelar" /></a>
    </form>
</div>