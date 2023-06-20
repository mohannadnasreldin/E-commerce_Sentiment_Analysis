<?php 
// Include database connection

try {
    // Create sql statment
    $sql = "SELECT * FROM keyword";
    $result = $conn->query($sql);

} catch (Exception $e) {
    echo "Error " . $e->getMessage();
    exit();
}


         if (isset($_GET['status']) && $_GET['status'] == "deleted") : 
         endif ;
         if (isset($_GET['status']) && $_GET['status'] == "fail_delete") : 
         endif ;
?>
        <?php if ($result->rowCount() > 0) : 
              foreach ($result as $keyword) : ?>
                                                <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                               
                                                <td class="desc"><?= $keyword['Word'] ?></td>
                                                <td class="desc"><?= $keyword['Type'] ?></td>
                                                
                                   
                                                <td>
                                                    <div class="table-data-feature">
                                                       
                                                        <button class="item" data-toggle="modal" data-target="#smallmodal">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="modal" data-target="#smallmodal2" data-placement="top" title="" data-original-title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                       
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
              <?php endforeach?>
          <?php endif ?>
<!-- End Table Product -->

