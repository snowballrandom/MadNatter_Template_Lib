<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * MadNatter_Template_Lib
 *
    Copyright (C) <2012-2013>  <Kyle Coots>

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * 
 * An open source Template Library for PHP 5.1.6 or newer
 *
 * @package  	MadNatter_Template_Lib
 * @author		Kyle Coots
 * @copyright	Copyright (c) 2012 - 2013, Mad Natter
 * @since		Version 1.0
 * @filesource
 *
 */

class Template{
	
	private $template_dir 			= 'template';
	private $template_index			= 'index.php';
	private $template_header		= 'header.php';
	private $template_footer		= 'footer.php';
	private $template_title 		= 'Mad Natter';
	// View passed in through the load function.
	private $template_view			= 'welcome_message';
	
	private $template_assets_dir    = 'assets';
	private $template_css			= '';
	private $template_js			= '';
	private $template_meta			= '';
	
	public function __construct(){
		$this->ci =& get_instance();
		$this->set_template_dir();
		$this->set_template_index();
		$this->set_header();
		$this->set_footer();
	}
	
	public function load($view='', $view_data=''){
			
		if(isset($view) && $view !== ''){
			
			$this->template_view = (is_array($view) || is_object($view)) ? $this->template_view : $view;
		} 
		
		$template_data = new stdClass;
		$template_data->title			= $this->template_title;
		$template_data->template 		= $this->template_index;
		$template_data->header_view 	= $this->template_header;
		$template_data->css				= $this->template_css;
		$template_data->js				= $this->template_js;
		$template_data->meta			= $this->template_meta;
		$template_data->view		 	= $this->template_view;
		$template_data->footer_view 	= $this->template_footer;
		$template_data->view_data		= $view_data;
		return $template_data;
	}
	
	public function set_template_dir($dir=''){
		$this->template_dir = ($dir !== '') ? $dir : $this->template_dir;
	}
	public function set_template_index($file='', $template_dir=FALSE){
		if($template_dir === FALSE){
			$this->template_index = ($file !== '') ? $this->template_dir.'/'.$file : $this->template_dir.'/'.$this->template_index;
		}else{
			$this->template_index = ($file !== '') ? $file : $this->template_dir.'/'.$this->template_index;
		}
	}		
	public function set_header($header='', $template_dir=FALSE){
		if($template_dir === FALSE){
			$this->template_header = ($header !== '') ? $this->template_dir.'/'.$header : $this->template_dir.'/'.$this->template_header;
		}else{
			$this->template_header = ($header !== '') ? $header : $this->template_dir.'/'.$this->template_header;
		}	
	}
	public function set_footer($footer='', $template_dir=FALSE){
		if($template_dir === FALSE){
			$this->template_footer = ($footer !== '') ? $this->template_dir.'/'.$footer : $this->template_dir.'/'.$this->template_footer;
		}else{
			$this->template_footer = ($footer !== '') ? $footer : $this->template_dir.'/'.$this->template_footer;
		}
	}
		
	public function addtitle($title=''){
		$this->template_title = $this->template_title.$title;
	}
	
	/**
	 * Add Css adds css to the template object
	 * When adding css you only need the name with OUT the ext (i.e. "my_css")
	 * You can specify if the file is a remote css file with the second param,
	 * by default it's false. 
	 * 
	 * @param $css[string]
	 * @param $remote[bool]
	 * @return [string]
	 */
	public function addcss($src = '', $remote = FALSE, $attributes=''){
		
		if(isset($src) && $src !== ''){
				
			$attributes = $this->attributes_to_string($attributes);	
	
			if($remote == FALSE){
				$src = $this->url().$this->template_assets_dir.'/css/'.$this->stripExt($src).'.css';
			}
			
			$this->template_css = $this->template_css.
			'<link rel="stylesheet" type="text/css" href="'.$src.'"'.$attributes.' />'."\n";
		}
	}
	
	public function addjs($src = '', $remote = FALSE, $attributes=''){
			
		if(isset($src) && $src !== ''){
				
			$attributes = $this->attributes_to_string($attributes);	

			if($remote === FALSE){
				$src = $this->url().$this->template_assets_dir.'/js/'.$this->stripExt($src).'.js';
			}
		
			$this->template_js = $this->template_js.
			'<script type="text/javascript" src="'.$src.'"'.$attributes.' ></script>'."\n";
		}
	}
	
	public function addmeta($meta_data = ''){
		
		if($meta_data !== ''){
			$meta_atts = $this->attributes_to_string($meta_data);
			$this->template_meta  = $this->template_meta.
			'<meta'.$meta_atts.'>'."\n";
		}
	}
	
	
	
	public function attributes_to_string($attributes=''){
		
		if(isset($attributes) && $attributes !== ''){
			if(is_array($attributes) || is_object($attributes)){
				
			$atts = '';
			foreach ($attributes as $key => $val){
				$atts .= ' '.$key.'="'.$val.'"';
			}
			return $atts;
			}
		}
	}

	public function stripExt($str, $ext=''){
		
		if(is_string($str) && is_string($ext)){
			
			$haystack = $str; 	
			$ext = ($ext !== '') ? $ext : '.';
			$new_str = substr($haystack, 0, strpos($haystack, $ext));
			
			if($new_str === ''){
				return $str;
			}else{
				return $new_str;
			}		
		}
	}
	
	public function url(){
	  $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https" : "http";
	  return $protocol . "://" . $_SERVER['HTTP_HOST'].'/';
	}
	

}
