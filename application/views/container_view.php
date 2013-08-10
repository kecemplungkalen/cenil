 <style>
 .makeitGlow{
     max-height:20px;
     background-color: transparent;
     z-index:99999999;
 }
 </style>
 <body>
	<div class="container-fluid">
	<div class="nav navbar navbar-inner text-center" style="top:0;"><a class="brand " style="float: center;"><span>UNI Gammu Monitor</span></a></div>
	<div class="navbar-fixed-top alert alert-error  hide makeitGlow" >
		<button type="button" class="btn btn-mini" data-dismiss="alert">Close</button>
		<marquee behavior="scroll" scrollamount="4" behavior="hover" direction="left" width="100%" style="position: fixed;">
		<strong>test saja</strong>
		</marquee>
	</div>

		<div class="row">
			    <div class="span2" style="position: fixed;" >
					    <?php if($sidebar){ echo $sidebar;}?>
			    </div>
			    <div class="span11 offset2" >
				    <div id="content" class="row-fluid">
					    <?php if($content){ echo $content;}?>
				    </div>
			    </div>
		</div>
	</div>
	<div id="modalArea">
	</div>
</body>