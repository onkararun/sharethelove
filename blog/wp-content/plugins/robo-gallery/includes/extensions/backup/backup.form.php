<?php 
/*
*      Robo Gallery     
*      Version: 1.2
*      By Robosoft
*
*      Contact: http://robosoft.co
*      Created: 2015
*      Licensed under the GPLv2 license - http://opensource.org/licenses/gpl-2.0.php
*
*      Copyright (c) 2014-2015, Robosoft. All rights reserved.
*      Available only in http://robosoft.co/
*/



if(!function_exists('rbs_backup_error_message')){
	function rbs_backup_error_message($message, $type='error'){
		return '<div id="message" class="'.$type.'">'._($message).'</div>';
	}
}

?>
<div class="wrap">
	<h1  class="rbs-nobackup">
		<?php _e('Robo Gallery Backup', 'rbs_gallery'); ?>
	</h1>
<br>

<?php 
	if( isset($_POST['rbsSubmitBackup']) ){
		if( check_admin_referer( 'rbs-gallery-backup-import', 'rbs-gallery-backup'  )  ){
			if (  $_FILES['rbsBackupFile']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['rbsBackupFile']['tmp_name'])) {
				$tmp_name = $_FILES['rbsBackupFile']['tmp_name'];
				rbs_gallery_include('backup.class.php', plugin_dir_path( __FILE__ ));
				$wordPressExport = new rbsGalleryExport();
				//$wordPressExport->setArchiveDir(ABSPATH . 'tmp');
				//$wordPressExport->setArchiveChunkSize(2000000);
				//$wordPressExport->exportPostsZip(['post_type' => $postType], 'export.xml');
				//$wordPressExport->duplicate = $duplicate;

				$export = new rbsGalleryExport('robo_gallery_table');
				
				if(isset($_POST['rbsGalleryBackupDuplicate']) && $_POST['rbsGalleryBackupDuplicate'] ){
					$export->duplicate = 1;
				}

				$result = $export->importPostsXml($tmp_name);

				echo '<div class="card">';
					if( isset($result['errors']) && count($result['errors']) ){
						echo rbs_backup_error_message( __('Error Import ', 'rbs_gallery') );
						print_r($result['errors']);
					} else {
				
						echo '<h2>'.__('Success Import ', 'rbs_gallery').'</h2>';
						if( isset($result['import']) && is_array($result['import']) ){
							if( isset($result['import']['post'])  	)	echo '<p>'.__('Import Post', 'rbs_gallery').': '.$result['import']['post'].'</p>';
							if( isset($result['import']['element']) )	echo '<p>'.__('Import Images', 'rbs_gallery').': '.$result['import']['element'].'</p>';
							//if( isset($result['import']['file'])  	)	echo '<p> --- Import Images Files: '.$result['import']['file'].'</p>';
							echo "<hr>";
						}

						


						if( isset($result['skipped']) && is_array($result['skipped']) ){
							if( isset($result['skipped']['post'])  	)	echo '<p>'.__('Skipped Post', 'rbs_gallery').': '.	$result['skipped']['post']. '</p>';
							if( isset($result['skipped']['element']) )	echo '<p>'.__('Skipped Images', 'rbs_gallery').': '.$result['skipped']['element'].'</p>';
							//if( isset($result['skipped']['file'])  	)	echo '<p> --- Import Images Files: '.$result['skipped']['file'].'</p>';
						}
					}
				echo '</div>';
				//print_r($result);
			} else {
				echo rbs_backup_error_message('Error: please check backup XML file');
			}
		} else {
			echo rbs_backup_error_message('Error: check secure');
		}
	}

function rbs_backup_tabs( $current = 'export' ) {
    $tabs = array( 'export' => 'Export Gallery', 'import' => 'Import Gallery' );
    //echo '<div id="icon-themes" class="icon32"><br></div>';
    echo '<h2 class="nav-tab-wrapper">';
	    foreach( $tabs as $tab => $name ){
	        $class = ( $tab == $current ) ? ' nav-tab-active' : '';
	        echo "<a class='nav-tab$class' href='edit.php?post_type=robo_gallery_table&page=robo-gallery-backup&tab=$tab'>$name</a>";
	    }
    echo '</h2>';
}

$tab = 'export';
if ( isset( $_GET['tab'] ) )  $tab = $_GET['tab'];
if ( isset( $_POST['tab'] ) ) $tab = $_POST['tab'];
rbs_backup_tabs( $tab);

$today = date("Y_j_n"); 

switch ($tab) {
	default:
 	case 'export':
?>
	<table class="form-table">
		<tbody>
			<form method="post" enctype="multipart/form-data" class="rbs_download_backup_export" action="<?php echo admin_url().'edit.php?post_type=robo_gallery_table&page=robo-gallery-backup&tab='.$tab; ?>">
			<tr>
				<th scope="row"><label for="rbsGalleryBackupFilename"><?php _e('File Name', 'rbs_gallery'); ?></label></th>
				<td>
					<input type="text" class="regular-text" id="rbsGalleryBackupFilename" name="rbsGalleryBackupFilename" value="<?php echo 'export_'.$today.'.xml';?>" > 
					<p class="description" id="rbsBackupFile-description"><?php _e('After EXPORT copy images from server folder: {Wordpress folder}/wp-content/uploads  to the new location by FTP'); ?></p>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" class="button button-primary " value="<?php _e('Download Backup'); ?>" name="rbsDownloadBackup">
					<input type="hidden" name="rbsGalleryExport" value="1">
					<?php wp_nonce_field( 'rbs-gallery-backup-export', 'rbs-gallery-backup' ); ?>
				</td>
			</tr>
			</form>
		</tbody>
	</table>
<?php 
	break;
	case 'import':
?>
	<table class="form-table">
		<tbody>
			<form method="post" enctype="multipart/form-data" class="wp-upload-form" action="<?php echo admin_url().'edit.php?post_type=robo_gallery_table&page=robo-gallery-backup&tab='.$tab; ?>">
			<tr>
				<th scope="row"><label for="rbsGalleryBackupDuplicate"><?php _e('Duplicate', 'rbs_gallery'); ?></label></th>
				<td>
					<fieldset>
						<legend class="screen-reader-text"><span><?php _e('Duplicate', 'rbs_gallery'); ?></span></legend>
						<label for="rbsGalleryBackupDuplicate">
							<input name="rbsGalleryBackupDuplicate" id="rbsGalleryBackupDuplicate" value="1" type="checkbox">
							<?php _e('Make copy if such gallery or image already exist in system', 'rbs_gallery'); ?>
						</label>
					</fieldset>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="rbsBackupFile"><?php _e('Select backup file', 'rbs_gallery'); ?></label></th>
				<td>	
					<label class="screen-reader-text" for="pluginzip">Import xml file</label>
					<input type="file" name="rbsBackupFile" id="rbsBackupFile">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" class="button button-primary " value="<?php _e('Upload XML'); ?>" name="rbsSubmitBackup">
				</td>
			</tr>
			<?php wp_nonce_field( 'rbs-gallery-backup-import', 'rbs-gallery-backup' ); ?>
			</form>
		</tbody>
	</table>
<?php } ?>
</div>
<?php 