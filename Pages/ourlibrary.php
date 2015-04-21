<?php
session_start();
if( !isset($_SESSION['loggedInUser']) && !empty($_SESSION['loggedInUser']) )
{
	header("location:index.html");
	exit();
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>DIT Kevin Street Library</title>
<link href="home.css" type="text/css" rel="stylesheet" />
<script type="text/javascript">
function $(id)
{
 return document.getElementById(id);
}

function addLoadEvent(func)
{
 var oldonload = window.onload;
 if (typeof window.onload != 'function')
 {
  window.onload = func;
 }
 else
 {
  window.onload = function()
  {
   oldonload();
   func();
  }
 }
}
var slideMenu=function(){
 var sp,st,t,m,sa,l,w,sw,ot;
 return{
  build:function(sm,sw,mt,s,sl,h){
   sp=s; st=sw; t=mt;
   m=document.getElementById(sm);
   sa=m.getElementsByTagName('pa');
   l=sa.length; w=m.offsetWidth - 10; sw=w/l;
   ot=Math.floor((w-st)/(l-1)); var i=0;
   for(i;i<l;i++){s=sa[i]; s.style.width=sw+'px'; this.timer(s)}
   if(sl!=null){m.timer=setInterval(function(){slideMenu.slide(sa[sl-1])},t)}
  },
  timer:function(s){s.onmouseover=function(){clearInterval(m.timer);m.timer=setInterval(function(){slideMenu.slide(s)},t)}},
  slide:function(s){
   var cw=parseInt(s.style.width,'10');
   if(cw<st){
    var owt=0; var i=0;
    for(i;i<l;i++){
     if(sa[i]!=s){
      var o,ow; var oi=0; o=sa[i]; ow=parseInt(o.style.width,'10');
      if(ow>ot){oi=Math.floor((ow-ot)/sp); oi=(oi>0)?oi:1; o.style.width=(ow-oi)+'px'}
      owt=owt+(ow-oi)}}
    s.style.width=(w-owt)+'px';
   }else{clearInterval(m.timer)}
  }
 };
}();

</script>
<script type="text/javascript"> 
var baseurl = '';
addLoadEvent(function() {slideMenu.build('image-group', 550, 10, 10, 1)});
</script>
<style>
#contents {
	margin-top:100px;
}

form {
	margin-left:200px;
	margin-top: 50px;
}

#para1{
	position:absolute;
	line-height:15px;
	left:380px;
	font-size:18px;
	font-style:bold;
	text-align: left;

}
#para2{
	position:absolute;
	top:230px; 
	left:200px;
	font-size:15px;
	font-style:bold;
}

.img { width:920px; 
       margin:0 auto;
       position:absolute; 
       left:200px;
	 }
	   
.img1 { padding:18px 0;  
        height:300px; 
		width:920px; 
		overflow:hidden;
		position:absolute; 
		left:200px;
	   }
		
  pa {     
           float:right;
           width:900px;   
           margin-left:5px; 
           overflow:hidden;
		 }


</style>
</head>


<body>
	<div id="container">
    	<div id="header">
        	<h1>DIT Kevin Street Library Service</h1>
            <img src="book.png" width="100" height="100" alt="Book" class="book"/>
            <p>Welcome, <?php echo $_SESSION['loggedInUser']; ?></p>
        </div>
        <div id="main">
        	<div id="cssmenu">
            	<ul>
                	<li><a href="home.php">Home</a></li>
                    <?php
                		if($_SESSION['userLevel'] == "a" || $_SESSION['userLevel'] == "l")
                		{
                			echo '<li><a href="manage.php">Manage</a></li>';
                		}
                    ?>
                    <li><a href="books.php">Books</a></li>
                    <li><a href="contactStaff.php">Contact</a></li>
                    <li class="active"><a href="about.php">About</a></li>
                </ul>
           	</div>
			

<div class="img">
     <div class="img1" id="image-group">
      <pa><img src="library1.jpg" ></a></pa>
	  <pa><img src="library2.jpg" ></a></pa>
	  <pa style="margin:0"><img src="library3.jpg" ></a></pa>
  </div>
 </div> 

		
            <div id="para2">
			<ul class="links"><li><a href="profile.php">Profile</a></li></ul>
			<ul class="links"><li><a href="how_to_study.php">How to Study</a></li></ul>
			<ul class="links"><li><a href="openinghours.php">Opening Hours</a></li></ul>
			<ul class="links"><li><a href="ourlibrary.php">Our Libraries</a></li></ul>

            </div>
			
            <div id="contents">
   	
                <form method="post" action="logout.php" id="logout">
        			<input type="submit" value="Logout">
        		</form>               
            	
        	</div>
        </div>
	</div>
</body>
</html>
