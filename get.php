<?php

        function get_uniqid( $post_id ) {

            $uniqid = get_post_meta( $post_id, 'manga_unique_id', true );

            return $uniqid;

        }

        function get_uniq_dir_slug( $string ){
            return md5( $string . date( "Y-m-d H:i:s" ) );
        }

$uniqid = get_uniqid(20);
$physical_chapter_slug = get_uniq_dir_slug('mnga');
$mkid = WP_MANGA_DATA_DIR . $uniqid . '/'. $physical_chapter_slug;
if (!mkdir($mkid, 0777, true)) {
   die('Failed to create folders...');
}
$url_to_image = 'https://2.bp.blogspot.com/-p12NfQXVzsc/VvrR6nGzFdI/AAAAAAAAEZM/QSEXO-WnEr0sUleGaItemBnslJvy2Pjrg/s1600/026816914_prevstill.jpg';
$my_save_dir = WP_MANGA_DATA_DIR . $uniqid . '/' . $physical_chapter_slug;
$filename = basename($url_to_image);
$complete_save_loc = $my_save_dir .'/'. $filename;
file_put_contents($complete_save_loc, file_get_contents($url_to_image));
print_r($mkid);

$manhg = new WP_DB_CHAPTER_DATA();

$args = array('chapter_id' => 1,
'data' => '{"1":{"src":"manga_5cbebab719492\/4928d2cfb7fbc88e9bbc632f897698a4\/1.jpg","mime":"image\/jpeg"},"2":{"src":"manga_5cbebab719492\/4928d2cfb7fbc88e9bbc632f897698a4\/2.jpg","mime":"image\/jpeg"}}',
'storage' => 'locla',
'data_id' => 33,
 );

$mng = $manhg->insert($args);

print_r($mng);
