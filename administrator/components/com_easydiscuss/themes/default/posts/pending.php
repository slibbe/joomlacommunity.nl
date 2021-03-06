<?php
/**
* @package		EasyDiscuss
* @copyright	Copyright (C) 2010 - 2015 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasyDiscuss is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<form action="index.php" method="post" name="adminForm" id="adminForm" data-ed-form>
	<div class="app-filter filter-bar form-inline">
	    <div class="form-group">
	        <?php echo $this->html('table.search', 'search', $search); ?>
	    </div>
	    
	    <div class="form-group">
	    	<?php echo $this->html('table.limit', $pagination); ?>
	    </div>
	</div>

	<div class="panel-table">
		<table class="app-table app-table-middle table table-striped" data-ed-table>
			<thead>
				<tr>
					<td width="1%">
						<?php echo $this->html('table.checkall'); ?>
					</td>
					<td style="text-align:left;">
						<?php echo JText::_('Type'); ?>
					</td>

					<td width="1%" class="center">
						<?php echo JText::_('COM_EASYDISCUSS_TABLE_COLUMN_TYPE'); ?>
					</td>

					<td width="10%" class="center">
						<?php echo JText::_('COM_EASYDISCUSS_USER'); ?>
					</th>

					<td width="15%" class="center">
						<?php echo JText::_('COM_EASYDISCUSS_DATE'); ?>
					</th>

					<td width="1%" class="center">
						<?php echo JText::_('COM_EASYDISCUSS_COLUMN_ID');?>
					</th>
				</tr>
			</thead>
			<tbody>

			<?php if ($posts) { ?>
				<?php $i = 0; ?>
				<?php foreach ($posts as $post) { ?>
				<tr>
					<td class="center">
						<?php echo $this->html('table.checkbox', $i++, $post->id); ?>
					</td>
					
					<td style="text-align:left;">

						<div>
							<?php echo $post->getTitle();?>
						</div>

						<p>
							<?php echo $post->content; ?>
						</p>

						<div style="font-size: 11px;">
							<?php if ($post->isQuestion()) { ?>
							<span style="padding-right: 5px;border-right: 1px solid #d7d7d7;">
								<?php echo JText::_('COM_EASYDISCUSS_CATEGORY');?>: <?php echo $post->getCategory()->getTitle();?></a>
							</span>
							<?php } ?>

							<?php if ($post->isReply()) { ?>
							<span style="padding-right: 5px;border-right: 1px solid #d7d7d7;">
								<?php echo JText::_('COM_EASYDISCUSS_POST');?>: <a href="index.php?option=com_easydiscuss&view=post&layout=edit&id=<?php echo $post->getParent()->id;?>"><?php echo $post->getParent()->title;?></a>
							</span>
							<?php } ?>

							<span style="padding-left: 6px;">
								<?php echo JText::_('COM_EASYDISCUSS_IP_ADDRESS');?>: <?php echo $post->ip;?>
							</span>
						</div>
					</td>

					<td class="center">
						<?php if ($post->isQuestion()) { ?>
							<span class="label label-warning"><?php echo JText::_('Question'); ?></span>
						<?php } else { ?>
							<span class="label label-info"><?php echo JText::_('Reply'); ?></span>
						<?php } ?>
					</td>

					<td class="center">
						<?php echo $post->getOwner()->getName();?>
					</td>

					<td class="center">
						<?php echo $post->getDateObject()->toSql(); ?>
					</td>

					<td class="center">
						<?php echo $post->id; ?>
					</td>
				</tr>
				<?php } ?>
			<?php } else { ?>
				<tr>
					<td colspan="6" class="center empty">
						<?php echo JText::_('COM_EASYDISCUSS_NO_PENDING_POSTS_YET'); ?>
					</td>
				</tr>
			<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="6">
						<div class="footer-pagination center">
							<?php echo $pagination->getListFooter(); ?>
						</div>
					</td>
				</tr>
			</tfoot>
		</table>
	</div>

	<input type="hidden" name="layout" value="pending" />
	<input type="hidden" name="from" value="pending" />
	
	<?php echo $this->html('form.hidden', 'posts', 'posts'); ?>
</form>