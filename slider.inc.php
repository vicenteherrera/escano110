<?php
if ( $_SERVER['SERVER_NAME'] != 'localhost' && $_SERVER['SERVER_NAME'] != '127.0.0.1'  ) {
    $link = @mysql_connect('localhost','escano110blog','ddleD1f2de');
} else {
    $link = @mysql_connect('127.0.0.1','root','');
}

//URL=https://github.com/woothemes/FlexSlider/wiki/FlexSlider-Properties
    
if ( empty($link) ) {
	return;
}
    mysql_select_db('escano110blog') or die("Unable to select database");
    $query='
        SELECT
            wm2.meta_value AS featured_img,
            p1.*
        FROM 
            wp_x5iebq_posts p1
        LEFT JOIN 
            wp_x5iebq_postmeta wm1
            ON (
                wm1.post_id = p1.id 
                AND wm1.meta_value IS NOT NULL
                AND wm1.meta_key = "_thumbnail_id"              
            )
        LEFT JOIN 
            wp_x5iebq_postmeta wm2
            ON (
                wm1.meta_value = wm2.post_id
                AND wm2.meta_key = "_wp_attached_file"
                AND wm2.meta_value IS NOT NULL  
            )
    
        WHERE
            p1.post_status="publish" 
            AND p1.post_type="post"
        ORDER BY 
            p1.post_date DESC
        LIMIT 5';
    $result = mysql_query($query);
    if ( $result === false ) {
         throw new ExceptionDatabase();
         die;
    }
    $data = array();
    while ( $row = mysql_fetch_array($result)) {
        $data[] = $row;
    }
    mysql_close();
    /*
    http://wordpress.stackexchange.com/questions/86990/sql-query-needed-to-get-post-category-taxonomy-must-be-sql-statement
    
    SELECT wp_x5iebq_terms.name, wp_x5iebq_posts.* FROM wp_x5iebq_posts
	LEFT JOIN wp_x5iebq_postmeta ON(wp_x5iebq_posts.ID = wp_x5iebq_postmeta.post_id)
	LEFT JOIN wp_x5iebq_term_relationships ON(wp_x5iebq_posts.ID = wp_x5iebq_term_relationships.object_id)
	LEFT JOIN wp_x5iebq_term_taxonomy ON(wp_x5iebq_term_relationships.term_taxonomy_id = wp_x5iebq_term_taxonomy.term_taxonomy_id)
	LEFT JOIN wp_x5iebq_terms ON(wp_x5iebq_term_taxonomy.term_id = wp_x5iebq_terms.term_id)
    */


$prop_img = (500 / 909 );
?>



<div> <!--style="height:<?php echo round((370*$prop_img)+2); ?>px;">-->
    <div class="flex-container">
        <div class="flexslider">
            <ul class="slides">
            <?php
                foreach($data as $d) {
                    $date = date('n M, Y',strtotime( $d['post_date'] ));
                    $img = substr( $d['featured_img'], 0, strrpos( $d['featured_img'], '.' ) ) .'-520x245.'. substr( $d['featured_img'], strrpos( $d['featured_img'], '.' ) + 1 );
                    
                    echo '<li class="li-slider">';
                    
                    echo '<img src="http://www.xn--escao110-g3a.org/blog/wp-content/uploads/'.$img.'" style="width:300px; height: '.round(300*$prop_img).'px;" />';
                    echo '<p class="slider-info">';
                    echo '<span class="post_category">DIARIO DE DESARROLLO</span><span class="post_date">'.$date.'</span>';
                    echo '</p>';
                    echo '<span class="noticia_titulo">'.$d['post_title'].'</span>';
                    
                    echo '<div class="excerpt">';
                    if ( $d['post_excerpt'] != "" ) {
                        echo substr(strip_tags($d['post_excerpt']),0,500);
                    } else {
                        echo substr(strip_tags($d['post_content']),0,500);
                    }
                    echo '<br /><a href="http://www.xn--escao110-g3a.org/blog/'.$d['post_name'].'" class="leer_mas" target="_blank">Leer artículo</a>';
                    echo '</div>';
                    
                    echo '</li>';
                }
            ?>
            </ul>
        </div>
    </div>
</div>




<div class="slider-anchor-block" style="margin-top: 10px; padding: 0 6px; margin-bottom: 10px;">
    <?php
        $i = 1;
        $rels = array(
            1 => 5,
            2 => 1,
            3 => 2,
            4 => 3,
            5 => 4
        );
        foreach($data as $d) {
            
            $img = substr( $d['featured_img'], 0, strrpos( $d['featured_img'], '.' ) ) .'-520x245.'. substr( $d['featured_img'], strrpos( $d['featured_img'], '.' ) + 1 );
            $width = 120;
            echo '<a class="slide-anchor" href="#" rel="'.$rels[$i].'">';
            echo '<div class="miniatura-slider" style="width:'.$width.'px; height: '.round($width*$prop_img).'px; padding-left: 30px;">';
            echo '<img src="http://www.xn--escao110-g3a.org/blog/wp-content/uploads/'.$img.'" style="width:'.$width.'px; height: '.round($width*$prop_img).'px; margin: 0 auto;" /><br />';
            echo "</div>";
            echo '<span style="text-align: center;">'.$d['post_title'].'</span>';
            echo '</a>';
            $i++;
        }
    ?>
</div>

