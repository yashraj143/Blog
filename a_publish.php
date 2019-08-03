<?php

session_start();



?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<script type="text/javascript">
  function iframeLoaded() {
      var iFrameID = document.getElementById('idIframe');
	 
      if(iFrameID) {
            
            iFrameID.height = "";
            iFrameID.height = iFrameID.contentWindow.document.body.scrollHeight+50 + "px";
      } 
	  
  }
    function resizeIframe(iframe) {
    iframe.height = iframe.contentWindow.document.body.scrollHeight + 750+ "px";
  }
  
</script> 



<style>
body {
  margin: 0;
  font-size: 28px;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  background-color: #ffccf2;
  padding: 30px;
  text-align: center;
}

#navbar {
  overflow: hidden;
  background-color: #333;
}

#navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

#navbar a:hover {
  background-color: #ddd;
  color: black;
}

#navbar a.active {
  background-color: #4CAF50;
  color: white;
}

.content {
  padding: 16px;
}

.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .content {
  padding-top: 60px;
}


</style>
</head>
<body>

<div class="header">
  <h2>Admin Page</h2>
  <p></p>
</div>

<div id="navbar">
  <a class="active" href="javascript:void(0)">Home</a>
  <a href="#">News</a>
  <a href="#">Blogger</a>
</div>

<div class="content">
<iframe src="temp1.php" id="idIframe" onload="iframeLoaded()" Scrolling="no" width="100%" frameborder="0"></iframe>

<iframe src="blogs.php" onload="resizeIframe(this)" Scrolling="yes" width="100%"  name="i2" frameborder="0" ></iframe>
  <h3>........................................................</h3>
</div>

<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}



</script>

</body>
</html>
