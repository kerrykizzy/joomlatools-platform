<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

// Create the copy/move options.
$options = array(
	JHtml::_('select.option', 'add', JText::_('COM_USERS_BATCH_ADD')),
	JHtml::_('select.option', 'del', JText::_('COM_USERS_BATCH_DELETE')),
	JHtml::_('select.option', 'set', JText::_('COM_USERS_BATCH_SET'))
);

// Create the reset password options.
$resetOptions = array(
	JHtml::_('select.option', '', JText::_('COM_USERS_NO_ACTION')),
	JHtml::_('select.option', 'yes', JText::_('JYES')),
	JHtml::_('select.option', 'no', JText::_('JNO'))
);

?>

<div id="batch-choose-action" class="k-form-group">
    <label id="batch-choose-action-lbl" for="batch-choose-action">
        <?php echo JText::_('COM_USERS_BATCH_GROUP') ?>
    </label>
    <select name="batch[group_id]" id="batch-group-id">
        <option value=""><?php echo JText::_('JSELECT') ?></option>
        <?php echo JHtml::_('select.options', JHtml::_('user.groups')); ?>
    </select>
</div>

<div class="k-form-group">
    <label>Group action</label>
    <div class="k-optionlist-joomla">
        <?php echo JHtml::_('select.radiolist', $options, 'batch[group_action]', '', 'value', 'text', 'add') ?>
        <div class="k-optionlist__focus"></div>
    </div>
</div>

<div class="k-form-group">
    <label><?php echo JText::_('COM_USERS_REQUIRE_PASSWORD_RESET'); ?></label>
    <div class="k-optionlist-joomla">
        <?php echo JHtml::_('select.radiolist', $resetOptions, 'batch[reset_id]', '', 'value', 'text', '') ?>
        <div class="k-optionlist__focus"></div>
    </div>
</div>

<script>
    kQuery(document).ready(function($) {
        $('.k-optionlist-joomla input').each(function() {
            if ($(this).attr('checked')) {
                $(this).parent().addClass('is-checked');
            }
            $(this).change(function() {
                $(this).parent().siblings('label').removeClass('is-checked');
                $(this).parent().addClass('is-checked');
            });
        });
    });
</script>