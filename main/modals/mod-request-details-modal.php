<div class="modal fade" id="mod-request-details-modal">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Password request response</h4>
	    </div>
	    <form role="form" action="#" method="post">
	      <div class="modal-body">
	        <div class="form-group has-feedback">
	          Accept room password request?
	          <input type="hidden" name="request_user" value="">
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button class="btn btn-success" type="submit" name="acceptrequest" id="acceptrequest" value="">Accept Request</button>
	        <button class="btn btn-danger" type="submit" name="declinerequest" id="declinerequest" value="">Decline Request</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	      </div>
	    </form>
	  </div>
	</div>
</div>