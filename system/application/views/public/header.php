<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php print $this->page->output_metatags(); ?>
	<title><?php print $header.' | '.$this->preference->item('site_name')?></title>
	<?php print $this->page->output_variables()?>
	<?php print $this->page->output_assets('public')?>
	<?php print $this->page->output_js()?>
</head>

<body>
<div id="wrapper">
    <div id="header">
        <h1><?php print $this->preference->item('site_name')?></h1>
    </div>