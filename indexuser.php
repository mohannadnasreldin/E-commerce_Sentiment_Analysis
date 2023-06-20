<?php
// Include database connection
require("inc/db.php");

try {
  // Create sql statment
  $sql = "SELECT * FROM product order by OverallScore desc";
  $result = $conn->query($sql);
} catch (Exception $e) {
  echo "Error " . $e->getMessage();
  exit();
}


if (isset($_GET['status']) && $_GET['status'] == "deleted") :
endif;
if (isset($_GET['status']) && $_GET['status'] == "fail_delete") :
endif;
?>
<?php if ($result->rowCount() > 0) :
  foreach ($result as $product) : ?>
    <tr>
      <html>
      <td><?= $product['PID'] ?></td>
      <td><?= $product['Name'] ?></td>
      <td><?= $product['Category'] ?></td>
      <td><?= number_format($product['Price'], 2) ?></td>
      <td class="desc"><?= $product['Image'] ?></td>
      <td class="desc">
      <a style="padding: 0.7em;" href="product details.php?PID=<?= $product['PID'] ?>"><i class="zmdi zmdi-edit"></i></a>
      </td>

      </html>
    </tr>
  <?php endforeach ?>
<?php endif ?>
<!-- End Table Product -->