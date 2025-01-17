<?php
/**
 * @package    Joomla.Component.Builder
 *
 * @created    30th April, 2015
 * @author     Llewellyn van der Merwe <https://dev.vdm.io>
 * @gitea      Joomla Component Builder <https://git.vdm.dev/joomla/Component-Builder>
 * @github     Joomla Component Builder <https://github.com/vdm-io/Joomla-Component-Builder>
 * @copyright  Copyright (C) 2015 Vast Development Method. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\Filesystem\File;
use VDM\Joomla\Utilities\ArrayHelper;
use VDM\Joomla\Utilities\GetHelper;
use VDM\Joomla\Utilities\FileHelper;
use VDM\Joomla\Componentbuilder\Compiler\Factory as CFactory;

/**
 * Structure class
 * @deprecated 3.3
 */
class Structure extends Get
{

	/**
	 * The folder counter
	 *
	 * @var     int
	 * @deprecated 3.3 Use CFactory::_('Utilities.Counter')->folder;
	 */
	public $folderCount = 0;

	/**
	 * The file counter
	 *
	 * @var     int
	 * @deprecated 3.3 Use CFactory::_('Utilities.Counter')->file;
	 */
	public $fileCount = 0;

	/**
	 * The page counter
	 *
	 * @var     int
	 * @deprecated 3.3
	 */
	public $pageCount = 0;

	/**
	 * The line counter
	 *
	 * @var     int
	 * @deprecated 3.3
	 * @deprecated 3.3 Use CFactory::_('Utilities.Counter')->line;
	 */
	public $lineCount = 0;

	/**
	 * The field counter
	 *
	 * @var     int
	 * @deprecated 3.3
	 */
	public $fieldCount = 0;

	/**
	 * The seconds counter
	 *
	 * @var     int
	 * @deprecated 3.3
	 */
	public $seconds = 0;

	/**
	 * The actual seconds counter
	 *
	 * @var     int
	 * @deprecated 3.3
	 */
	public $actualSeconds = 0;

	/**
	 * The folder seconds counter
	 *
	 * @var     int
	 * @deprecated 3.3
	 */
	public $folderSeconds = 0;

	/**
	 * The file seconds counter
	 *
	 * @var     int
	 * @deprecated 3.3
	 */
	public $fileSeconds = 0;

	/**
	 * The line seconds counter
	 *
	 * @var     int
	 * @deprecated 3.3
	 */
	public $lineSeconds = 0;

	/**
	 * The seconds debugging counter
	 *
	 * @var     int
	 * @deprecated 3.3
	 */
	public $secondsDebugging = 0;

	/**
	 * The seconds planning counter
	 *
	 * @var     int
	 * @deprecated 3.3
	 */
	public $secondsPlanning = 0;

	/**
	 * The seconds mapping counter
	 *
	 * @var     int
	 * @deprecated 3.3
	 */
	public $secondsMapping = 0;

	/**
	 * The seconds office counter
	 *
	 * @var     int
	 * @deprecated 3.3
	 */
	public $secondsOffice = 0;

	/**
	 * The total hours counter
	 *
	 * @var     int
	 * @deprecated 3.3
	 */
	public $totalHours = 0;

	/**
	 * The debugging hours counter
	 *
	 * @var     int
	 * @deprecated 3.3
	 */
	public $debuggingHours = 0;

	/**
	 * The planning hours counter
	 *
	 * @var     int
	 * @deprecated 3.3
	 */
	public $planningHours = 0;

	/**
	 * The mapping hours counter
	 *
	 * @var     int
	 * @deprecated 3.3
	 */
	public $mappingHours = 0;

	/**
	 * The office hours counter
	 *
	 * @var     int
	 * @deprecated 3.3
	 */
	public $officeHours = 0;

	/**
	 * The actual Total Hours counter
	 *
	 * @var     int
	 * @deprecated 3.3
	 */
	public $actualTotalHours = 0;

	/**
	 * The actual hours spent counter
	 *
	 * @var     int
	 * @deprecated 3.3
	 */
	public $actualHoursSpent = 0;

	/**
	 * The actual days spent counter
	 *
	 * @var     int
	 * @deprecated 3.3
	 */
	public $actualDaysSpent = 0;

	/**
	 * The total days counter
	 *
	 * @var     int
	 * @deprecated 3.3
	 */
	public $totalDays = 0;

	/**
	 * The actual Total Days counter
	 *
	 * @var     int
	 * @deprecated 3.3
	 */
	public $actualTotalDays = 0;

	/**
	 * The project week time counter
	 *
	 * @var     int
	 * @deprecated 3.3
	 */
	public $projectWeekTime = 0;

