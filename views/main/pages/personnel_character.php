<?php if($bfms_character): ?>
  
<div id="bfms_history" class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide" style="padding-top:18px;">
  
  <?php echo $bfms_character['bio']['history'];?>
  
</div>
  
<div id="bfms_service_record" class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide">
  
  <table class="table100 zebra">
  <?php foreach($bfms_character['bio']['service_record'] as $item): ?>
    
    <tr>
      <td><?php echo $item['year_start']; ?></td>
      <td><?php echo $item['year_end']; ?></td>
      <td style="text-align:center;line-height:1;">
        <?php if(!empty($item['rank_image_url'])): ?>
        <img src="<?php echo $item['rank_image_url']; ?>" style="margin-top:2px;">
        <br>
        <small style="font-size:11px"><?php echo $item['rank_name']; ?></small>
        <?php else: ?>
        <?php echo $item['rank_name']; ?>
        <?php endif; ?>
      </td>
      <td><?php echo $item['position']; ?><br><em style="font-size:12px"><?php echo $item['assignment']; ?></em></td>
    </tr>
    
  <?php endforeach; ?>
  </table>
  
</div>


<script type="text/javascript">
$('#tabs > ul > li:contains("History")').hide();
$('#tabs > ul').append('<li><a href="#bfms_history"><span>History</span></a></li>');
$('#tabs > ul').append('<li><a href="#bfms_service_record"><span>Service Record</span></a></li>');
</script>
  
<?php else: ?>
  
  <?php /* TODO: API error so do nothing */ ?>
  
<?php endif; ?>
