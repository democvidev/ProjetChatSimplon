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
      <td class="col-2"><?= $row['author'] ?></td>
      <td class="col-8"><?= $row['content'] ?></td>
    </tr> 
  <?php
         }
     } else { ?>
        <p>Pas de messages</p>
  <?php } ?>
  </tbody>
</table>