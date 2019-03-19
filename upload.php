<?php

	require 'vendor/autoload.php';

	use Aws\S3\S3Client;
	// Use the us-east-2 region and latest version of each client.
	$sharedConfig = [
	    'profile' => 'default',
	    'region' => 'us-east-2',
	    'version' => 'latest'
	];

	// Create an SDK class used to share configuration across clients.
	$sdk = new Aws\Sdk($sharedConfig);

	// Use an Aws\Sdk class to create the S3Client object.
	$s3Client = $sdk->createS3();

	// Send a PutObject request and get the result object.
	$result = $s3Client->putObject([
	    'Bucket' => 'sem1_practica1',
	    'Key' => 'AKIAIV6MOUW7PQXEWCUQ',
	    'Body' => 'this is the body!'
	]);

	// Download the contents of the object.
	$result = $s3Client->getObject([
	    'Bucket' => 'sem1_practica1',
	    'Key' => 'AKIAIV6MOUW7PQXEWCUQ'
	]);

	// Print the body of the result by indexing into the result object.
	echo $result['Body'];
	// This file demonstrates file upload to an S3 bucket. This is for using file upload via a
	// file compared to just having the link. If you are doing it via link, refer to this:
	// https://gist.github.com/keithweaver/08c1ab13b0cc47d0b8528f4bc318b49a
	//
	// You must setup your bucket to have the proper permissions. To learn how to do this
	// refer to:
	// https://github.com/keithweaver/python-aws-s3
	// https://www.youtube.com/watch?v=v33Kl-Kx30o
	
	// I will be using composer to install the needed AWS packages.
	// The PHP SDK:
	// https://github.com/aws/aws-sdk-php
	// https://packagist.org/packages/aws/aws-sdk-php 
	//
	// Run:$ composer require aws/aws-sdk-php
	/*require './vendor/autoload.php';
	
	use Aws\S3\S3Client;
	use Aws\S3\Exception\S3Exception;
	// AWS Info
	$bucketName = 'sem1_practica1';
	$IAM_KEY = 'AKIAIV6MOUW7PQXEWCUQ';
	$IAM_SECRET = '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';
	// Connect to AWS
	try {
		// You may need to change the region. It will say in the URL when the bucket is open
		// and on creation.
		$s3 = S3Client::factory(
			array(
				'credentials' => array(
					'key' => $IAM_KEY,
					'secret' => $IAM_SECRET
				),
				'version' => 'latest',
				'region'  => 'us-east-2'
			)
		);
	} catch (Exception $e) {
		// We use a die, so if this fails. It stops here. Typically this is a REST call so this would
		// return a json object.
		die("Error: " . $e->getMessage());
	}
	
	// For this, I would generate a unqiue random string for the key name. But you can do whatever.
	$keyName = 'test_example/' . basename($_FILES["fileToUpload"]['tmp_name']);
	$pathInS3 = 'https://s3.us-east-2.amazonaws.com/' . $bucketName . '/' . $keyName;
	// Add it to S3
	try {
		// Uploaded:
		$file = $_FILES["fileToUpload"]['tmp_name'];
		$s3->putObject(
			array(
				'Bucket'=>$bucketName,
				'Key' =>  $keyName,
				'SourceFile' => $file,
				'StorageClass' => 'REDUCED_REDUNDANCY'
			)
		);
	} catch (S3Exception $e) {
		die('Error:' . $e->getMessage());
	} catch (Exception $e) {
		die('Error:' . $e->getMessage());
	}
	echo 'Done';
	// Now that you have it working, I recommend adding some checks on the files.
	// Example: Max size, allowed file types, etc.*/
?>