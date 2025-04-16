<html>
    <body bgcolor=<?= $dgBgcolor; ?>
        <br>
        <table width=95%>
            <?php
                while ($collection->valid()) :
                    $entry = $collection->current();
                    ?>
                    <tr>
                        <td>'.$z[0];</td>
                        <td>
                            echo $z[2];
                            if (is_a(ShowDefaultContracts::class, $action)) && ($z[10] > 5) { echo ' '; echo $z[10];}
                        </td>
                    <tr>
                    <?php
                endwhile;
            ?>
        </table>
    </body>
</html>
