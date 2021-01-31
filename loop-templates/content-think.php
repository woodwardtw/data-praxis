<?php
/**
 * Thinking grid partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

the_content();?>

<div class="row" id="thinking-grid">
    <div class="offset-md-9 col-md-3 tools" id="toolbox">
<!--       <textarea placeholder='entry your y axis top label here' rows="1" cols="50" id="y-top-entry"></textarea>
      <textarea placeholder='entry your y axis bottom label here' rows="1" cols="50" id="y-bottom-entry"></textarea> -->
            <button id="make">+ element</button>
    </div>
  </div>
  <div class="row axis">
    <div class="col-md-12" id="grid">
      <div class="y-centered label top" id="y-top" contenteditable="true"
     onclick="document.execCommand('selectAll',false,null)">click to edit</div>
     <div class="y-centered label bottom" id="y-bottom" contenteditable="true"
     onclick="document.execCommand('selectAll',false,null)">click to edit</div>
      
      <div class="x-left label">closed<br>data</div>
     <div class="x-right label">open<br>data</div>

    </div>
  </div>

