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
     if (isset($tab)) {
         foreach ($tab as $row) {
             ?>
    <tr class="table-light">
      <th scope="row"></th>
      <td><?= $row['date'] ?></td>
      <td><?= $row['author'] ?></td>
      <td><?= $row['content'] ?></td>
    </tr> 
  <?php
         }
     } else { ?>
        <p>Pas de messages</p>
  <?php } ?>
  </tbody>
</table>