<?php

$EM_CONF[$_EXTKEY] = [
	'title' => 'Prototype',
	'description' => 'TYPO3 extension for rendering fluid prototype templates',
	'category' => 'distribution',
	'author' => 'Christian Pschorr',
	'author_email' => 'pschorr.christian@gmail.com',
	'state' => 'beta',
	'uploadfolder' => 0,
	'clearCacheOnLoad' => 0,
	'version' => '1.0.0',
	'constraints' => [
		'depends' => [
			'typo3' => '11.0.0-12.4.99',
		],
		'conflicts' => [],
		'suggests' => [],
	],
];
