<table class="table table-hover">
  <thead>
        <tr>
            <th scope="col" class="col-2" hidden>date</th>
            <th scope="col" class="col-2" hidden>pseudo</th>
            <th scope="col" class="col-8" hidden>message</th>
        </tr>
    </thead>
    <tbody>
  <?php
     if (isset($tab) && $tab != null) {
         foreach ($tab as $row) {
             ?>
    <tr class="row table-light">
      <td class="col-2"><?= $row['date'] ?></td>
      <td class="col-2"><?= htmlspecialchars($row['author']) ?></td>
      <td class="col-7"><?= nl2br(htmlspecialchars($row['content'])) ?></td>
      <td class="col-1"><a class="btn-warning" href="?id=<?= $row['id']?>&amp;action=update"><i class="bi bi-arrow-counterclockwise"></i></a> - <a class="btn-danger" href="?id=<?= $row['id'] ?>&amp;action=delete"><i class="bi bi-trash"></i></a></td>

    </tr> 
  <?php
         }
     } else { ?>
        <p>Pas de messages</p>
  <?php } ?>
  </tbody>
</table>