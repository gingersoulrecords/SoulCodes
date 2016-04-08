<?php 
	$blocks = array(
		'div' => array(
			'title' 	=> '[div]',
			'before' 	=> '[div]',
			'after' 	=> '[/div]<br/><br/>',
		),
		'div2' => array(
			'title' 	=> '[div2]',
			'before' 	=> '[div2]',
			'after' 	=> '[/div2]<br/><br/>',
		),
		'div3' => array(
			'title' 	=> '[div3]',
			'before' 	=> '[div3]',
			'after' 	=> '[/div3]<br/><br/>',
		),
		'div4' => array(
			'title' 	=> '[div4]',
			'before' 	=> '[div4]',
			'after' 	=> '[/div4]<br/><br/>',
		),
		'50-50' => array(
			'title' 	=> __( 'Two columns (50-50)', 'soulstyles' ),
			'before' 	=> '[div md-width="50"]',
			'after' 	=> '[/div]<br/><br/>[div md-width="50"][/div]<br/><br/>',
		),
		'20-60-20' => array(
			'title' 	=> __( 'Three columns (20-60-20)', 'soulstyles' ),
			'before' 	=> '[div md-width="20"]',
			'after' 	=> '[/div]<br/><br/>[div md-width="60"][/div]<br/><br/>[div md-width="20"][/div]<br/><br/>',
		),
	);
	$blocks = apply_filters( 'soulstyles_presets', $blocks );

	$strings = 'tinyMCE.addI18n("' . $mce_locale .'.soulstyles", { blocks : '.json_encode($blocks).' });';