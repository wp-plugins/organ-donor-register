<?php
/*
Plugin Name: Organ Donor Register
Plugin URI: http://www.artiss.co.uk/organ-donor-register
Description: Promote the UK NHS Organ Donor Register
Version: 1.0
Author: David Artiss
Author URI: http://www.artiss.co.uk
*/
// Set up WordPress shortcodes and actions
add_shortcode('organ_donor','organ_donor_shortcode');
add_action('plugins_loaded','organ_donor_widget_init');
// Shortcode function to display advertisement
function organ_donor_shortcode($paras="",$content="") {
    extract(shortcode_atts(array('image'=>'','target'=>'','nofollow'=>'','style'=>''),$paras));
    echo generate_organ_donor_code($image,$target,$nofollow,$style);
    return;
}
// Manual function to display advertisement
function organ_donor_register($image="",$style="",$paras="") {
    $target=organ_donor_get_parameters($paras,"target");
    $nofollow=strtolower(organ_donor_get_parameters($paras,"nofollow")); 
    echo generate_organ_donor_code($image,$target,$nofollow,$style);
    return;
}
// Generate XHTML compatible Organ Donor code
function generate_organ_donor_code($image="",$target="",$nofollow="",$style="") {
    // Set default details
    $site_url="https://www.organdonation.nhs.uk/ukt/Consent.do?campaign=1274";
    $image_url=WP_PLUGIN_URL."/organ-donor-register/images/";
    $text="Join the Organ Donor Register 0300 123 23 23";
    $plugin="Organ Donor Register";
    // Ensure an ID is passed
    if ($image=="") {$error=organ_donor_error("No image ID has been supplied",$plugin);}
    if (($image<1)or($image>5)) {$error=organ_donor_error("Invalid image ID",$plugin);}
    if ($error!==true) {
        if ($target!="") {$target=" target=\"".$target."\"";}
        if ($nofollow=="yes") {$nofollow=" rel=\"nofollow\"";}
        if ($style!="") {$style=" style=\"".$style."\"";}        
        if ($image==1) {$image_url.="110x110_ani.gif";}
        if ($image==2) {$image_url.="220x220_ani.gif";}
        if ($image==3) {$image_url.="69x69.jpg";}
        if ($image==4) {$image_url.="138x138_blue.jpg";}
        if ($image==5) {$image_url.="138x138_red.jpg";}
        return "<a href=\"".$site_url."\" id=\"donor\"".$target.$nofollow."><img src=\"".$image_url."\" alt=\"".$text."\" title=\"".$text."\" id=\"donor\"".$style."/></a>\n";
    }
    return;
}
// Function to generate widget
function organ_donor_widget($args) {
    extract($args);
    echo $before_widget;
    $options=get_option("organ_donor_widget");
    if (!is_array($options)) {$options=array('image'=>'','title'=>'NHS Organ Donor Register','target'=>'','nofollow'=>'');}
    if ($options['title']!="") {echo $before_title.$options['title'].$after_title;}
    echo "<br/><div style=\"text-align: center\">";
    echo generate_organ_donor_code($options['image'],$options['target'],$options['nofollow']);
    echo "</div><br/>\n";
    echo $after_widget;
    return;
}
// Function to extract parameters from an input string (1.0)
function organ_donor_get_parameters($input,$para) {
    $start=strpos(strtolower($input),$para."=");
    $content="";
    if ($start!==false) {
        $start=$start+strlen($para)+1;
        $end=strpos(strtolower($input),"&",$start);
        if ($end!==false) {$end=$end-1;} else {$end=strlen($input);}
        $content=substr($input,$start,$end-$start+1);
    }
    return $content;
}
// Function to report an error (1.2)
function report_error($errorin,$plugin_name) {
    echo "<p style=\"color: #f00; font-weight: bold;\">".$plugin_name.": ".__($errorin)."</p>\n";
    return true;
}
// Register widget
function organ_donor_widget_init() {
    register_sidebar_widget(__('Organ Donor Register'),'organ_donor_widget');
    register_widget_control('Organ Donor Register','organ_donor_widget_options');
}
function organ_donor_widget_options() {include_once(WP_PLUGIN_DIR."/organ-donor-register/organ-donor-widget-options.php");}
?>