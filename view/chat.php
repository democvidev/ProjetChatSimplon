<table class="table table-hover">
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
</table>