	/**
	 * The project month time counter
	 *
	 * @var     int
	 * @deprecated 3.3
	 */
	public $projectMonthTime = 0;

	/**
	 * The template path
	 *
	 * @var     string
	 * @deprecated 3.3 Use CFactory::_('Utilities.Paths')->template_path;
	 */
	public $templatePath;

	/**
	 * The custom template path
	 *
	 * @var     string
	 * @deprecated 3.3 Use CFactory::_('Utilities.Paths')->template_path_custom;
	 */
	public $templatePathCustom;

	/**
	 * The Joomla Version Data
	 *
	 * @var      object
	 * @deprecated 3.3 Use CFactory::_('Component.Settings')
	 */
	public $joomlaVersionData;

	/**
	 * Static File Content
	 *
	 * @var      array
	 * @deprecated 3.3 Use CFactory::_('Content')->active
	 */
	public $fileContentStatic = array();

	/**
	 * Extention Custom Fields
	 *
	 * @var    array
	 */
	public $extentionCustomfields = array();

	/**
	 * Extention Tracking Files Moved
	 *
	 * @var    array
	 */
	public $extentionTrackingFilesMoved = array();

	/**
	 * The standard folders
	 *
	 * @var      array
	 * @deprecated 3.3
	 */
	public $stdFolders = array('site', 'admin', 'media');

	/**
	 * The standard root files
	 *
	 * @var      array
	 * @deprecated 3.3
	 */
	public $stdRootFiles
		= array('access.xml', 'config.xml', 'controller.php', 'index.html',
			'README.txt');

	/**
	 * Dynamic File Content
	 *
	 * @var      array
	 * @deprecated 3.3 Use CFactory::_('Content')->_active
	 */
	public $fileContentDynamic = array();

	/**
	 * The Component Sales name
	 *
	 * @var      string
	 * @deprecated 3.3 Use CFactory::_('Utilities.Paths')->component_sales_name;
	 */
	public $componentSalesName;

	/**
	 * The Component Backup name
	 *
	 * @var      string
	 * @deprecated 3.3 Use CFactory::_('Utilities.Paths')->component_backup_name;
	 */
	public $componentBackupName;

	/**
	 * The Component Folder name
	 *
	 * @var      string
	 * @deprecated 3.3 Use CFactory::_('Utilities.Paths')->component_folder_name;
	 */
	public $componentFolderName;

	/**
	 * The Component path
	 *
	 * @var      string
	 * @deprecated 3.3 Use CFactory::_('Utilities.Paths')->component_path;
	 */
	public $componentPath;

	/**
	 * The Dynamic paths
	 *
	 * @var      array
	 * @deprecated 3.3 Use CFactory::_('Registry')->get('dynamic_paths');
	 */
	public $dynamicPaths = array();

	/**
	 * The not new static items
	 *
	 * @var      array
	 * @deprecated 3.3 Use CFactory::_('Registry')->get('files.not.new', []);
	 */
	public $notNew = array();

	/**
	 * Update the file content
	 *
	 * @var      array
	 * @deprecated 3.3 Use CFactory::_('Registry')->get('update.file.content');
	 */
	public $updateFileContent = array();

	/**
	 * The new files
	 *
	 * @var     array
	 * @deprecated 3.3 Use CFactory::_('Utilities.Files');
	 */
	public $newFiles = array();

	/**
	 * The Checkin Switch
	 *
	 * @var     boolean
	 */
	public $addCheckin = false;

	/**
	 * The Move Folders Switch
	 *
	 * @var     boolean
	 */
	public $setMoveFolders = false;

	/**
	 * The array of last modified dates
	 *
	 * @var     array
	 * @deprecated 3.3
	 */
	protected $lastModifiedDate = array();

	/**
	 * The default view switch
	 *
	 * @var     bool/string
	 * @deprecated 3.3 Use CFactory::_('Registry')->get('build.dashboard');
	 */
	public $dynamicDashboard = false;

