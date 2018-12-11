<div class="modal fade" id="stream-link-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit stream link</h4>
      </div>
      <?php include "database/operations/user-details-operation.php"; ?>
      <?php include "database/operations/stream-link-change-operation.php"; ?>
      <form role="form" action="#" method="post">
        <div class="modal-body">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Stream embed link" name="embed_link" value="<?php echo "$row_userdetails[user_stream_link]"; ?>" required="">
            <span class="glyphicon glyphicon-link form-control-feedback"></span>
            <p></p>
            <div class="alert alert-info alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-info"></i> Note</h4>
              <strong>Only insert the embed link.</strong> (E.g. <i>https://www.youtube.com/embed/xxxxxx</i> or <i>https://www.dailymotion.com/embed/video/xxxxxx</i>)
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input class="btn btn-md btn-primary" type="submit" name="linkchange" id="linkchange" value="Change"/>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>