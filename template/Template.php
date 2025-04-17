<html>
    <body bgcolor=<?= $dgBgcolor; ?>
        <br>
        <table width=95%>
            <?php
                while ($collection->valid()) :
                    $entry = $collection->current();
                    ?>
                    <tr>
                        <td><?= $entry->getId() ?></td>
                        <td>
                            <?= $entry->getCompanyName(); ?>

                            <?php if (is_a($action, \App\Domain\DefaultContractsAction::class)) : ?>
                                <?php if ($entry->getAmount() > 5): echo $entry->getAmount(); endif;  ?>
                            <?php endif; ?>
                        </td>
                    <tr>
                    <?php
                    $entry = $collection->next();
                endwhile;
            ?>
        </table>
    </body>
</html>
