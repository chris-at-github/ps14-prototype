<?php

declare(strict_types=1);

namespace Ps14\Ps14Prototype\ViewHelpers\Render;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2025 Christian Pschorr <pschorr.christian@gmail.com>
 ***************************************************************/

use TYPO3\CMS\Core\Resource\FileReference;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\View\ViewFactoryData;
use TYPO3\CMS\Core\View\ViewFactoryInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class TemplateViewHelper extends AbstractViewHelper {

	/**
	 * @var bool
	 */
	protected $escapeOutput = false;

	/**
	 * @var ViewFactoryInterface
	 */
	protected ViewFactoryInterface $viewFactory;

	/**
	 * @param ViewFactoryInterface $viewFactory
	 */
	public function injectViewFactory(ViewFactoryInterface $viewFactory): void {
		$this->viewFactory = $viewFactory;
	}

	/**
	 * Initialize all arguments with their description and options.
	 */
	public function initializeArguments() {
		parent::initializeArguments();

		$this->registerArgument('template', 'object', 'TYPO3\CMS\Core\Resource\FileReference', true, null);
		$this->registerArgument('variables', 'array', '', false, []);
	}

	/**
	 * Wertet ein Template aus und parst es mit dem Fluid Standalone Parser
	 *
	 * @return string
	 */
	public function render() {

		if(($this->arguments['template'] instanceof FileReference) === false) {
			return '<!-- Argument template must be instance of TYPO3\CMS\Core\Resource\FileReference -->';
		}

		$absoluteTemplatePath = GeneralUtility::getFileAbsFileName(trim($this->arguments['template']->getPublicUrl(), '/'));
		if(is_file($absoluteTemplatePath) === false) {
			return '<!-- Could not find template ' . $absoluteTemplatePath . '-->';
		}

		// Use the rendering context to get the current partial and layout paths
		$templatePaths = $this->renderingContext->getTemplatePaths();

		// Create the ViewFactoryData object with named arguments
		$viewFactoryData = new ViewFactoryData(
			templateRootPaths: [], // No template root path needed for a specific file
			partialRootPaths: $templatePaths->getPartialRootPaths(),
			layoutRootPaths: $templatePaths->getLayoutRootPaths(),
			templatePathAndFilename: $absoluteTemplatePath
		);

		// Create the view
		$view = $this->viewFactory->create($viewFactoryData);

		// Assign variables
		$view->assignMultiple($this->arguments['variables']);

		return $view->render();
	}
}
