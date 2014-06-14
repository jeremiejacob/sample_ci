<div>
<?php echo validation_errors(); ?>
<?php echo form_open('/admin/save', array('class' => 'form-horizontal')) ?>
  
  <fieldset>
    <legend><?php echo lang('common_details'); ?></legend>
    <div class="form-group">
      <?php echo form_label(lang('common_name'), 'name', array('class' => 'col-sm-2 control-label')); ?>
      <div class="col-xs-3">
        <?php echo form_model_input($admin, 'name', array('id' => 'name', 'class' => 'form-control')); ?>
      </div>
    </div>

    <div class="form-group">
      <?php echo form_label(lang('common_username'), 'username', array('class' => 'col-sm-2 control-label')); ?>
      <div class="col-xs-3">
        <?php echo form_model_input($admin, 'username', array('id' => 'username', 'class' => 'form-control')); ?>
      </div>
    </div>
  </fieldset>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <?php
        $onclick = "location.href = '/admin/'";
        echo form_button(array('type' => 'button', 'content' => lang('common_back'), 'class' => 'btn btn-default', 'onclick' => $onclick));
      ?>
       <?php echo form_button(array('type' => 'submit', 'content' => lang('common_save'), 'class' => 'btn btn-primary'));?>
    </div>
  </div>
<?php echo form_close() ?>
</div>