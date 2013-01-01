<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/partials/header.php');

print '<h1>File API</h1>';

?>

<h4><a href="http://net.tutsplus.com/tutorials/html-css-techniques/toying-with-the-html5-filesystem-api/" target="_blank">Toying With the HTML5 File System API</a></h4>

<script>

window.requestFileSystem = window.requestFileSystem || window.webkitRequestFileSystem;

window.requestFileSystem(window.TEMPORARY, 5*1024*1024, initFS, errorHandler);

function initFS(fs) {
  // alert("Welcome to the file system");
  console.log(fs.name);
  console.log(fs.root);

  // All functions below here
  
  // Create a single Directory
  // fs.root.getDirectory('Documents', {create: true}, function(dirEntry) {
  //   console.log('You have just created the '+dirEntry.name+' directory.');
  // });
  
  // Utility function to create directories recursively
  function createDir(rootDir, folders) {
    
    rootDir.getDirectory(folders[0], {create: true}, function(dirEntry) {
      
      if (folders.length) {

        // console.log(' + Create Directory: '+folders.slice(1));
        createDir(dirEntry, folders.slice(1));

      }
      
    }, errorHandler);
  }
 
  createDir(fs.root, 'Documents/Images/Nature/Sky/'.split('/'));

  // Create a DiretoryReader object
  fs.root.getDirectory('Documents', {}, function(dirEntry) {

    var dirReader = dirEntry.createReader();

    dirReader.readEntries(function(entries) {
      
      console.log(entries);
      console.log(entries.length);

      for (var i = 0; i < entries.length; i++) {

        var entry = entries[i];

        console.log(entry.fullPath);

        if (entry.isDirectory) {

          console.log('Directory: '+entry.fullPath);

        }
        else if (entry.isFile) {

          console.log('File: '+entry.fullPath);

        }

      }

    }, errorHandler);

  }), errorHandler;

}


function errorHandler(err){
 var msg = 'An error occurred: ';
 
  switch (err.code) {
    case FileError.NOT_FOUND_ERR:
      msg += 'File or directory not found';
      break;
 
    case FileError.NOT_READABLE_ERR:
      msg += 'File or directory not readable';
      break;
 
    case FileError.PATH_EXISTS_ERR:
      msg += 'File or directory already exists';
      break;
 
    case FileError.TYPE_MISMATCH_ERR:
      msg += 'Invalid filetype';
      break;
 
    default:
      msg += 'Unknown Error';
      break;
  };
 
 console.log(msg);

};

</script>


<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/partials/footer.php');
?>

