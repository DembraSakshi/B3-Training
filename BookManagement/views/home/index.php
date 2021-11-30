<table class="table">
  <thead>
    <tr>
    <th scope="col">#</th>
              <th scope="col">Book Name</th>
             <th scope="col">Author</th>
             <th scope="col">Price</th>
             <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody> 
  <?php $sr = 1;?>
                <?php foreach($viewmodel as $value) : ?>
                <tr class="text-center">
                    <td><?php echo $sr; ?></td>
                    <td><?php echo $value['book_name']; ?></td>
                    <td><?php echo $value['author']; ?></td>
                    <td><?php echo $value['price']; ?></td>
                    <td>
                        <a class="btn btn-info" href="<?php echo ROOT_URL;?>editBooks/edit/<?php echo $value['id'];?>">🖊</a>
                         <a class="btn btn-danger" href="<?php echo ROOT_URL;?>addBooks/delete/<?php echo $value['id'];?>">🗑</a>
                    </td>
                </tr>
                <?php $sr++;?>
                <?php endforeach; ?>
  </tbody>
</table>