	/**
	 * The default view type
	 *
	 * @var    string
	 * @deprecated 3.3 Use CFactory::_('Registry')->get('build.dashboard.type');
	 */
	public $dynamicDashboardType;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		// first we run the parent constructor
		if (parent::__construct())
		{
			// set incase no extra admin folder are loaded
			CFactory::_('Content')->set('EXSTRA_ADMIN_FOLDERS', '');
			// set incase no extra site folder are loaded
			CFactory::_('Content')->set('EXSTRA_SITE_FOLDERS', '');
			// set incase no extra media folder are loaded
			CFactory::_('Content')->set('EXSTRA_MEDIA_FOLDERS', '');
			// set incase no extra admin files are loaded
			CFactory::_('Content')->set('EXSTRA_ADMIN_FILES', '');
			// set incase no extra site files are loaded
			CFactory::_('Content')->set('EXSTRA_SITE_FILES', '');
			// set incase no extra media files are loaded
			CFactory::_('Content')->set('EXSTRA_MEDIA_FILES', '');
			// make sure there is no old build
			CFactory::_('Utilities.Folder')->remove(CFactory::_('Utilities.Paths')->component_path);
			// load the libraries files/folders and url's
			CFactory::_('Library.Structure')->build();
			// load the powers files/folders
			CFactory::_('Power.Structure')->build();
			// load the module files/folders and url's
			CFactory::_('Joomlamodule.Structure')->build();
			// load the plugin files/folders and url's
			CFactory::_('Joomlaplugin.Structure')->build();
			// set the dashboard
			CFactory::_('Component.Dashboard')->set();
			// set the component base structure
			if (!CFactory::_('Component.Structure')->build())
			{
				return false;
			}

			// set all single instance folders and files
			if (!CFactory::_('Component.Structure.Single')->build())
			{
				return false;
			}

			// set all the dynamic folders and files
			if (!CFactory::_('Component.Structure.Multiple')->build())
			{
				return false;
			}

			return true;
		}

