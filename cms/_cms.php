<?php
$site_name="MassagesMassages";
$site_domain="massage-massages.com";
$site_mktg_user="";


$cms_info_media_city = "Los Alamois";
$cms_info_media_country = "USA";
$cms_info_media_st = "ST";
$cms_info_media_state = "State";
$cms_info_media_zip = "12345";
$cms_info_media_phone_link="";
$cms_info_media_phone_formatted  = "";

$cms_info_media_email_link= empty($site_mktg_user)?"":$site_mktg_user."@".$site_domain;
$cms_info_media_email_formatted= empty($site_mktg_user)?"":$site_mktg_user."@".$site_domain;

$cms_hero_title = "At home massage";
$cms_hero_breadcrum = array("Today","Professional", "Convenient");

// value  proposition
$cms_val_title="Relaxation delivered to your door step";
$cms_val_description= "Experience personalized home massage 
therapy. Our skilled therapists bring relaxation to your doorstep, 
transforming your space into a serene sanctuary. 
Say goodbye to stress as you indulge in tailored pampering, enjoying 
the ultimate convenience and rejuvenation without stepping out. 
Rediscover bliss in the comfort of your own home.";

$cms_massage_types = array("Swedish","Thai","Sports","Reflexology","Deep tissue","Shiatsu","Lymphatic drainage") ;
$json_testimonials = '{
        "testimonials": [
            {
                "author": "Emily Rodriguez",
                "content": "Absolutely amazing experience! The therapist was professional, and the convenience of having a massage at home was unbeatable. Will definitely book again!",
                "other": "Capital Gardens"
            },
            {
                "author": "Daniel Patel",
                "content": "I felt like royalty! The skill of the therapist and her attention to detail were impeccable. Having a massage in my own space was pure luxury.",
                "other": "Eastern Shore"
            },
            {
                "author": "Samantha Myers",
                "content": "Highly recommend! From booking to the massage itself, everything was seamless. It was such a treat to unwind without leaving home.",
                "other": "Vienna Estates"
            }
        ]
    }';
    
    // Convert JSON data to PHP array
    $json_testimonials_data = json_decode($json_testimonials, true);
  
    // Check if JSON decoding was successful
    if ($json_testimonials_data === null) {
        echo 'json error';
                $json_testimonials_data = array("content" => "Error retriving testimonials data", "author" => "", "other" => "");
        exit;
    }
    
    // HTML output


