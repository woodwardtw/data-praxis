<?php
/**
 * ACF Related
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

//***************MODULES********************//

//MODULE AUTHORS
function data_praxis_authors(){
	$authors = get_field('authors');
	$html = "<div class='authors-block'> Authored by ";
	foreach($authors as $key => $author) {
		$spacer = "";
		if (sizeof($authors) > 0 && sizeof($authors) != $key+1){
			$spacer = ", ";
		}
	 	$html .= $author['user_firstname'] . " " . $author['user_lastname'] . $spacer;
	}
	 return $html . "</div>";
}


//ABSTRACT
function data_praxis_abstract(){
  $html = '';
  $abstract = get_field('abstract');

    if( $abstract) {      
      //$html .= "<h2>Abstract and description of the units</h2>";
      $html .= "<div class='abstract'>{$abstract}</div>";  
     return $html;    
    }

}


//LEARNING OUTCOMES
function data_praxis_learning_outcomes(){
	$html = "<div class='learning-outcomes-block'><h2>Learning Outcomes</h2><ol class='learning-outcomes-list'>";
	if( have_rows('learning_outcomes_block') ):

	    // Loop through rows.
	    while( have_rows('learning_outcomes_block') ) : the_row();

	        // Load sub field value.
	        $learning_outcome = get_sub_field('learning_outcome');
	        // Do something...
	        $html .= "<li>{$learning_outcome}</li>";
	    // End loop.
	    endwhile;
	    return $html . "</ol></div>";
		// No value.
		else :
		    // Do something...
		endif;
	}

// intro media

function data_praxis_intro_media(){
	$html = '';
  	$media = get_field('intro_media');
    if( $media) {      
      //$html .= "<h2>Abstract and description of the units</h2>";
      $html .= "<div class='intro-media'>{$media}</div>";  
     return $html;    
    }
}

//glossary 
function data_praxis_glossary(){
	$html = '<div class="accordion" id="glossary"><div class="glossary"><h2 id="vocabHeader"><button type="button" data-toggle="collapse" data-target="#words">Glossary</button></h2><ul id="words" class="collapse " aria-labelledby="vocabHeader" data-parent="#glossary">';
	if( have_rows('glossary') ):

	    // Loop through rows.
	    while( have_rows('glossary') ) : the_row();

	        // Load sub field value.
	        $term = get_sub_field('term');
	        $definition = get_sub_field('definition');
	        $link = get_sub_field('link');
	        // Do something...
	        $html .= "<li><a href='{$link}'>{$term}</a> {$definition}</li>";
	    // End loop.
	    endwhile;
	    return $html . "</ul></div>";
		// No value.
		else :
		    // Do something...
		endif;
	}


// <div class="accordion" id="accordionExample">
//   <div class="card">
//     <div class="card-header" id="headingOne">
//       <h2 class="mb-0">
//         <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
//           Collapsible Group Item #1
//         </button>
//       </h2>
//     </div>

//     <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
//       <div class="card-body">
//         Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
//       </div>
//     </div>
//   </div>


//recommended readings
	function data_praxis_recommended_readings(){
		$html = '<div class="readings"><h2>Recommended Readings</h2><ol>';
		if( have_rows('recommended_readings') ):
	
		    // Loop through rows.
		    while( have_rows('recommended_readings') ) : the_row();
	
		        // Load sub field value.
		        $citation = get_sub_field('citation');
		        $link = get_sub_field('link');
		        // Do something...
		          $html .= "<li>{$citation} <a href='{$link}'>{$link}</a></li>";
		    // End loop.
		    endwhile;
		    return $html . "</ol></div>";
			// No value.
			else :
			    // Do something...
			endif;
		}
	
//resources 

	function data_praxis_resources_repeater(){
		$html = '<div class="resources"><h2>KEY COMPLEMENTARY RESOURCES</h2><ol>';
		if( have_rows('resources') ):
		
		    // Loop through rows.
		    while( have_rows('resources') ) : the_row();
	
		        // Load sub field value.
		        $title = get_sub_field('title');
		        $link = get_sub_field('link');
		        // Do something...
		        $html .= "<li>{$title} <a href='{$link}'>{$link}</a></li>";

		    // End loop.
		    endwhile;
		    return $html . "</ol></div>";
			// No value.
			else :
			    // Do something...
			endif;
		}
	
//get lessons 
		function data_praxis_get_lessons(){
			
			$lessons = get_field('associated_lessons');
			if( $lessons ){
							$html = '<div class="lessons"><h2>Lessons</h2><ol>';

				  foreach( $lessons as $lesson ): 
			        // Setup this post for WP functions (variable must be named $post).
			        $html .= '<li><a href="'.get_the_permalink($lesson->ID).'">' . get_the_title($lesson->ID) . '</a></li>';
			    endforeach;
			    return $html . '</ol></div>';
			} 
			    // Reset the global post object so that the rest of the page works correctly.
			    wp_reset_postdata(); 
		}


//save acf json
		add_filter('acf/settings/save_json', 'data_praxis_json_save_point');
		 
		function data_praxis_json_save_point( $path ) {
		    
		    // update path
		    $path = get_stylesheet_directory(__FILE__) . '/acf-json'; //replace w get_stylesheet_directory() for theme
		    
		    
		    // return
		    return $path;
		    
		}


		// load acf json
		add_filter('acf/settings/load_json', 'data_praxis_json_load_point');

		function data_praxis_json_load_point( $paths ) {
		    
		    // remove original path (optional)
		    unset($paths[0]);
		    
		    
		    // append path
		    $paths[] = get_stylesheet_directory(__FILE__)  . '/acf-json';//replace w get_stylesheet_directory() for theme
		    
		    
		    // return
		    return $paths;
		    
		}