		return false;
	}

	/**
	 * Build the Powers files, folders
	 *
	 * @return  void
	 * @deprecated 3.3 Use CFactory::_('Power.Structure')->build();
	 */
	private function buildPowers()
	{
		// set notice that we could not get a valid string from the target
		$this->app->enqueueMessage(
			JText::sprintf('<hr /><h3>%s Warning</h3>', __CLASS__), 'Error'
		);
		$this->app->enqueueMessage(
			JText::sprintf(
				'Use of a deprecated method (%s)!', __METHOD__
			), 'Error'
		);
	}

	/**
	 * Build the Modules files, folders, url's and config
	 *
	 * @return  void
	 * @deprecated 3.3 Use CFactory::_('Joomlamodule.Structure')->build();
	 */
	private function buildModules()
	{
		// set notice that we could not get a valid string from the target
		$this->app->enqueueMessage(
			JText::sprintf('<hr /><h3>%s Warning</h3>', __CLASS__), 'Error'
		);
		$this->app->enqueueMessage(
			JText::sprintf(
				'Use of a deprecated method (%s)!', __METHOD__
			), 'Error'
		);
	}

	/**
	 * Build the Plugins files, folders, url's and config
	 *
	 * @return  void
	 * @deprecated 3.3 Use CFactory::_('Joomlaplugin.Structure')->build();
	 */
	private function buildPlugins()
	{
		// set notice that we could not get a valid string from the target
		$this->app->enqueueMessage(
			JText::sprintf('<hr /><h3>%s Warning</h3>', __CLASS__), 'Error'
		);
		$this->app->enqueueMessage(
			JText::sprintf(
				'Use of a deprecated method (%s)!', __METHOD__
			), 'Error'
		);
	}

	/**
	 * Create Path if not exist
	 *
	 * @return void
	 * @deprecated 3.3 Use CFactory::_('Utilities.Folder')->create($path);
	 */
	private function createFolder($path)
	{
		// set notice that we could not get a valid string from the target
		$this->app->enqueueMessage(
			JText::sprintf('<hr /><h3>%s Warning</h3>', __CLASS__), 'Error'
		);
		$this->app->enqueueMessage(
			JText::sprintf(
				'Use of a deprecated method (%s)!', __METHOD__
			), 'Error'
		);
	}

	/**
	 * Build the Libraries files, folders, url's and config
	 *
	 * @return  void
	 * @deprecated 3.3 Use CFactory::_('Library.Structure')->build();
	 */
	private function setLibraries()
	{
		// set notice that we could not get a valid string from the target
		$this->app->enqueueMessage(
			JText::sprintf('<hr /><h3>%s Warning</h3>', __CLASS__), 'Error'
		);
		$this->app->enqueueMessage(
			JText::sprintf(
				'Use of a deprecated method (%s)!', __METHOD__
			), 'Error'
		);
	}

	/**
	 * set the dynamic dashboard if set
	 *
	 * @return  void
	 * @deprecated 3.3 Use CFactory::_('Component.Dashboard')->set();
	 */
	private function setDynamicDashboard()
	{
		// set notice that we could not get a valid string from the target
		$this->app->enqueueMessage(
			JText::sprintf('<hr /><h3>%s Warning</h3>', __CLASS__), 'Error'
		);
		$this->app->enqueueMessage(
			JText::sprintf(
				'Use of a deprecated method (%s)!', __METHOD__
			), 'Error'
		);
	}

	/**
	 * Write data to file
	 *
	 * @return  bool true on success
	 * @deprecated 3.3
	 */
	public function writeFile($path, $data)
	{
		return FileHelper::write($path, $data);
	}

	/**
	 * Build the Initial Folders
	 *
	 * @return  void
	 * @deprecated 3.3 Use CFactory::_('Component.Structure')->build();
	 */
	private function setFolders()
	{
		// set notice that we could not get a valid string from the target
		$this->app->enqueueMessage(
			JText::sprintf('<hr /><h3>%s Warning</h3>', __CLASS__), 'Error'
		);
		$this->app->enqueueMessage(
			JText::sprintf(
				'Use of a deprecated method (%s)!', __METHOD__
			), 'Error'
		);
	}

	/**
	 * Set the Static File & Folder
	 *
	 * @return  boolean
	 * @deprecated 3.3 Use CFactory::_('Component.Structure.Single')->build();
	 */
	private function setStatic()
	{
		// set notice that we could not get a valid string from the target
		$this->app->enqueueMessage(
			JText::sprintf('<hr /><h3>%s Warning</h3>', __CLASS__), 'Error'
		);
		$this->app->enqueueMessage(
			JText::sprintf(
				'Use of a deprecated method (%s)!', __METHOD__
			), 'Error'
		);
	}

	/**
	 * Set the Dynamic File & Folder
	 *
	 * @return  boolean
	 * @deprecated 3.3 Use CFactory::_('Component.Structure.Multiple')->build();
	 *
	 */
	private function setDynamique()
	{
		// set notice that we could not get a valid string from the target
		$this->app->enqueueMessage(
			JText::sprintf('<hr /><h3>%s Warning</h3>', __CLASS__), 'Error'
		);
		$this->app->enqueueMessage(
			JText::sprintf(
				'Use of a deprecated method (%s)!', __METHOD__
			), 'Error'
		);

		return false;
	}

	/**
	 * move the fields and Rules
	 *
	 * @param   array   $field  The field data
	 * @param   string  $path   The path to move to
	 *
	 * @return void
	 *
	 */
	public function moveFieldsRules($field, $path)
	{
		// check if we have a subform or repeatable field
		if ($field['type_name'] === 'subform'
			|| $field['type_name'] === 'repeatable')
		{
			// since we could have a custom field or rule inside
			$this->moveMultiFieldsRules($field, $path);
		}
		else
		{
			// check if this is a custom field that should be moved
			if (isset($this->extentionCustomfields[$field['type_name']]))
			{
				$check = md5($path . 'type' . $field['type_name']);
				// lets check if we already moved this
				if (!isset($this->extentionTrackingFilesMoved[$check]))
				{
					// check files exist
					if (File::exists(
						CFactory::_('Utilities.Paths')->component_path . '/admin/models/fields/'
						. $field['type_name'] . '.php'
					))
					{
						// copy the custom field
						File::copy(
							CFactory::_('Utilities.Paths')->component_path . '/admin/models/fields/'
							. $field['type_name'] . '.php',
							$path . '/fields/' . $field['type_name'] . '.php'
						);
					}
					// stop from doing this again.
					$this->extentionTrackingFilesMoved[$check] = true;
				}
			}
			// check if this has validation that should be moved
			if (CFactory::_('Registry')->get('validation.linked.' . $field['field']) !== null)
			{
				$check = md5(
					$path . 'rule'
					. CFactory::_('Registry')->get('validation.linked.' . $field['field'])
				);
				// lets check if we already moved this
				if (!isset($this->extentionTrackingFilesMoved[$check]))
				{
					// check files exist
					if (File::exists(
						CFactory::_('Utilities.Paths')->component_path . '/admin/models/rules/'
						. CFactory::_('Registry')->get('validation.linked.' . $field['field'])
						. '.php'
					))
					{
						// copy the custom field
						File::copy(
							CFactory::_('Utilities.Paths')->component_path . '/admin/models/rules/'
							. CFactory::_('Registry')->get('validation.linked.' . $field['field'])
							. '.php', $path . '/rules/'
							. CFactory::_('Registry')->get('validation.linked.' . $field['field'])
							. '.php'
						);
					}
					// stop from doing this again.
					$this->extentionTrackingFilesMoved[$check] = true;
				}
			}
		}
	}

	/**
	 * move the fields and Rules of multi fields
	 *
	 * @param   array   $multi_field  The field data
	 * @param   string  $path         The path to move to
	 *
	 * @return void
	 *
	 */
	protected function moveMultiFieldsRules($multi_field, $path)
	{
		// get the fields ids
		$ids = array_map(
			'trim',
			explode(
				',',
				(string) GetHelper::between(
					$multi_field['settings']->xml, 'fields="', '"'
				)
			)
		);
		if (ArrayHelper::check($ids))
		{
			foreach ($ids as $id)
			{
				// setup the field
				$field          = array();
				$field['field'] = $id;
				CFactory::_('Field')->set($field);
				// move field and rules if needed
				$this->moveFieldsRules($field, $path);
			}
		}
	}

	/**
	 * get the created date of the (view)
	 *
	 * @param   array  $view  The view values
	 *
	 * @return  string Last Modified Date
	 * @deprecated 3.3 Use CFactory::_('Model.Createdate')->get($view);
	 */
	public function getCreatedDate($view)
	{
		return CFactory::_('Model.Createdate')->get($view);
	}

	/**
	 * get the last modified date of a MVC (view)
	 *
	 * @param   array  $view  The view values
	 *
	 * @return  string Last Modified Date
	 * @deprecated 3.3 Use CFactory::_('Model.Modifieddate')->get($view);
	 */
	public function getLastModifiedDate($view)
	{
		return CFactory::_('Model.Modifieddate')->get($view);
	}

	/**
	 * Set the Static File & Folder
	 *
	 * @param   array   $target    The main target and name
	 * @param   string  $type      The type in the target
	 * @param   string  $fileName  The custom file name
	 * @param   array   $cofig     to add more data to the files info
	 *
	 * @return  boolean
	 * @deprecated 3.3 Use CFactory::_('Utilities.Structure')->build($target, $type, $fileName, $config);
	 */
	public function buildDynamique($target, $type, $fileName = null, $config = null)
	{
		return CFactory::_('Utilities.Structure')->build($target, $type, $fileName, $config);
	}

	/**
	 * set the Joomla Version Data
	 *
	 * @return  object The version data
	 * @deprecated 3.3
	 */
	private function setJoomlaVersionData()
	{
		// set notice that we could not get a valid string from the target
		$this->app->enqueueMessage(
			JText::sprintf('<hr /><h3>%s Warning</h3>', __CLASS__), 'Error'
		);
		$this->app->enqueueMessage(
			JText::sprintf(
				'Use of a deprecated method (%s)!', __METHOD__
			), 'Error'
		);
	}

	/**
	 * Add the dynamic folders
	 */
	protected function setDynamicFolders()
	{
		// check if we should add the dynamic folder moving script to the installer script
		if (!CFactory::_('Registry')->get('set_move_folders_install_script'))
		{
			// add the setDynamicF0ld3rs() method to the install scipt.php file
			CFactory::_('Registry')->set('set_move_folders_install_script', true);
			// set message that this was done (will still add a tutorial link later)
			$this->app->enqueueMessage(
				JText::_(
					'<hr /><h3>Dynamic folder(s) were detected.</h3>'
				), 'Notice'
			);
			$this->app->enqueueMessage(
				JText::sprintf(
					'A method (setDynamicF0ld3rs) was added to the install <b>script.php</b> of this package to insure that the folder(s) are copied into the correct place when this component is installed!'
				), 'Notice'
			);
		}
	}

	/**
	 * set the index.html file in a folder path
	 *
	 * @param   string  $path  The path to place the index.html file in
	 *
	 * @return  void
	 * @deprecated 3.3 Use CFactory::_('Utilities.File')->write($path, $root);
	 *
	 */
	private function indexHTML($path, $root = 'component')
	{
		CFactory::_('Utilities.File')->write($path, $root);
	}

	/**
	 * Update paths with real value
	 *
	 * @param   string  $path  The full path
	 *
	 * @return  string   The updated path
	 * @deprecated 3.3 Use CFactory::_('Utilities.Dynamicpath')->update($path);
	 */
	protected function updateDynamicPath($path)
	{
		return CFactory::_('Utilities.Dynamicpath')->update($path);
	}

	/**
	 * Remove folders with files
	 *
	 * @param   string   $dir     The path to folder to remove
	 * @param   boolean  $ignore  The files and folders to ignore
	 *
	 * @return  boolean   True if all is removed
	 * @deprecated 3.3 Use CFactory::_('Utilities.Folder')->remove($dir, $ignore);
	 */
	protected function removeFolder($dir, $ignore = false)
	{
		return CFactory::_('Utilities.Folder')->remove($dir, $ignore);
	}

}
