var AWS = require('aws-sdk');
var uuid = require('uuid');

// Create unique bucket name
//var bucketName = 'node-sdk-sample-' + uuid.v4();
var bucketName = 'sem1-practica1';
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