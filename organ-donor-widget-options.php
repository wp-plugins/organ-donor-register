<?php
$options=get_option("organ_donor_widget");
if (!is_array($options)) {$options=array('image'=>'','title'=>'NHS Organ Donor Register','target'=>'','nofollow'=>'');}

if ($_POST['organ-donor-widget-submit']) {
    $options['image']=$_POST['organ_donor_widget_image'];
    $options['title']=$_POST['organ_donor_widget_title'];
    $options['target']=$_POST['organ_donor_widget_target'];
    $options['nofollow']=$_POST['organ_donor_widget_nofollow'];
    update_option("organ_donor_widget",$options);
}
?>
<p>
<label for="organ_donor_widget_title"><?php _e('Widget Title'); ?>: </label>
<input type="text" size="20" maxlength="20" name="organ_donor_widget_title" value="<?php echo $options['title'];?>" /><br/>

<label for="organ_donor_widget_image"><?php _e('Image'); ?>: </label>
<select name="organ_donor_widget_image">
<option value="1"<?php if ($options['image']=="1") {echo " selected='selected'";} ?>><?php _e('110x110 Animated.'); ?></option>
<option value="2"<?php if ($options['image']=="2") {echo " selected='selected'";} ?>><?php _e('220x220 Animated'); ?></option>
<option value="3"<?php if ($options['image']=="3") {echo " selected='selected'";} ?>><?php _e('69x69 Static'); ?></option>
<option value="4"<?php if ($options['image']=="4") {echo " selected='selected'";} ?>><?php _e('138x138 Blue Static'); ?></option>
<option value="5"<?php if ($options['image']=="5") {echo " selected='selected'";} ?>><?php _e('138x138 Red Static'); ?></option>
</select><br/>

<label for="organ_donor_widget_target"><?php _e('Link Target'); ?>: </label>
<input type="text" size="10" maxlength="10" name="organ_donor_widget_target" value="<?php echo $options['target'];?>" /><br/>

<label for="organ_donor_widget_nofollow"><?php _e('Link NOFOLLOW'); ?>: </label>
<select name="organ_donor_widget_nofollow">
<option value=""<?php if ($options['nofollow']=="") {echo " selected='selected'";} ?>><?php _e('No'); ?></option>
<option value="Yes"<?php if ($options['nofollow']=="Yes") {echo " selected='selected'";} ?>><?php _e('Yes'); ?></option>
</select><br/>

<input type="hidden" id="organ-donor-widget-submit" name="organ-donor-widget-submit" value="1" />
</p>