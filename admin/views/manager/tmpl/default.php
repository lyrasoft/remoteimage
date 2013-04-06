<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_remoteimage
 *
 * @copyright   Copyright (C) 2012 Asikart. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Generated by AKHelper - http://asikart.com
 */

// no direct access
defined('_JEXEC') or die;

$doc 	= JFactory::getDocument() ;


JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');
RemoteimageHelper::_('include.core');
JHtml::_('jquery.framework', true);
$doc->addStylesheet( 'components/com_akquickicons/includes/jquery-ui/css/smoothness/jquery-ui-1.8.24.custom.css' );
//$doc->addscript( 'components/com_akquickicons/includes/jquery-ui/js/jquery-1.7.2.min.js' );
$doc->addscript( 'components/com_akquickicons/includes/jquery-ui/js/jquery-ui-1.8.24.custom.min.js' );
$doc->addStylesheet( 'components/com_remoteimage/includes/js/elfinder/css/elfinder.min.css' );
$doc->addStylesheet( 'components/com_remoteimage/includes/js/elfinder/css/theme.css' );
JHtml::script( JURI::base().'components/com_remoteimage/includes/js/elfinder/js/elfinder.min.js' );
// RMHelper::_('include.addJS', 'jstree/_lib/jquery.cookie.js');
// RMHelper::_('include.addJS', 'jstree/_lib/jquery.hotkeys.js');
// RMHelper::_('include.addJS', 'jstree/jquery.jstree.js');
// RMHelper::_('include.addJS', 'folder-tree.js');


$app = JFactory::getApplication() ;
if( JVERSION >= 3){
	JHtml::_('formbehavior.chosen', 'select');
	if($app->isSite()){
		//RemoteimageHelper::_('include.fixBootstrapToJoomla');
	}
}else{
	RemoteimageHelper::_('include.bluestork');
	// RemoteimageHelper::_('include.fixBootstrapToJoomla');
}


$script = <<<EL

var elSelected ;

jQuery().ready(function($) {
	var elf = $('#elfinder').elfinder({
		url : 'index.php?option=com_remoteimage&task=manager' ,
		handlers : {
			select : function(event, elfinderInstance) {
				var selected = event.data.selected;

				if (selected.length) {
					elSelected = [];
					jQuery.each(selected, function(i, e){
						elSelected[i] = elfinderInstance.file(e);
					});
				}

			}
		}
	}).elfinder('instance');
});
EL;

$doc->addScriptDeclaration($script) ;


// Init some API objects
// ================================================================================
$date 	= JFactory::getDate( 'now' , JFactory::getConfig()->get('offset') ) ;
$doc 	= JFactory::getDocument() ;
$uri 	= JFactory::getURI() ;
$user	= JFactory::getUser() ;



// For Site
// ================================================================================
if($app->isSite()) {
	RemoteimageHelper::_('include.isis');
}



?>
<script type="text/javascript">
	<?php if( $app->isSite() ): ?>
	WindWalker.fixToolbar(0, 300) ;
	<?php endif; ?>
	
	Joomla.submitbutton = function(task)
	{
		if (task == 'manager.cancel' || document.formvalidator.isValid(document.id('manager-form'))) {
			Joomla.submitform(task, document.getElementById('manager-form'));
		}
		else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
	
</script>

<div id="remoteimage-manager-edit" class="<?php echo (JVERSION >= 3) ? 'joomla30' : 'joomla25' ?>">

	<!--<form action="<?php echo JRoute::_( JFactory::getURI()->toString() ); ?>" method="post" name="adminForm" id="manager-form" class="form-validate" enctype="multipart/form-data">	-->
		
		<!-- Bodys -->
		<div class="row-fluid">
			<div id="elfinder" class="span12">
				
			</div>
		</div>
		
		<div class="row-fluid">
			<div class="span12 form-actions">
				<button class="btn btn-primary" onclick="if (window.parent) window.parent.insertImage(elSelected);">
					<?php echo JText::_('COM_REMOTEIMAGE_INSERT_IMAGES'); ?>
				</button>
			</div>
		</div>
		
	<!--	

		<div id="hidden-inputs">
			<input type="hidden" name="option" value="com_remoteimage" />
			<input type="hidden" name="task" value="" />
			<?php echo JHtml::_('form.token'); ?>
		</div>
		<div class="clr"></div>
	</form>-->

</div>