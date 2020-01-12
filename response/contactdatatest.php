<?php 
    include "../system/connect.php";
    $requestData = $_REQUEST;
    $columns = array( 
        // datatable column index  => database column name
            0 =>'id', 
            1 => 'contactcenter',
            2=> 'stat'
        );
$query =  "SELECT * FROM contact_center WHERE 1=1";


    if(isset($requestData["search"]["value"])){
        $query .=" AND ( id LIKE '".$requestData['search']['value']."%' ";    
        $query .=" OR name LIKE '".$requestData['search']['value']."%' ";
    
        $query .=" OR stat LIKE '".$requestData['search']['value']."%' )";
    }

    if(isset($requestData["order"])){
        $query .= 'ORDER BY '.$columns[$requestData['order']['0']['column']].' '.$requestData['order']['0']['dir'].'';
    }else{
        $query .= 'ORDER BY id DESC';
    }

$query1 = '';

if($requestData["length"] != -1){
    $query1 = 'LIMIT '. $requestData['start']. ', ' .$requestData['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($db,$query));

$result = mysqli_query($db,$query . $query1);

$data = array();

while($row = mysqli_fetch_array($result)){
    $sub_array = array();
    $sub_array[] = $row['id'];
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
    "draw"              => intval($requestData["draw"]),
    "recordsTotal"      => intval(get_all_data($connect)),
    "recordsFiltered"   => intval($number_filter_row),
    "data"              => $data
);

echo json_encode($output);
?>