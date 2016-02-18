<?php
function myimageresize($SIpwd, $TIpwd, $IMGFile, $MIsz, $type){
	// Max vert or horiz resolution
	$maxsize=$MIsz;
	// create new Imagick object
	$inImage=$SIpwd.$IMGFile;
	$outImage=$TIpwd.$IMGFile;
	$image = new Imagick($inImage);
	// Resizes to whichever is larger, width or height
	if($type=='thumb'){
		if($image->getImageHeight() > $maxsize){
			$image->resizeImage(0,$maxsize,Imagick::FILTER_LANCZOS,1);
		}
	}else{
		if($image->getImageHeight() <= $image->getImageWidth()){
			// Resize image using the lanczos resampling algorithm based on width
			if($image->getImageWidth() > $maxsize){
				$image->resizeImage($maxsize,0,Imagick::FILTER_LANCZOS,1);
			}
		}else{
			// Resize image using the lanczos resampling algorithm based on height
			if($image->getImageHeight() > $maxsize){
				$image->resizeImage(0,$maxsize,Imagick::FILTER_LANCZOS,1);
			}
		}
	}
/*
	// Set to use jpeg compression
	$image->setImageCompression(Imagick::COMPRESSION_JPEG);
	// Set compression level (1 lowest quality, 100 highest quality)
	$image->setImageCompressionQuality(50);
*/
	if(exif_imagetype($inImage) != IMAGETYPE_JPEG){
		$image->setImageCompression(\Imagick::COMPRESSION_UNDEFINED);
		$image->setImageCompressionQuality(1);
	}else{
		$image->setImageCompression(Imagick::COMPRESSION_JPEG);
		$image->setImageCompressionQuality(40);		
	}
	// Strip out unneeded meta data
	$image->stripImage();
	// Writes resultant image to output directory
	$image->writeImage($outImage);
	// Destroys Imagick object, freeing allocated resources in the process
	$image->destroy();
}

function cropiiimage($imgpath, $img, $width, $height, $x, $y){
	$IMGFile=$imgpath.$img;
	$image = new Imagick($IMGFile);
	$image->cropImage($width, $height, $x, $y);
	$image->writeImage($IMGFile);
	$image->destroy();
}

function deleteListing($lisID){
	session_start();
	$userid=$_SESSION['userid'];
	include('connect_base.php');
	$LDQ="delete from listings where listingID='$lisID' and addedBy='$userid';";
	if(mysql_query($LDQ, $db)){
		$path="./userfiles/$userid/list$lisID/";
		exec("rm -rf $path");
	}else{
		$dbErr= mysql_errno($db) . ": " . mysql_error($db);
		datadebug($LDQ);
		datadebug($dbErr);
	}
}

function reportListing($listingID, $reportReason, $reportText, $repIP){
	include('connect_base.php');
	$LQ="select addedBy from listings where listingID='$listingID';";
	$LR=mysql_query($LQ, $db);
	$LD=mysql_fetch_array($LR);
	$reportedOn=date('Y-m-d H:i:s');
	$LiQ="insert into reportedListings values ('$listingID', '$LD[0]', '$reportedOn', '$reportReason', '$reportText', '$repIP', 'N', '', '');";
	if(mysql_query($LiQ, $db)){
	}else{
		$dbErr= mysql_errno($db) . ": " . mysql_error($db);
		datadebug($LiQ);
		datadebug($dbErr);
	}
}

function datadebug($dbgSTR){
	$file = fopen("debug.log","a");
	fwrite($file,$dbgSTR."\r\n");
	fclose($file);
}
?>