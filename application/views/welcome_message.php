
	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}
	h2 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 17px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}
	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	p.note{
		font-weight:bold;
		font-size:12px;
		position:relative;
		top:-16px;
	}
	</style>

<div id="container">
	<h1>Mad Natter Template Library</h1>

	<div id="body">
		<p>The page you are looking at is being generated dynamically by CodeIgniter using the Mad Natter Template Library.</p>

		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/welcome.php</code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
	</div>

	<div id="body">
		<h2>Usage</h2>
		<p>How to use the Mad Natter Templae Library</p>
		
		<p>We start by loading the template library</p>
		<code>$this->load->library('template');</code>
		Or 
		<code>$autoload['libraries'] = array('template');</code>
		
		<p>Now that we have the library loaded we can use it like this.</p>
		<code>
			$template_data = $this->template->load('welcome_message');
			<br/>
			$this->load->view($template_data->template, $template_data);
		</code>
		
		<h2>Adding Css</h2>
		<p>You css files should be in the directory "/assets/css/". 
		If your file is in a different location you can use the second param to allow you to specify the exact location. Note: you will need to specify the absolute url if using the second param.</p>
		<code>$this->template->addcss($src, $remote, $attr);</code>
		
		<p>Local file in the "/assets/css/" directory</p>
		<code>$this->template->addcss('my_css');</code>
		
		<p class="note">Notice that there isn't a need to specify the extension (i.e. "my_css.css")</p>
		<p>Loading a remote file or file with different extension</p>
		<code>$this->template->addcss('http://www.example.com/somefolder/someplace/my_css.css', true);</code>
		
		<p>Adding extra attributes to the link tag for you css file. You can use an array() or an object.</p>
		<code>
			$attr = array('charset'=>'utf-8');
			<br />
			$this->template->addcss('my_css', false, $attr);
		</code>
		<p> Will produce:
			<code>&ltlink rel="stylesheet" type="text/css" href="http://localhost/assets/css/my_css.css" charset="utf-8" /&gt;</code>
		</p>
		
		<h2>Adding Javascript</h2>
		<p>Adding Java script is exactly the same as adding css</p>
		<code>$this->template->addjs($src, $remote, $attr);</code>
		
		<h2>Adding Meta</h2>
		<p>Adding meta is as simple as passing an array or object to the function</p>
		<code>$this->template->addmeta($meta);</code>
		<code>
			$meta = array('charset'=>'utf-8');
			<br />
			$this->template->addmeta($meta);
		</code>
		Will produce:
		<code>
			&lt;meta charset="utf-8"&gt;
		</code>
		Or 
		<code>
			$meta = new stdClass;
			<br>
			$meta->charset = 'utf-8';
			<br />
			$this->template->addmeta($meta);
			<br />
			<br />
			Will produce: &lt;meta charset="utf-8"&gt;
		</code>
	</div>
	
</div>
