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

use CRM_Recentitems_ExtensionUtil as E;

class CRM_RobinwoodAPI_Submission {

  const FINANCIAL_TYPE_ID_DONATION = 1;

  const FINANCIAL_TYPE_ID_REGULAR_DONATION = 12;

  const FINANCIAL_TYPE_ID_SPONSOR_MEMBERSHIP_FEE = 11;

  const FINANCIAL_TYPE_ID_ACTIVE_MEMBERSHIP_FEE = 2;

  const MEMBERSHIP_TYPE_ID_REGULAR_DONATION = 5;

  const MEMBERSHIP_TYPE_ID_SPONSOR_MEMBERSHIP = 3;

  const MEMBERSHIP_TYPE_ID_ACTIVE_MEMBERSHIP = 2;

  const PAYMENT_INSTRUMENT_ID_NOVALNET_PAYPAL = 105;

  const PAYMENT_INSTRUMENT_ID_NOVALNET_CREDIT_CARD = 107;

  const PAYMENT_INSTRUMENT_ID_NOVALNET_SOFORT = 108;

  const PAYMENT_INSTRUMENT_ID_STANDING_ORDER = 7;

  const CONTRIBUTION_STATUS_ID_COMPLETED = 1;

  const CONTRIBUTION_STATUS_ID_PENDING = 2;

  const CONTRIBUTION_STATUS_ID_IN_PROGRESS = 5;

  const GROUP_ID_NEWSLETTER_EMAIL = 28;

  // TODO: Set to actual group ID.
  const GROUP_ID_NEWSLETTER_POSTAL = NULL;

  const GENDER_ID_FEMALE = 1;

  const GENDER_ID_MALE = 2;

  const GENDER_ID_NEUTRAL = 3;

  const CUSTOM_FIELD_ID_HERKUNFT = 8;

  const CUSTOM_FIELD_ID_HERKUNFTSDATUM = 9;

  const OPTION_VALUE_ID_HERKUNFT_DONATION = 7612;

  const OPTION_VALUE_ID_HERKUNFT_REGULAR_DONATION = 7612;

  const OPTION_VALUE_ID_HERKUNFT_ACTIVE_MEMBERSHIP = 875;

  const OPTION_VALUE_ID_HERKUNFT_SPONSOR_MEMBERSHIP = 860;

  /**
   * resolve an ISO country code within a parameter array into the corresponding
   * CiviCRM country ID.
   *
   * @param &$params
   *   A CiviCRM API parameter array containing the key "country". The key
   *   "country_id" will be set in the referenced parameter array, if the
   *   country is successfully resolved.
   *
   * @throws \CiviCRM_API3_Exception
   *   When the CiviCRM country ID could not be resolved.
   */
  public static function resolveCountry(&$params) {
    if (!empty($params['country'])) {
      if (is_numeric($params['country'])) {
        // If a country ID is given, update the parameters.
        $params['country_id'] = $params['country'];
        unset($params['country']);
      }
      else {
        // Look up the country depending on the given ISO code.
        $country = civicrm_api3('Country', 'get', array('iso_code' => $params['country']));
        if (!empty($country['id'])) {
          $params['country_id'] = $country['id'];
          unset($params['country']);
        }
        else {
          throw new \CiviCRM_API3_Exception(
            E::ts('Unknown country %1.', array(1 => $params['country'])),
            'invalid_format'
          );
        }
      }
    }
  }

}
