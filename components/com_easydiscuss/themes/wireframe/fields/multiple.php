<?php
/**
* @package      EasyDiscuss
* @copyright    Copyright (C) 2010 - 2015 Stack Ideas Sdn Bhd. All rights reserved.
* @license      GNU/GPL, see LICENSE.php
* EasyDiscuss is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<?php if ($options) { ?>
<div <?php echo $field->required ? 'data-ed-custom-fields-required' : '' ?>>
	<select name="fields[<?php echo $field->id;?>][]" class="form-control" multiple="multiple">
	    <?php foreach ($options as $option) { ?>
	    	<option <?php echo $field->required ? 'data-ed-select-multiple-fields' : '' ?>  
	    			value="<?php echo $this->html('string.escape', $option);?>"
	        		<?php echo $value && is_array($value) && in_array($option, $value) ? ' selected="selected"' : '';?>
	        	>
	        	<?php echo $option;?>
	        </option>
	    <?php } ?>
	</select>
</div>	
<?php } ?>