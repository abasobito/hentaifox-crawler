
<!DOCTYPE html>
<html>
<head>
	<title>hentai fox crawler</title>
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>
<form action="" method="POST">
    <h2 class="inputmanga"> image url:</h2></p>
    <input type="text" name="url">
    <input class="sumbitmanga" name="activated" type="submit" value="Get!">

 </form>


<?php
require 'crawel.php';
if (isset($_POST['activated']) && is_admin()){ 
        $new_page_title = $manga_name; 
        $new_page_content = '<a href="http://ai-manga.com/" target="_blank" rel="noopener">ai-manga </a>

<a href="https://twitter.com/aimanga3" target="_blank" rel="noopener">twitter</a>'; 
               

        $page_check = get_page_by_title($new_page_title); 
        $term_id = term_exists( 'system', 'status' );
        $new_page = array( 
                
                'post_type' => 'wp-manga', 
                'post_title' => $manga_name,
                'post_content' => $new_page_content, 
                'post_status' => 'publish', 
                'post_author' => 1,
                'tax_input' => array (
                'wp-manga-release' => $manga_parodies,
                'wp-manga-tag' => $manga_tags,
                'wp-manga-artist' => $manga_artist,
                'wp-manga-release' => $manga_parodies,
                'wp-manga-author' => $manga_group,
                'wp-manga-artist' => $manga_artist,
                'wp-manga-genre' => array(585,447),
                )
            
                
        ); 


        if(!isset($page_check->ID)){
        
            $new_page_id = wp_insert_post($new_page); 

                 update_post_meta($new_page_id, '_wp_manga_chapter_type', 'manga'); 
                 // manga alternative
                 update_post_meta($new_page_id, '_wp_manga_alternative', $manga_name); 
                 // manga type
                 update_post_meta($new_page_id, '_wp_manga_type', 'manga'); 

       $image_url        = $imgcover;

        $upload_dir       = wp_upload_dir();
        $image_data       = file_get_contents($image_url);
        $unique_file_name = wp_unique_filename( $upload_dir['path'], basename($image_url) );
        $filename         = basename( $unique_file_name );
        if( wp_mkdir_p( $upload_dir['path'] ) ) {
            $file = $upload_dir['path'] . '/' . $filename;
        } else {
            $file = $upload_dir['basedir'] . '/' . $filename;
        }
        file_put_contents( $file, $image_data );
        $wp_filetype = wp_check_filetype( $filename, null );
        $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title'     => $manga_name,
            'post_content'   => '',
            'post_status'    => 'inherit'
        );
        // This function inserts an attachment into the media library
        $attach_id = wp_insert_attachment( $attachment, $file, $new_page_id );
        // This function generates metadata for an image attachment. 
        // It also creates a thumbnail and other intermediate sizes of the image attachment based on the sizes defined
        $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
        // Update metadata for an attachment.
        wp_update_attachment_metadata( $attach_id, $attach_data );
        // Set a post thumbnail. So it links the attachment id to the corresponding post id
        set_post_thumbnail( $new_page_id, $attach_id );

        update_post_meta($attach_id, '_wp_attachment_image_alt', $manga_name);

        update_post_meta( $new_page_id, '_yoast_wpseo_focuskw', $manga_name );
                
        } 

}  

 ?>
</body>
</html>



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
