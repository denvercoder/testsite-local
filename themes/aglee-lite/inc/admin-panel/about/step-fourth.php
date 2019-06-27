<?php
/**
 * Changelog
 */

$aglee_lite = wp_get_theme( 'aglee-lite' );
?>
<div class="featured-section changelog">
<?php
	WP_Filesystem();
	global $wp_filesystem;
	$aglee_lite_changelog       = $wp_filesystem->get_contents( get_template_directory() . '/README.txt' );
	$changelog_start = strpos($aglee_lite_changelog,'== Changelog ==');
	$aglee_lite_changelog_before = substr($aglee_lite_changelog,0,($changelog_start+15));
	$aglee_lite_changelog = str_replace($aglee_lite_changelog_before,'',$aglee_lite_changelog);
	$aglee_lite_changelog = str_replace('*','<br/>*',$aglee_lite_changelog);
	$aglee_lite_changelog = str_replace('= 1.0','<br/><br/>= 1.0',$aglee_lite_changelog);
	echo $aglee_lite_changelog;
	echo '<hr />';
	?>
</div>