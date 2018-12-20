<div class="modal fade" id="request-password-modal">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Your password requests</h4>
	    </div>
	    <form role="form" action="#" method="post">
	      <div class="modal-body">
	        <div class="form-group has-feedback">
	          <!--ROOM LIST LOOP-->
	          <!--<i>You have not requested any room's password</i>-->
	          <?php 
	          	include "database/operations/close-request-operation.php"; 
	          	include "database/operations/request-password-list-operation.php"; 
	          ?>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	      </div>
	    </form>
	  </div>
	</div>
</div>