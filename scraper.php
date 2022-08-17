<?
// This is a template for a PHP scraper on morph.io (https://morph.io)
// including some code snippets below that you should find helpful

// require 'scraperwiki.php';
// require 'scraperwiki/simple_html_dom.php';
//
// // Read in a page
// $html = scraperwiki::scrape("http://foo.com");
//
// // Find something on the page using css selectors
// $dom = new simple_html_dom();
// $dom->load($html);
// print_r($dom->find("table.list"));
//
// // Write out to the sqlite database using scraperwiki library
// scraperwiki::save_sqlite(array('name'), array('name' => 'susan', 'occupation' => 'software developer'));
//
// // An arbitrary query against the database
// scraperwiki::select("* from data where 'name'='peter'")

// You don't have to do things with the ScraperWiki library.
// You can use whatever libraries you want: https://morph.io/documentation/php
// All that matters is that your final data is written to an SQLite database
// called "data.sqlite" in the current working directory which has at least a table
// called "data".
?>
<?php
require 'scraperwiki.php';
     $url = 'http://www.phonearena.com/phones/Samsung-Infuse-4G_id5119/fullspecs';
     $html = scraperwiki::scrape($url);  
     require 'scraperwiki/simple_html_dom.php';
              $dom = new simple_html_dom();
              $dom->load($html);
     //$dom->remove('span[class=s_tooltip_content]');
                 foreach($dom->find('div[class=s_specs_box] li[class=s_lv_1] ul[class=s_lv_2] li') as $data)
                 {
                    

                    if($data->parent()->parent()->getElementByTagName('strong[class=s_lv_2] span[class=s_tooltip_anchor]'))
                        print $data->parent()->parent()->getElementByTagName('strong[class=s_lv_2] span[class=s_tooltip_anchor]')->plaintext." : ";
                    else
                        print $data->parent()->parent()->getElementByTagName('strong[class=s_lv_2]')->plaintext." : ";

                     print $data->plaintext."\n";
                 }          
 ?>
