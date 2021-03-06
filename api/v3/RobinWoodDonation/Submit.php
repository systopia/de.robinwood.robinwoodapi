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

use CRM_RobinWoodAPI_ExtensionUtil as E;

/**
 * RobinWoodDonation.Submit API specification.
 * This is used for documentation and validation.
 *
 * @param array $params
 *   Description of fields supported by this API call.
 *
 * @see http://wiki.civicrm.org/confluence/display/CRMDOC/API+Architecture+Standards
 */
function _civicrm_api3_robin_wood_donation_Submit_spec(&$params) {
  $params['first_name'] = array(
    'name' => 'first_name',
    'title' => 'First name',
    'type' => CRM_Utils_Type::T_STRING,
    'api.required' => 1,
    'description' => 'The contact\'s first name.',
  );
  $params['last_name'] = array(
    'name' => 'last_name',
    'title' => 'Last name',
    'type' => CRM_Utils_Type::T_STRING,
    'api.required' => 1,
    'description' => 'The contact\'s last name.',
  );
  $params['street_address'] = array(
    'name' => 'street_address',
    'title' => 'Street address',
    'type' => CRM_Utils_Type::T_STRING,
    'api.required' => 1,
    'description' => 'The contact\'s street address.',
  );
  $params['postal_code'] = array(
    'name' => 'postal_code',
    'title' => 'Postal code',
    'type' => CRM_Utils_Type::T_STRING,
    'api.required' => 0,
    'description' => 'The contact\'s postal code.',
  );
  $params['city'] = array(
    'name' => 'city',
    'title' => 'City',
    'type' => CRM_Utils_Type::T_STRING,
    'api.required' => 1,
    'description' => 'The contact\'s city.',
  );
  $params['country'] = array(
    'name' => 'country',
    'title' => 'Country',
    'type' => CRM_Utils_Type::T_STRING,
    'api.required' => 0,
    'api.default' => 'DE',
    'description' => 'The contact\'s country.',
  );
  $params['supplemental_address_1'] = array(
    'name' => 'supplemental_address_1',
    'title' => 'Supplemental address 1',
    'type' => CRM_Utils_Type::T_STRING,
    'api.required' => 0,
    'description' => 'The contact\'s supplemental address 1.',
  );
  $params['supplemental_address_2'] = array(
    'name' => 'supplemental_address_2',
    'title' => 'Supplemental address 2',
    'type' => CRM_Utils_Type::T_STRING,
    'api.required' => 0,
    'description' => 'The contact\'s supplemental address 2.',
  );
  $params['email'] = array(
    'name' => 'email',
    'title' => 'E-mail address',
    'type' => CRM_Utils_Type::T_STRING,
    'api.required' => 0,
    'description' => 'The contact\'s e-mail address.',
  );
  $params['phone'] = array(
    'name' => 'phone',
    'title' => 'Phone number',
    'type' => CRM_Utils_Type::T_STRING,
    'api.required' => 0,
    'description' => 'The contact\'s phone number.',
  );
  $params['gender_id'] = array(
    'name' => 'gender_id',
    'title' => 'Gender',
    'type' => CRM_Utils_Type::T_INT,
    'api.required' => 1,
    'description' => 'The contact\'s gender.',
  );
  $params['membership_type'] = array(
    'name' => 'membership_type',
    'title' => 'Membership type',
    'type' => CRM_Utils_Type::T_STRING,
    'api.required' => 0,
    'description' => 'The type of the membership to create for the contact.',
  );
  $params['payment_instrument'] = array(
    'name' => 'payment_instrument',
    'title' => 'Payment method',
    'type' => CRM_Utils_Type::T_STRING,
    'api.required' => 1,
    'description' => 'The payment method for the donation or membership fee.',
  );
  $params['iban'] = array(
    'name' => 'iban',
    'title' => 'IBAN',
    'type' => CRM_Utils_Type::T_STRING,
    'api.required' => 0,
    'description' => 'The IBAN for the SEPA mandate to create for the contact.',
  );
  $params['bic'] = array(
    'name' => 'bic',
    'title' => 'BIC',
    'type' => CRM_Utils_Type::T_STRING,
    'api.required' => 0,
    'description' => 'The BIC for the SEPA mandate to create for the contact.',
  );
  $params['amount'] = array(
    'name' => 'amount',
    'title' => 'Amount',
    'type' => CRM_Utils_Type::T_INT,
    'api.required' => 1,
    'description' => 'The amount (in EUR cents) of the donation or membership fee.',
  );
  $params['frequency'] = array(
    'name' => 'frequency',
    'title' => 'Frequency',
    'type' => CRM_Utils_Type::T_INT,
    'api.required' => 0,
    'description' => 'The number of installments per year for the donation or membership fee.',
  );
  $params['trxn_id'] = array(
    'name' => 'trxn_id',
    'title' => 'trxn_id',
    'type' => CRM_Utils_Type::T_STRING,
    'api.required' => 0,
    'description' => 'The unique ID of this transaction, which it is identifiable with in the source system.',
  );
  $params['newsletter_email'] = array(
    'name' => 'newsletter_email',
    'title' => 'newsletter_email',
    'type' => CRM_Utils_Type::T_BOOLEAN,
    'description' => 'Whether the contact wishes to subscribe to the e-mail newsletter.',
  );
  $params['newsletter_postal'] = array(
    'name' => 'newsletter_postal',
    'title' => 'newsletter_postal',
    'type' => CRM_Utils_Type::T_BOOLEAN,
    'description' => 'Whether the contact wishes to subscribe to the postal newsletter.',
  );
}

