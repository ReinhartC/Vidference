<div class="modal fade" id="create-room-modal">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Create a room</h4>
	    </div>
	    <?php include "database/operations/create-room-operation.php"; ?>
	    <form role="form" action="#" method="post">
	      <div class="modal-body">
	        <div class="form-group has-feedback">
	          <input type="text" class="form-control" placeholder="Room Name" name="room_name" autofocus="" required="">
	          <p></p>
	          <input type="password" class="form-control" placeholder="Room Password" name="room_password">
	          <p></p>
	          <select class="select form-control" name="room_slot" required="">
			  	<option value="">-- Choose room stream slots --</option>
			  	<option value="4">4</option>
			  	<option value="5">5</option>
			  	<option value="6">6</option>
			  	<option value="7">7</option>
			  	<option value="8">8</option>
			  </select>
			  <p></p>
	          <div class="alert alert-info alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            <i class="icon fa fa-info"></i> Leave the <i>Password</i> empty if you wanted to make a public room
	          </div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <input class="btn btn-md btn-primary" type="submit" name="createroom" id="createroom" value="Create"/>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	      </div>
	    </form>
	  </div>
	</div>
</div>