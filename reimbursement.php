<?php
require_once "database/database.php";

$database = new Database();
$conn = $database->getConnection();
if (!$conn) {
	LoggerInfo($GLOBALS["currentFileName"], "Connection Error: " . $conn);
	return;
}

if($_REQUEST['action'] == "store_details"){
	$resp = storeReimbursementDetails($database, $conn, $_REQUEST, $_FILES);
	echo json_encode($resp);
}else if($_REQUEST['action'] == "fetch_date_wise"){
	$resp = getReimbursementDetailDateWsise($database, $conn, $_REQUEST);
	echo json_encode($resp);
}else if($_REQUEST['action'] == "reimbursement_wise_data"){
	$resp = getReimbursementDetailReimbursemetWise($database, $conn, $_REQUEST);
	echo json_encode($resp);
}

function getReimbursementDetailReimbursemetWise($database, $conn, $req_data){
	$param = [];
	$param['type'] = $req_data['type'];
	$sql = "SELECT * FROM reimbursement WHERE type=:type ORDER BY ID DESC";
	$result = $database->selectParamQuery($conn, $sql, $param);
	if(count($result) > 0){
		$response['code'] = "200";
		$response['message'] = "Details Instered Successfullly";
		$response['status'] = "success";
		$response['data'] = $result;
	}else{
		$response['code'] = "201";
		$response['message'] = "No Details Found";
		$response['status'] = "failed";
		$response['data'] = $result;
	}
	return $response;
}
function getReimbursementDetailDateWsise($database, $conn, $req_data){
	$param = [];
	$param['month'] = $req_data['month'];
	$param['year'] = $req_data['year'];
	$sql = "SELECT * FROM reimbursement WHERE MONTH(reimbur_date)=:month AND YEAR(reimbur_date)=:year ORDER BY ID DESC";
	$result = $database->selectParamQuery($conn, $sql, $param);
	if(count($result) > 0){
		$response['code'] = "200";
		$response['message'] = "Details Instered Successfullly";
		$response['status'] = "success";
		$response['data'] = $result;
	}else{
		$response['code'] = "201";
		$response['message'] = "No Details Found";
		$response['status'] = "failed";
		$response['data'] = $result;
	}
	return $response;
}
function storeReimbursementDetails($database, $conn, $req_data, $req_files){
	$attchement_url = '';
	if($req_files)
		$attchement_url = uploadAttachment($req_files);
	if($attchement_url == 'failed'){
		$response['code'] = "201";
		$response['message'] = "Error While Uploding Attachments";
		$response['status'] = "failed";
		return $response;
	}
	if($req_data['reimbursement_type'] == 'Conveyance'){
		$param = [];
		$param['type'] = $req_data['reimbursement_type'];
		$param['reimbur_date'] = $req_data['reimbursement_date'];
		$param['form_dis'] = $req_data['from'];
		$param['to_dis'] = $req_data['to'];
		$param['purpose'] = $req_data['purpose'];
		$param['purpose_desc'] = $req_data['purpose_desc'];
		$param['mode'] = $req_data['mode'];
		$param['mode_desc'] = $req_data['mode_desc'];
		$param['km'] = $req_data['km'];
		$param['invno'] = $req_data['invno'];
		$param['amount'] = $req_data['amount'];
		$param['attachment'] = $attchement_url;
		$sql = "INSERT INTO reimbursement (type, reimbur_date, form_dis, to_dis, purpose, purpose_desc, mode, mode_desc, km, invno, amount, attachment) VALUES (:type, :reimbur_date, :form_dis, :to_dis, :purpose, :purpose_desc, :mode, :mode_desc, :km, :invno, :amount, :attachment)";
		$result = $database->insertQuery($conn, $sql, $param);
	}else if($req_data['reimbursement_type'] == 'Hotel'){
		$param = [];
		$param['type'] = $req_data['reimbursement_type'];
		$param['reimbur_date'] = $req_data['reimbursement_date'];
		$param['to_date'] = $req_data['to_date'];
		$param['from_date'] = $req_data['from_date'];
		$param['hotel_name'] = $req_data['hotel_name'];
		$param['invno'] = $req_data['invno'];
		$param['amount'] = $req_data['amount'];
		$param['attachment'] = $attchement_url;
		$sql = "INSERT INTO reimbursement (type, reimbur_date, to_date, from_date, hotel_name, invno, amount, attachment) VALUES (:type, :reimbur_date, :to_date, :from_date, :hotel_name, :invno, :amount, :attachment)";
		$result = $database->insertQuery($conn, $sql, $param);
	}else if($req_data['reimbursement_type'] == 'Food'|| $req_data['reimbursement_type'] == 'Mobile' || $req_data['reimbursement_type'] == 'Internet'){
		$param = [];
		$param['type'] = $req_data['reimbursement_type'];
		$param['reimbur_date'] = $req_data['reimbursement_date'];
		$param['invno'] = $req_data['invno'];
		$param['amount'] = $req_data['amount'];
		$param['attachment'] = $attchement_url;
		$sql = "INSERT INTO reimbursement (type, reimbur_date, invno, amount, attachment) VALUES (:type, :reimbur_date, :invno, :amount, :attachment)";
		$result = $database->insertQuery($conn, $sql, $param);
	}else{
		$response['code'] = "201";
		$response['message'] = "Please Enter Valid Reimbursement Type";
		$response['status'] = "failed";
		return $response;
	}
	if($result == 'failed'){
		$response['code'] = "201";
		$response['message'] = "Error While Uploding Attachments";
		$response['status'] = "failed";
		return $response;
	}else{
		$response['code'] = "200";
		$response['message'] = "Details Instered Successfullly";
		$response['status'] = "success";
		return $response;
	}
}

function uploadAttachment($req_files){
	$final_file_name = "attachments/".date("Y_m_Y_H_i_s")."-".$req_files["attachment"]["name"];
	if(move_uploaded_file($req_files["attachment"]["tmp_name"],$final_file_name))
		return $final_file_name;
	else
		return "failed";
}
?>