<?php
/*-------------------------------------------------------+
| Robin Wood API extension                               |
| Copyright (C) 2019 SYSTOPIA                            |
| Author: J. Schuppe (schuppe@systopia.de)               |
| http://www.systopia.de/                                |
+--------------------------------------------------------+
| This program is released as free software under the    |
| Affero GPL license. You can redistribute it and/or     |
| modify it under the terms of this license which you    |
| can read by viewing the included agpl.txt or online    |
| at www.gnu.org/licenses/agpl.html. Removal of this     |
| copyright header is strictly prohibited without        |
| written permission from the original author(s).        |
+--------------------------------------------------------*/

declare(strict_types = 1);

// phpcs:disable PSR1.Files.SideEffects.FoundWithSymbols
require_once 'robinwoodapi.civix.php';
// phpcs:enable PSR1.Files.SideEffects.FoundWithSymbols

use CRM_RobinWoodAPI_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function robinwoodapi_civicrm_config(\CRM_Core_Config &$config): void {
  _robinwoodapi_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function robinwoodapi_civicrm_install(): void {
  _robinwoodapi_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function robinwoodapi_civicrm_enable(): void {
  _robinwoodapi_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_permission().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_permission
 */
function robinwoodapi_civicrm_permission(array &$permissions): void {
  $permissions['access robinwood api donation.submit'] = 'RobinWood API: Access Donation.Submit API';
}

/**
 * Implements hook_civicrm_alterAPIPermissions().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterAPIPermissions
 */
function robinwoodapi_civicrm_alterAPIPermissions(
  string $entity,
  string $action,
  array &$params,
  array &$permissions
): void {
  // Restrict API calls to the permission.
  $permissions['robin_wood_donation']['submit'] = ['access robinwood api donation.submit'];
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *

 // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function robinwoodapi_civicrm_navigationMenu(&$menu) {
  _robinwoodapi_civix_insert_navigation_menu($menu, NULL, array(
    'label' => E::ts('The Page'),
    'name' => 'the_page',
    'url' => 'civicrm/the-page',
    'permission' => 'access CiviReport,access CiviContribute',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _robinwoodapi_civix_navigationMenu($menu);
} // */
