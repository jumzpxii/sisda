<?php 
    include "../system/connect.php";

$columns = array('contact_center');
$query =  "SELECT * FROM contact_center";

    if(isset($_POST["search"]["value"])){
        $query .= 'WHERE name LIKE "%'.$_POST["search"]["value"].'%"';
    }
    if(isset($_POST["order"])){
        $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].'';
    }else{
        $query .= 'ORDER BY id DESC';
    }

$query1 = '';

if($_POST["length"] != -1){
    $query1 = 'LIMIT '. $_POST['start']. ', ' .$_POST['length'];
}
$number_filter_row = mysqli_num_rows(mysqli_query($db,$query));

$result = mysqli_query($db,$query . $query1);

$data = array();

while($row = mysqli_fetch_array($result)){
    $sub_array = array();
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="contact_center">'.$row["name"].'</div>';

    $sub_array [] = '<button type="button" name="delete" class="btn btn-danger" id="'.$row["id"].'">Delete</button>';

    $data[] = $sub_array;

}

function get_all_data($connect){
    $query = "SELECT * FROM contact_center";
    $result = mysqli_query($db,$query);
    return mysqil_num_rows($result);
}

$output = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => get_all_data($connect),
    "recordsFiltered" => $number_filter_row,
    "data" => $data
);

echo json_encode($output);
?>