<?php
	$strm=1;
	while($strm<=$row_roomdetails['room_slot']) //Stream space
	{
		if($strm%4==1) $clr="primary";
		else if($strm%4==2) $clr="warning";
		else if($strm%4==3) $clr="danger";
		else if($strm%4==0) $clr="success";

		include "database/operations/stream-details-operation.php";
		if($strm%2==1) echo "<div class='row'>";
		echo"
			<div class='col-md-6'>
	  			<div class='box box-$clr'>
			        <div class='box-header with-border'>
			          <h3 class='box-title'>Stream $strm
		";

		if(isset($row_streamdetails['stream_owner']))
			echo "
			  			<i>($row_streamdetails[stream_owner])</i>
			";
		else
			echo "
			 			<i>(Empty)</i>
			";
		
		echo"

			          </h3>
			          <div class='box-tools pull-right'>
			            <button type='button' class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i>
			            </button>
			          </div>
			        </div>
			        <div class='box-body' style='height:400;'>
		";
				    include "database/operations/stream-elements-operation.php";
	    echo"
		    		</div>
	    		</div>
	    	</div>
	    ";
	    if($strm%2==0||$strm==$row_roomdetails['room_slot']) echo "</div>";
    	$strm++;
	}
?>