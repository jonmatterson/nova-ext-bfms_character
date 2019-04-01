<?php echo text_output($label['bfms'], 'h3', 'page-subhead'); ?>

<div class="indent-left" id="bfms_character_fields">
 
 <?php echo text_output($label['bfms_instructions'], 'p', 'fontSmall gray'); ?>
 
 <p>
   <kbd><?php echo $label['bfms_character_url'] ?></kbd>
   <?php echo form_input($inputs['bfms_character_url']) ?>
 </p>
 
 <script type="text/javascript">
 $("#<?php echo $inputs['bfms_character_url']['id'] ?>").change(function(){
  var method;
  if($(this).val().trim().length > 0){
    method = 'hide';
  }else{
    method = 'show';
  }
  $('textarea#history').parent()[method]();
  $('textarea#service_record').parent()[method]();
 }).change();
 </script>
</div><br/>
