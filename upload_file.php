<?php
require_once('config_tinybrowser.php');
require_once('fns_tinybrowser.php');

// Check session, if it exists
if (!admin())
{
	echo 'Error!';
	exit;
}
// Check hash is correct (workaround for Flash session bug, to stop external form posting)
if($_GET['obfuscate'] != md5($_SERVER['DOCUMENT_ROOT'].$tinybrowser['obfuscate']))
{
	echo 'Error!';
	exit;
}
// Check  and assign get variables
if(!isset($_GET['type']))
{
	echo 'Error!';
	exit;
}
if(!isset($_GET['folder']))
{
	echo 'Error!';
	exit;
}

$dest_folder = urldecode($_GET['folder']);
$typenow = $_GET['type'];

// Check file extension isn't prohibited
$nameparts = explode('.',$_FILES['Filedata']['name']);
$ext = end($nameparts);

if(!validateExtension($ext, $tinybrowser['prohibited']))
{
	echo 'Error!';
	exit;
} 

// Check file data
if ($_FILES['Filedata']['tmp_name'] && $_FILES['Filedata']['name'])
{
	$source_file = $_FILES['Filedata']['tmp_name'];
	$file_name = stripslashes($_FILES['Filedata']['name']);
	if($tinybrowser['cleanfilename']) $file_name = clean_filename($file_name);
	if(is_dir($tinybrowser['docroot'].$dest_folder))
	{
		$success = copy($source_file,$tinybrowser['docroot'].$dest_folder.'/'.$file_name.'_');
	}
	if($success)
	{
		header('HTTP/1.1 200 OK'); //  if this doesn't work for you, try header('HTTP/1.1 201 Created');
?>
<html><head><title>File Upload Success</title></head><body>File Upload Success</body></html><?php
	}
}		
?>