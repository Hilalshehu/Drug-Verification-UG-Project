<?php 
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';
$del_id = filter_input(INPUT_POST, 'del_id');
if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{

	if($_SESSION['admin_type']!='super'){
		$_SESSION['failure'] = "You don't have permission to perform this action";
    	header('location: drugs.php');
        exit;

	}
    $drug_id = $del_id;

    $db = getDbInstance();
    $db->where('id', $drug_id);
    $status = $db->delete('drugs');
    
    if ($status) 
    {
        $_SESSION['info'] = "Success!";
        header('location: drugs.php');
        exit;
    }
    else
    {
    	$_SESSION['failure'] = "Failed!";
    	header('location: drugs.php');
        exit;

    }
    
}