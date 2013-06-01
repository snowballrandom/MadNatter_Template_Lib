Mad Natter Template Library
===============

A simple template library for Codeigniter

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
 
    An open source Template Library for PHP 5.1.6 or newer
  
    @package  	MadNatter_Template_Lib
    @author		Kyle Coots
    @copyright	Copyright (c) 2012 - 2013, Mad Natter
    @since		Version 1.0
    @filesource https://github.com/snowballrandom/MadNatter_Template_Lib/

More complete tutorial can be found over at my blog site http://www.snowballrandom.com/mad-natter-template-library-for-codeigniter/

How to use the Mad Natter Templae Library
		
We start by loading the template library
    
    $this->load->library('template');
	
Or 
	
    $autoload['libraries'] = array('template');
		
Now that we have the library loaded we can use it like this.
		        
	$template_data = $this->template->load('welcome_message');
	
	$this->load->view($template_data->template, $template_data);
		
		
Adding Css

You css files should be in the directory "/assets/css/". 

If your file is in a different location you can use the second param to allow you to specify the exact location. 
Note: you will need to specify the absolute url if using the second param.</p>

    $this->template->addcss($src, $remote, $attr);
		
Local file in the "/assets/css/" directory
	
    $this->template->addcss('my_css');
		
Notice that there isn't a need to specify the extension (i.e. "my_css.css")

Loading a remote file or file with different extension
	
    $this->template->addcss('http://www.example.com/somefolder/someplace/my_css.css', true);
		
Adding extra attributes to the link tag for you css file. You can use an array() or an object.
		
	$attr = array('charset'=>'utf-8');
	
	$this->template->addcss('my_css', false, $attr);
	
Will produce:
    
    <link rel="stylesheet" type="text/css" href="http://localhost/assets/css/my_css.css" charset="utf-8" / >
		
Adding Javascript

Adding Java script is exactly the same as adding css
	
    $this->template->addjs($src, $remote, $attr);
		
Adding Meta

    $this->template->addmeta($meta);

Adding meta is as simple as passing an array or object to the function
			
    $meta = array('charset'=>'utf-8');
	$this->template->addmeta($meta);
	
Will produce:


    <meta charset="utf-8" >

Or 

	$meta = new stdClass;
	$meta->charset = 'utf-8';
	$this->template->addmeta($meta);

Will produce: 
    
    <meta charset="utf-8" >
		
