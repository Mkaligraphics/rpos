<?php 
 require '../classes/dbase.class.php';
 $data = new dbase();

if ($_POST){
    $userid = $_POST['targetvalue'];
    $fetch =  $data->con->query("SELECT handeditemsinfo.id, utensils.description, handeditemsinfo.utensilid,  handeditemsinfo.quantity   FROM handeditemsinfo, utensils WHERE handeditemsinfo.status = '0' AND handeditemsinfo.userid = '$userid' AND handeditemsinfo.utensilid = utensils.id ");
    while ($rows = mysqli_fetch_array($fetch)){

 ?>

    <tr>
        <input type="hidden" name="tableid" class="tableid" value="<?php echo $rows['id']; ?>">
        <td><?php echo strtoupper($rows['description']); ?>
        <input type="hidden" name="utensilid" class="utensilid" value="<?php echo $rows['utensilid']; ?>">
        </td>
        <td>
            <?php echo $rows['quantity']; ?>
            <input type="hidden" name="quantity" class="quantity" value="<?php echo $rows['quantity']; ?>">                
            </td>
        <td><a class="btn btn-success returnid" id="<?php echo $rows['id'];  ?>" href="#"> <i cclass="fa fa-refresh fa-fw"></i> Return</a></td>
    </tr>

              

        <?php }} ?>