/**
 * RobinWoodDonation.Submit API
 *
 * @param array $params
 * @return array
 *   API result descriptor
 *
 * @see civicrm_api3_create_success
 * @see civicrm_api3_create_error
 */
function civicrm_api3_robin_wood_donation_Submit($params) {
  // Log the API call to the CiviCRM debug log.
  if (defined('ROBINWOODAPI_LOGGING') && ROBINWOODAPI_LOGGING) {
    CRM_Core_Error::debug_log_message('RobinWoodDonation.Submit:'."\n".json_encode($params, JSON_PRETTY_PRINT));
  }

  try {
    $result = array();

    /***************************************************************************
     * Validate and prepare parameters.                                        *
     **************************************************************************/
    if (defined('ROBINWOODAPI_LOGGING') && ROBINWOODAPI_LOGGING) {
      CRM_Core_Error::debug_log_message('RobinWoodDonation.Submit:'."\n".'Validating parameters.');
    }
    // Validate membership type ID and frequency interdependency.
    if (!empty($params['membership_type']) && empty($params['frequency'])) {
      throw new Exception((E::ts('Required parameter %1 missing.', array(
        1 => 'frequency',
      ))));
    }
    if (!empty($params['frequency']) && empty($params['membership_type'])) {
      throw new Exception((E::ts('Required parameter %1 missing.', array(
        1 => 'membership_type',
      ))));
    }

    // Validate IBAN and BIC for SEPA payment method.
    if ($params['payment_instrument'] == 'sepa') {
      foreach (array(
                 'iban',
                 'bic',
               ) as $required_param) {
        if (empty($params[$required_param])) {
          throw new Exception(E::ts('Required parameter %1 missing.', array(
            1 => $required_param,
          )));
        }
      }
    }

    // Validate allowed values for fields.
    if (!in_array($params['gender_id'], array(
      CRM_RobinWoodAPI_Submission::GENDER_ID_FEMALE,
      CRM_RobinWoodAPI_Submission::GENDER_ID_MALE,
      CRM_RobinWoodAPI_Submission::GENDER_ID_NEUTRAL,
    ))) {
      throw new Exception(E::ts('Invalid value for parameter %1', array(
        1 => 'gender_id',
      )));
    }

    // Map membership types to membership_type_id values.
    if (!empty($params['membership_type'])) {
      $membership_types = array(
        CRM_RobinWoodAPI_Submission::MEMBERSHIP_TYPE_ID_ACTIVE_MEMBERSHIP => 'AKTIVE_MITGLIEDSCHAFT',
        CRM_RobinWoodAPI_Submission::MEMBERSHIP_TYPE_ID_SPONSOR_MEMBERSHIP => 'FOERDERMITGLIEDSCHAFT',
        CRM_RobinWoodAPI_Submission::MEMBERSHIP_TYPE_ID_REGULAR_DONATION => 'DAUERSPENDE',
      );
      if (!in_array($params['membership_type'], $membership_types)) {
        throw new Exception(E::ts('Invalid value for parameter %1', array(
          1 => 'membership_type',
        )));
      }
      else {
        $params['membership_type_id'] = array_search($params['membership_type'], $membership_types);
      }
    }

    // Map payment methods to payment_instrument_id values.
    $payment_instruments = array(
      'sepa_direct_debit' => 'sepa',
      'dauerauftrag' => CRM_RobinWoodAPI_Submission::PAYMENT_INSTRUMENT_ID_STANDING_ORDER,
      'commerce_novalnet_cc' => CRM_RobinWoodAPI_Submission::PAYMENT_INSTRUMENT_ID_NOVALNET_CREDIT_CARD,
      'commerce_novalnet_paypal' => CRM_RobinWoodAPI_Submission::PAYMENT_INSTRUMENT_ID_NOVALNET_PAYPAL,
      'commerce_novalnet_instantbank' => CRM_RobinWoodAPI_Submission::PAYMENT_INSTRUMENT_ID_NOVALNET_SOFORT,
      'kreditkarte_testmodus_' => CRM_RobinWoodAPI_Submission::PAYMENT_INSTRUMENT_ID_NOVALNET_CREDIT_CARD,
      'paypal_testmodus_' => CRM_RobinWoodAPI_Submission::PAYMENT_INSTRUMENT_ID_NOVALNET_PAYPAL,
      'sofort_berweisung_testmodus_' => CRM_RobinWoodAPI_Submission::PAYMENT_INSTRUMENT_ID_NOVALNET_SOFORT,
    );
    if (!array_key_exists($params['payment_instrument'], $payment_instruments)) {
      throw new Exception(E::ts('Invalid value for parameter %1', array(
        1 => 'payment_instrument',
      )));
    }
    else {
      $params['payment_instrument_id'] = $payment_instruments[$params['payment_instrument']];
    }

    // Resolve country ISO code.
    CRM_RobinWoodAPI_Submission::resolveCountry($params);

    // Start date for memberships and/or SEPA mandates: first day of next month.
    // When using SEPA, add the notice period before calculating the start date.
    $reference_date = date_create('today');
    if ($params['payment_instrument_id'] == 'sepa') {
      if ($creditor = CRM_Sepa_Logic_Settings::defaultCreditor()) {
        $creditor_id = $creditor->id;
      }
      else {
        $creditor_id = null;
      }
      $sepa_notice_days = CRM_Sepa_Logic_Settings::getSetting(
        'batching_FRST_notice',
        $creditor_id
      );
      if (is_numeric($sepa_notice_days)) {
        $reference_date = $reference_date->modify('+' . $sepa_notice_days . ' days');
      }
    }
    $start_date = $reference_date->modify('first day of next month');
    $start_date = $start_date->format('Ymd');

    /***************************************************************************
     * Identify and update or create contact using XCM.                        *
     **************************************************************************/
    if (defined('ROBINWOODAPI_LOGGING') && ROBINWOODAPI_LOGGING) {
      CRM_Core_Error::debug_log_message('RobinWoodDonation.Submit:'."\n".'Identifying or creating contact.');
    }
    // Set "Herkunft" custom field value depending on submission type.
    if (!empty($params['membership_type_id'])) {
      switch ($params['membership_type_id']) {
        case CRM_RobinWoodAPI_Submission::MEMBERSHIP_TYPE_ID_REGULAR_DONATION:
          $option_value_id_herkunft = CRM_RobinWoodAPI_Submission::OPTION_VALUE_ID_HERKUNFT_REGULAR_DONATION;
          break;
        case CRM_RobinWoodAPI_Submission::MEMBERSHIP_TYPE_ID_SPONSOR_MEMBERSHIP:
          $option_value_id_herkunft = CRM_RobinWoodAPI_Submission::OPTION_VALUE_ID_HERKUNFT_SPONSOR_MEMBERSHIP;
          break;
        case CRM_RobinWoodAPI_Submission::MEMBERSHIP_TYPE_ID_ACTIVE_MEMBERSHIP:
          $option_value_id_herkunft = CRM_RobinWoodAPI_Submission::OPTION_VALUE_ID_HERKUNFT_ACTIVE_MEMBERSHIP;
          break;
      }
    }
    else {
      $option_value_id_herkunft = CRM_RobinWoodAPI_Submission::OPTION_VALUE_ID_HERKUNFT_DONATION;
    }
    $option_value_herkunft = civicrm_api3('OptionValue', 'getsingle', array(
      'id' => $option_value_id_herkunft,
    ));

    // Identify and update or create contact.
    $contact_data = array_intersect_key($params, array_fill_keys(array(
      'first_name',
      'last_name',
      'street_address',
      'postal_code',
      'city',
      'country_id',
      'email',
      'gender_id',
      'iban'
    ), TRUE)) + array(
        'custom_' . CRM_RobinWoodAPI_Submission::CUSTOM_FIELD_ID_HERKUNFT => $option_value_herkunft['value'],
        'custom_' . CRM_RobinWoodAPI_Submission::CUSTOM_FIELD_ID_HERKUNFTSDATUM => date('Ymd'),
      );
    $xcm_result = civicrm_api3(
      'Contact',
      'getorcreate',
      $contact_data
    );
    if ($xcm_result['is_error']) {
      throw new Exception($xcm_result['error_message']);
    }
    $contact_id = $xcm_result['id'];
    $result['contact_id'] = $contact_id;

    if (defined('ROBINWOODAPI_LOGGING') && ROBINWOODAPI_LOGGING) {
      CRM_Core_Error::debug_log_message('RobinWoodDonation.Submit:'."\n".'Identified or created Contact with ID ' . $result['contact_id']);
    }

    /***************************************************************************
     * Subscribe to newsletters.                                               *
     **************************************************************************/
    if (defined('ROBINWOODAPI_LOGGING') && ROBINWOODAPI_LOGGING) {
      CRM_Core_Error::debug_log_message('RobinWoodDonation.Submit:'."\n".'Subscribing to newsletters.');
    }
    // Subscribe to e-mail newsletter.
    if (!empty($params['newsletter_email'])) {
      $group_contact_email = civicrm_api3('GroupContact', 'create', array(
        'contact_id' => $contact_id,
        'group_id' => CRM_RobinWoodAPI_Submission::GROUP_ID_NEWSLETTER_EMAIL,
        'status' => 'Added',
      ));
      if ($group_contact_email['is_error']) {
        throw new Exception($group_contact_email['error_message']);
      }
      $result['newsletter_email_status'] = $group_contact_email['total_count'];

      if (defined('ROBINWOODAPI_LOGGING') && ROBINWOODAPI_LOGGING) {
        CRM_Core_Error::debug_log_message('RobinWoodDonation.Submit:'."\n".'Created GroupContact with ID ' . $result['group_contact_email']);
      }
    }

    // Subscribe to postal newsletter.
    if (!empty($params['newsletter_postal'])) {
      $custom_field = civicrm_api3('CustomField', 'getsingle', array(
        'custom_group_id' => CRM_RobinWoodAPI_Submission::CUSTOM_GROUP_ID_NEWSLETTER_POSTAL,
        'name' => CRM_RobinWoodAPI_Submission::CUSTOM_FIELD_NAME_NEWSLETTER_POSTAL,
      ));

      $custom_field_value_options = civicrm_api3('Contact', 'getoptions', array(
        'field' => 'custom_' . $custom_field['id'],
      ));
      if ($custom_field_value_options['is_error']) {
        throw new Exception($custom_field_value_options['error_message']);
      }
      $custom_field_value_option_keys = array_keys($custom_field_value_options['values']);

      $custom_value = civicrm_api3('CustomValue', 'create', array(
        'entity_id' => $contact_id,
        'custom_' . $custom_field['id'] => array($custom_field_value_option_keys[0]),
      ));
      if ($custom_value['is_error']) {
        throw new Exception($custom_value['error_message']);
      }

      $result['newsletter_postal_status'] = $custom_field_value_option_keys[0];

      if (defined('ROBINWOODAPI_LOGGING') && ROBINWOODAPI_LOGGING) {
        CRM_Core_Error::debug_log_message('RobinWoodDonation.Submit:'."\n".'Set postal newsletter custom field value to ["' . $result['newsletter_postal_status'] . '"]');
      }
    }

    /***************************************************************************
     * Create SEPA mandate or (recurring) contribution.                        *
     **************************************************************************/
    if (defined('ROBINWOODAPI_LOGGING') && ROBINWOODAPI_LOGGING) {
      CRM_Core_Error::debug_log_message('RobinWoodDonation.Submit:'."\n".'Creating SEPA mandate and/or contribution.');
    }

    // Determine financial type from submitted membership type ID.
    if (!empty($params['membership_type_id'])) {
      switch ($params['membership_type_id']) {
        case CRM_RobinWoodAPI_Submission::MEMBERSHIP_TYPE_ID_REGULAR_DONATION:
          $financial_type_id = CRM_RobinWoodAPI_Submission::FINANCIAL_TYPE_ID_REGULAR_DONATION;
          break;
        case CRM_RobinWoodAPI_Submission::MEMBERSHIP_TYPE_ID_SPONSOR_MEMBERSHIP:
          $financial_type_id = CRM_RobinWoodAPI_Submission::FINANCIAL_TYPE_ID_SPONSOR_MEMBERSHIP_FEE;
          break;
        case CRM_RobinWoodAPI_Submission::MEMBERSHIP_TYPE_ID_ACTIVE_MEMBERSHIP:
          $financial_type_id = CRM_RobinWoodAPI_Submission::FINANCIAL_TYPE_ID_ACTIVE_MEMBERSHIP_FEE;
          break;
      }
    }
    else {
      $financial_type_id = CRM_RobinWoodAPI_Submission::FINANCIAL_TYPE_ID_DONATION;
    }

    if ($params['payment_instrument_id'] == 'sepa') {
      // Create SEPA mandate using SepaMandate.createfull API.
      if (defined('ROBINWOODAPI_LOGGING') && ROBINWOODAPI_LOGGING) {
        CRM_Core_Error::debug_log_message('RobinWoodDonation.Submit:'."\n".'Creating SEPA mandate.');
      }

      $mandate_data = array(
        'contact_id' => $contact_id,
        'type' => (empty($params['frequency']) ? 'OOFF' : 'RCUR'),
        'iban' => $params['iban'],
        'bic' => $params['bic'],
        'amount' => $params['amount'] / 100,
        'financial_type_id' => $financial_type_id,
        'frequency_unit' => 'month',
        'frequency_interval' => $params['frequency'],
        'start_date' => $start_date,
        'date' => date('Ymd'),
        'creation_date' => date('Ymd'),
        'validation_date' => date('Ymd'),
      );
      if (!empty($params['trxn_id'])) {
        $mandate_data['trxn_id'] = $params['trxn_id'];
      }
      $mandate = civicrm_api3('SepaMandate', 'createfull', $mandate_data);
      if ($mandate['is_error']) {
        throw new Exception($mandate['error_message']);
      }
      $result['mandate_id'] = $mandate['id'];

      if (defined('ROBINWOODAPI_LOGGING') && ROBINWOODAPI_LOGGING) {
        CRM_Core_Error::debug_log_message('RobinWoodDonation.Submit:'."\n".'Created SepaMandate with ID ' . $result['mandate_id']);
      }

      // Create Banking account, if it doesn't exist and CiviBanking is enabled.
      try {
        $bank_account = civicrm_api3('BankingAccount', 'getorcreate', array(
          'reference' => $params['iban'],
          'bic' => $params['bic'],
          'contact_id' => $contact_id,
          'reference_type' => 'IBAN',
        ));
        if ($bank_account['is_error']) {
          throw new Exception($bank_account['error_message']);
        }
        $result['bank_account_id'] = $bank_account['id'];

        if (defined('ROBINWOODAPI_LOGGING') && ROBINWOODAPI_LOGGING) {
          CRM_Core_Error::debug_log_message('RobinWoodDonation.Submit:'."\n".'Created/Identified bankingAccount with ID ' . $result['bank_account_id']);
        }
      }
      catch (Exception $exception) {
        $result['bank_account'] = $exception->getMessage();
      }
    }
    else {
      // Create (recurring) contribution for other payment instruments.
      switch ($params['payment_instrument_id']) {
        case CRM_RobinWoodAPI_Submission::PAYMENT_INSTRUMENT_ID_STANDING_ORDER:
          $contribution_status_id = CRM_RobinWoodAPI_Submission::CONTRIBUTION_STATUS_ID_PENDING;
          break;
        default:
          $contribution_status_id = CRM_RobinWoodAPI_Submission::CONTRIBUTION_STATUS_ID_COMPLETED;
          break;
      }

      $contribution_data = array(
        'financial_type_id' => $financial_type_id,
        'amount' => $params['amount'] / 100,
        'total_amount' => $params['amount'] / 100,
        'contact_id' => $contact_id,
        'payment_instrument_id' => $params['payment_instrument_id'],
        'contribution_status_id' => $contribution_status_id,
      );
      if (!empty($params['trxn_id'])) {
        $contribution_data['trxn_id'] = $params['trxn_id'];
      }

      if (!empty($params['frequency'])) {
        // Create recurring contribution.
        if (defined('ROBINWOODAPI_LOGGING') && ROBINWOODAPI_LOGGING) {
          CRM_Core_Error::debug_log_message('RobinWoodDonation.Submit:'."\n".'Creating recurring contribution.');
        }

        $contribution_recur_data = $contribution_data + array(
          'frequency_unit' => 'month',
          'frequency_interval' => $params['frequency'],
          );
        $contribution_recur = civicrm_api3('ContributionRecur', 'create', $contribution_recur_data);
        if ($contribution_recur['is_error']) {
          throw new Exception($contribution_recur['error_message']);
        }
        // Link contribution to created recurring contribution.
        $contribution_data['contribution_recur_id'] = $contribution_recur['id'];
        $result['contribution_recur_id'] = $contribution_recur['id'];

        if (defined('ROBINWOODAPI_LOGGING') && ROBINWOODAPI_LOGGING) {
          CRM_Core_Error::debug_log_message('RobinWoodDonation.Submit:'."\n".'Created ContributionRecur with ID ' . $result['contribution_recur_id']);
        }
      }

      // Create contribution.
      if (defined('ROBINWOODAPI_LOGGING') && ROBINWOODAPI_LOGGING) {
        CRM_Core_Error::debug_log_message('RobinWoodDonation.Submit:'."\n".'Creating contribution.');
      }

      $contribution = civicrm_api3('Contribution', 'create', $contribution_data);
      if ($contribution['is_error']) {
        throw new Exception($contribution['error_message']);
      }
      $result['contribution_id'] = $contribution['id'];

      if (defined('ROBINWOODAPI_LOGGING') && ROBINWOODAPI_LOGGING) {
        CRM_Core_Error::debug_log_message('RobinWoodDonation.Submit:'."\n".'Created Contribution with ID ' . $result['contribution_id']);
      }
    }

    /***************************************************************************
     * Handle membership requests.                                             *
     **************************************************************************/
    if (defined('ROBINWOODAPI_LOGGING') && ROBINWOODAPI_LOGGING) {
      CRM_Core_Error::debug_log_message('RobinWoodDonation.Submit:'."\n".'Handling membership requests.');
    }
    if (!empty($params['membership_type_id'])) {
      // Load recurring contribution.
      if (isset($contribution_recur)) {
        $contribution_recur_id = $contribution_recur['id'];
      }
      elseif (!isset($contribution_recur) && isset($mandate) && $mandate['entity_table'] == 'civicrm_contribution_recur') {
        $contribution_recur_id = $mandate['entity_id'];
      }
      else {
        $contribution_recur_id = NULL;
      }

      // Find custom fields on memberships.
        $custom_field_jahresbeitrag = civicrm_api3('CustomField', 'getsingle', array(
            'custom_group_id' => CRM_RobinWoodAPI_Submission::CUSTOM_GROUP_ID_BEITRAGSINFORMATIONEN,
            'name' => CRM_RobinWoodAPI_Submission::CUSTOM_FIELD_NAME_JAHRESBEITRAG,
        ));
        $custom_field_zahlungsturnus = civicrm_api3('CustomField', 'getsingle', array(
            'custom_group_id' => CRM_RobinWoodAPI_Submission::CUSTOM_GROUP_ID_BEITRAGSINFORMATIONEN,
            'name' => CRM_RobinWoodAPI_Submission::CUSTOM_FIELD_NAME_ZAHLUNGSTURNUS,
        ));

      // Create membership.
      $membership_data = array(
        'membership_type_id' => $params['membership_type_id'],
        'contact_id' => $contact_id,
        // Yearly amount = amount * 12 months / frequency in months / 100 cents.
        'custom_' . $custom_field_jahresbeitrag['id'] => $params['amount'] * 12 / $params['frequency'] / 100,
        'custom_' . $custom_field_zahlungsturnus['id'] => $params['frequency'],
        'start_date' => $start_date,
        'end_date' => $start_date,
        // TODO: Any more parameters?
      );
      $membership = civicrm_api3('Membership', 'create', $membership_data);
      if ($membership['is_error']) {
        throw new Exception($membership['error_message']);
      }
      $result['membership_id'] = $membership['id'];

      if (defined('ROBINWOODAPI_LOGGING') && ROBINWOODAPI_LOGGING) {
        CRM_Core_Error::debug_log_message('RobinWoodDonation.Submit:'."\n".'Created Membership with ID ' . $result['membership_id']);
      }

      // TODO: Actively assign contributions made during this API call with the
      //       membership (MembershipPayment.create)!
    }

    return civicrm_api3_create_success($result);
  }
  catch (Exception $exception) {
    if (defined('ROBINWOODAPI_LOGGING') && ROBINWOODAPI_LOGGING) {
      CRM_Core_Error::debug_log_message('RobinWoodDonation.Submit:'."\n".'Caught exception: ' . $exception->getMessage());
    }
    return civicrm_api3_create_error($exception->getMessage());
  }
}
