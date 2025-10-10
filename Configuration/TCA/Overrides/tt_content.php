<?php

//// ---------------------------------------------------------------------------------------------------------------------
//// Modul in TYPO3 tt_content registrieren
//\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
//	[
//		'LLL:EXT:datamints_prototype/Resources/Private/Language/locallang_tca.xlf:title',
//		'datamints_prototype',
//		'datamints-prototype-module'
//	],
//	'CType',
//	'datamints_prototype'
//);

// ---------------------------------------------------------------------------------------------------------------------
// Neue Felder in tt_content
//$versionInformation = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Information\Typo3Version::class);
//$tcaFieldConfiguartion = [];

//if($versionInformation->getMajorVersion() >= 12) {
//	$tcaFieldConfiguartion['tx_datamints_prototype_template'] = [
//		'exclude' => true,
//		'label' => 'LLL:EXT:datamints_prototype/Resources/Private/Language/locallang_tca.xlf:tt_content.template',
//		'config' => [
//			'type' => 'file',
//			'maxitems' => 1,
//			'appearance' => [
//				'collapseAll' => true,
//				'fileUploadAllowed' => false,
//			],
//		]
//	];
//
//} else {
//	$tcaFieldConfiguartion['tx_datamints_prototype_template'] = [
//		'exclude' => true,
//		'label' => 'LLL:EXT:datamints_prototype/Resources/Private/Language/locallang_tca.xlf:tt_content.template',
//		'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
//			'tx_datamints_prototype_template',
//			[
//				'maxitems' => 1,
//				'appearance' => [
//					'collapseAll' => true,
//					'fileUploadAllowed' => false,
//					'fileByUrlAllowed' => false
//				],
//			],
//			''
//		),
//	];
//}
//
//\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $tcaFieldConfiguartion);
//
//// -------------------------------------------------------------------------------------------------------------------
//// Neue Paletten hinzufuegen
//$GLOBALS['TCA']['tt_content']['palettes']['tx_datamints_prototype_template'] = [
//	'label' => 'LLL:EXT:datamints_prototype/Resources/Private/Language/locallang_tca.xlf:tt_content.palette.prototype',
//	'showitem' => 'tx_datamints_prototype_template,'
//];
//
//$GLOBALS['TCA']['tt_content']['palettes']['datamints_prototype_text'] = [
//	'label' => 'LLL:EXT:datamints_prototype/Resources/Private/Language/locallang_tca.xlf:tt_content.palette.text',
//	'showitem' => 'bodytext,'
//];
//
//$GLOBALS['TCA']['tt_content']['palettes']['datamints_prototype_relations'] = [
//	'label' => 'LLL:EXT:datamints_prototype/Resources/Private/Language/locallang_tca.xlf:tt_content.palette.relations',
//	'showitem' => 'image, --linebreak--, media,'
//];
//
//// -------------------------------------------------------------------------------------------------------------------
//// Felder im Backend hinzugefuegen
//\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', '--palette--;;tx_datamints_prototype_template', 'datamints_prototype', 'after:header_link');
//\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', '--div--;LLL:EXT:datamints_prototype/Resources/Private/Language/locallang_tca.xlf:tt_content.tabs.text, --palette--;;datamints_prototype_text,', 'datamints_prototype', 'after:palette:tx_datamints_prototype_template');
//\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', '--div--;LLL:EXT:datamints_prototype/Resources/Private/Language/locallang_tca.xlf:tt_content.tabs.relations, --palette--;;datamints_prototype_relations,', 'datamints_prototype', 'after:palette:datamints_prototype_text');
//
//// ---------------------------------------------------------------------------------------------------------------------
//// Modul TCA anpassen
//
//// Bodytext mit CKEditor rendern
//$GLOBALS['TCA']['tt_content']['types']['datamints_prototype']['columnsOverrides']['bodytext']['config'] = [
//	'enableRichtext' => true,
//];
//
//// Media Label fuer Verwendung anpassen
//$GLOBALS['TCA']['tt_content']['types']['datamints_prototype']['columnsOverrides']['media']['label'] = 'LLL:EXT:datamints_prototype/Resources/Private/Language/locallang_tca.xlf:tt_content.files';
//
//// Crop-Varianten fuer Image-Feld
//$GLOBALS['TCA']['tt_content']['types']['datamints_prototype']['columnsOverrides']['image']['config']['overrideChildTca']['columns']['crop']['config'] = [
//	'cropVariants' => [
//		'default' => [
//			'disabled' => true,
//		],
//		'mobile' => [
//			'title' => 'LLL:EXT:datamints_prototype/Resources/Private/Language/locallang_tca.xlf:crop-variant.mobile',
//			'allowedAspectRatios' => [
//				'16:9' => [
//					'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.16_9',
//					'value' => 16 / 9
//				],
//				'4:3' => [
//					'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.4_3',
//					'value' => 4 / 3
//				],
//				'1:1' => [
//					'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.1_1',
//					'value' => 1
//				],
//				'NaN' => [
//					'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.free',
//					'value' => 0.0
//				],
//			],
//			'selectedRatio' => '16:9'
//		],
//		'desktop' => [
//			'title' => 'LLL:EXT:datamints_prototype/Resources/Private/Language/locallang_tca.xlf:crop-variant.desktop',
//			'allowedAspectRatios' => [
//				'16:9' => [
//					'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.16_9',
//					'value' => 16 / 9
//				],
//				'4:3' => [
//					'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.4_3',
//					'value' => 4 / 3
//				],
//				'1:1' => [
//					'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.1_1',
//					'value' => 1
//				],
//				'NaN' => [
//					'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.free',
//					'value' => 0.0
//				],
//			],
//			'selectedRatio' => '4:3'
//		],
//	],
//];
