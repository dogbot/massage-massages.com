<?php

$cms_city = $locationData['city']?:"City";
$cms_country = $locationData['countryCode']?:"USA";
$cms_st = $locationData['region']?:"ST";
$cms_state = $locationData['regionName']?:"State";
$cms_zip = $locationData['zip']?:"20005";





$page_type = "home";
$page_title = "Massage Services";
$page_keywords = "massage, home massage, massage at home, massage therapy, 
massage near me, massage service, massage spa, massage therapist, 
massage at home, massage at home near me, massage at home service, 
massage at home spa, massage at home therapist, massage";

$page_description = "Indulge in the luxury of personalized massages by 
independent therapists, right in the comfort of your own home. Experience 
relaxation on your terms with our at-home massage service. Book now for a 
bespoke wellness experience."; 
  
$page_description_shrt = "At-home massage therapy.";


$cms_hero_title = "Home Serenity";
$cms_hero_breadcrum = array("Today","Professional", "Convenient", "Personalized Massage Therapy at Your Doorstep");

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


