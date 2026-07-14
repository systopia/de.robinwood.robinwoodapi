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

use CRM_RobinWoodAPI_ExtensionUtil as E;

class CRM_RobinWoodAPI_Submission {

  public const FINANCIAL_TYPE_ID_DONATION = 1;

  public const FINANCIAL_TYPE_ID_REGULAR_DONATION = 12;

  public const FINANCIAL_TYPE_ID_SPONSOR_MEMBERSHIP_FEE = 11;

  public const FINANCIAL_TYPE_ID_ACTIVE_MEMBERSHIP_FEE = 2;

  public const MEMBERSHIP_TYPE_ID_REGULAR_DONATION = 5;

  public const MEMBERSHIP_TYPE_ID_SPONSOR_MEMBERSHIP = 3;

  public const MEMBERSHIP_TYPE_ID_ACTIVE_MEMBERSHIP = 2;

  public const PAYMENT_INSTRUMENT_ID_NOVALNET_PAYPAL = 105;

  public const PAYMENT_INSTRUMENT_ID_NOVALNET_CREDIT_CARD = 107;

  public const PAYMENT_INSTRUMENT_ID_NOVALNET_SOFORT = 108;

  public const PAYMENT_INSTRUMENT_ID_STANDING_ORDER = 7;

  public const CONTRIBUTION_STATUS_ID_COMPLETED = 1;

  public const CONTRIBUTION_STATUS_ID_PENDING = 2;

  public const CONTRIBUTION_STATUS_ID_IN_PROGRESS = 5;

  public const GROUP_ID_NEWSLETTER_EMAIL = 28;

  public const CUSTOM_GROUP_ID_NEWSLETTER_POSTAL = 5;

  public const CUSTOM_FIELD_NAME_NEWSLETTER_POSTAL = 'Kampangen_per_Post';

  public const CUSTOM_GROUP_ID_BEITRAGSINFORMATIONEN = 10;

  public const CUSTOM_FIELD_NAME_JAHRESBEITRAG = 'Jahresbeitrag';

  public const CUSTOM_FIELD_NAME_ZAHLUNGSTURNUS = 'Zahlungsturnus';

  public const GENDER_ID_FEMALE = 1;

  public const GENDER_ID_MALE = 2;

  public const GENDER_ID_NEUTRAL = 3;

  public const CUSTOM_FIELD_ID_HERKUNFT = 8;

  public const CUSTOM_FIELD_ID_HERKUNFTSDATUM = 9;

  public const OPTION_VALUE_ID_HERKUNFT_DONATION = 862;

  public const OPTION_VALUE_ID_HERKUNFT_REGULAR_DONATION = 7612;

  public const OPTION_VALUE_ID_HERKUNFT_ACTIVE_MEMBERSHIP = 875;

  public const OPTION_VALUE_ID_HERKUNFT_SPONSOR_MEMBERSHIP = 860;

  /**
   * resolve an ISO country code within a parameter array into the corresponding
   * CiviCRM country ID.
   *
   * @param array<string, mixed> $params
   *   A CiviCRM API parameter array containing the key "country". The key
   *   "country_id" will be set in the referenced parameter array, if the
   *   country is successfully resolved.
   *
   * @throws \CRM_Core_Exception
   *   When the CiviCRM country ID could not be resolved.
   */
  public static function resolveCountry(array &$params): void {
    if (!empty($params['country'])) {
      if (is_numeric($params['country'])) {
        // If a country ID is given, update the parameters.
        $params['country_id'] = $params['country'];
        unset($params['country']);
      }
      else {
        // Look up the country depending on the given ISO code.
        $country = civicrm_api3('Country', 'get', ['iso_code' => $params['country']]);
        if (!empty($country['id'])) {
          $params['country_id'] = $country['id'];
          unset($params['country']);
        }
        else {
          throw new \CRM_Core_Exception(
            E::ts('Unknown country %1.', [1 => $params['country']]),
            'invalid_format'
          );
        }
      }
    }
  }

}
