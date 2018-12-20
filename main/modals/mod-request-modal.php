<div class="modal fade" id="mod-request-modal">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Password requests</h4>
	    </div>
	    <form role="form" action="#" method="post">
	      <div class="modal-body">
	        <div class="form-group has-feedback">
	          <!--ROOM LIST LOOP-->
	          <!--<i>You have not requested any room's password</i>-->
	          <?php 
	          	include "database/operations/mod-request-response-operation.php"; 
	          	include "database/operations/mod-request-list-operation.php"; 
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