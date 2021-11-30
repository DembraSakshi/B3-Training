<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">

<div class="col" ml-0>
  <div class="mb-3">
      <label >Book Name</label>
      <input type="text" class="form-control" name="book_name" value="<?php echo $viewmodel['book_name']; ?>" placeholder="Book Name">
    </div>
    <div class="mb-3">
      <label >Author</label>
      <input type="text" class="form-control" name="author" value="<?php echo $viewmodel['author']; ?>" placeholder="Author">
    </div>
    <div class="mb-3">
      <label>Price</label>
      <input type="text" class="form-control" name="price" value="<?php echo $viewmodel['price']; ?>" placeholder="Price">
    </div>
    <input type="submit" class="btn btn-primary" name="submit" values='ADD BOOK'/>
    <a class="btn btn-danger" href='<?php echo ROOT_PATH; ?>'>Cancel</a>
    
</div>
</form>
