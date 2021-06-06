<form action="index.php#button" id="button">
  <fieldset>
    <div class="form-group row d-flex align-items-baseline">
        <div class="form-group col-4">
            <label for="login" class="col-sm-2 col-form-label"></label>
            <input type="text" 
            name="author" 
            class="form-control" 
            id="login" 
            placeholder="Entrez votre pseudo" 
            value="<?php if (isset($message)) {
    echo htmlspecialchars($message['author']);
} else if (isset($_GET['author'])) {echo htmlspecialchars($_GET['author']);} ?>">
            <small class="small"><?php
          if (isset($errors)) {
              foreach ($errors as $key => $value) {
                  if ($key == 'author') {
                      echo '<span class="small_error">' . $value  . '</span>';
                  }
              }
          } ?></small>
        </div>        
        <div class="form-group col-8">
            <label for="exampleTextarea" class="form-label mt-4"></label>
            <textarea 
            class="form-control" 
            name="content" 
            id="exampleTextarea" 
            rows="3" 
            placeholder="Entrez vos messages"><?php if (isset($message)) {
              echo htmlspecialchars($message['content']);
          } ?></textarea>
            <small class="small"><?php
          if (isset($errors)) {
              foreach ($errors as $key => $value) {
                  if ($key == 'content') {
                      echo '<span class="small_error">' . $value  . '</span>';
                  }
              }
          } ?></small>
        </div>
        <input type="hidden" 
        name="id" value="<?php if (isset($message)) {
              echo htmlspecialchars($message['id']);
          } ?>">
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" name="submit" value="<?= isset($message) ? 'Modifier' : 'Submit' ?>">
    </div>
  </fieldset>
</form>
