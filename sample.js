var AWS = require('aws-sdk');
var fs =  require('fs');
var s3 = new AWS.S3({apiVersion: '2006-03-01'});
// Bucket names must be unique across all S3 users
var myBucket = 'sem1-practica1';

function doStuff() {
  var fs1 = require('fs'),
      fs = require('fs'),
      path = require('path');

  fs1.readFile('/var/www/html/imagenes/conf.txt', {encoding: 'utf-8'}, function(err1,data1){
      if (!err1) {
          console.log('received data: ' + data1);
        
          
          var myKey = data1;
          //for text file
          //fs.readFile('demo.txt', function (err, data) {
          //for Video file
          //fs.readFile('demo.avi', function (err, data) {
          //for image file        
          fs.readFile(('/var/www/html/imagenes/' + data1), function (err, data) {
            if (err) { throw err; }

               var params = {Bucket: myBucket, Key: myKey, Body: data };

               s3.putObject(params, function(err, data) {

                   if (err) {

                       console.log(err)

                   } else {

                       console.log("Successfully uploaded data to myBucket/myKey");

                   }

                });

          });



      } else {
          console.log(err1);
      }
  });
};

function run() {
  setInterval(doStuff, 1000);
};
run();
// Create unique bucket name
//var bucketName = 'node-sdk-sample-' + uuid.v4();
/*var bucketName = 'sem1-practica1';
// Create name for uploaded object key
var keyName = 'hello_world.txt';

var objectParams = {Bucket: bucketName, Key: keyName, Body: 'Hello World!'};
    // Create object upload promise
var uploadPromise = new AWS.S3({apiVersion: '2006-03-01'}).putObject(objectParams).promise();
uploadPromise.then(
  function(data) {
    console.log("Successfully uploaded data to " + bucketName + "/" + keyName);
  });


// Create a promise on S3 service object
//var bucketPromise = new AWS.S3({apiVersion: '2006-03-01'}).createBucket({Bucket: bucketName}).promise();

// Handle promise fulfilled/rejected states
/*bucketPromise.then(
  function(data) {
    // Create params for putObject call
    
}).catch(
  function(err) {
    console.error(err, err.stack);
});*/