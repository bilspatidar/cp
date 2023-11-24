    <?php 
	//require_once('./vendor/autoload.php');
require_once('application/libraries/S3.php');
require_once(APPPATH."libraries/aws/aws-autoloader.php");
use Aws\Common\Exception\MultipartUploadException;
use Aws\S3\Model\MultipartUpload\UploadBuilder;
use Aws\S3\S3Client;
	defined("BASEPATH") OR exit("No direct script access allowed");

class Awsfile extends CI_Controller {

  function __construct() {

    parent::__construct();
    	  $this->load->library('S3_upload');
		 $this->load->library('S3');


	 }
	 
	 function uploadme(){
		 ini_set('display_errors', 1);

		 //require 'vendor/autoload.php';
$file_path = "C:\Users\good2\Desktop\1027107877.pdf";


$aws_access_key = 'AKIAXXXCGNNMK46QRRTA';
$aws_secret_key = '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';
$bucket = 'can2023bucket';
$client = S3Client::factory(array(
    'version' => 'latest',
  'key' => $aws_access_key,
  'secret' => $aws_secret_key,
  'region'  => 'us-east-1',
  
));
$key = $file_path;
$file_name = $file_path;
$result = $client->createMultipartUpload(array(
  'Bucket' => $bucket,
  'Key'    => $key,
));
$upload_id = $result['UploadId'];
$file = fopen($file_name, 'r');
$parts = array();
$partNumber = 1;
while (!feof($file)) {
  $result = $client->uploadPart(array(
      'Bucket'     => $bucket,
      'Key'        => $key,
      'UploadId'   => $upload_id,
      'PartNumber' => $part_number,
      'Body'       => fread($file, 5 * 1024 * 1024),
  ));
  $parts[] = array(
      'PartNumber' => $part_number++,
      'ETag'       => $result['ETag'],
  );
}
$result = $client->completeMultipartUpload(array(
  'Bucket'   => $bucket,
  'Key'      => $key,
  'UploadId' => $upload_id,
  'Parts'    => $parts,
));
echo $url = $result['Location'];
fclose($file);



	 }
	 
}


?>