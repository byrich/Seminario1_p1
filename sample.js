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
  setInterval(doStuff, 2000);
};
run();