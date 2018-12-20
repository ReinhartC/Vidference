<div class="modal fade" id="request-password-accepted-modal">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Password request response</h4>
	    </div>
	    <form role="form" action="#" method="post">
	      <div class="modal-body">
	        <div class="form-group has-feedback">
	          <p>The room's password is:</p>
	          <input type="text" class="form-control"  name="room_password" value="" readonly="">
	          <input type="hidden" name="room_name" value="">
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button class="btn btn-danger" type="submit" name="closerequest" id="closerequest" value="">Close request</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	      </div>
	    </form>
	  </div>
	</div>
</div>