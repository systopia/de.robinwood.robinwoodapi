<?php
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
    'api.required' => 1,
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
  $params['membership_type_id'] = array(
    'name' => 'membership_type_id',
    'title' => 'Membership type',
    'type' => CRM_Utils_Type::T_INT,
    'api.required' => 0,
    'description' => 'The type of the membership to create for the contact.',
  );
  $params['payment_instrument_id'] = array(
    'name' => 'payment_instrument_id',
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
    return civicrm_api3_create_success();
  }
  catch (CiviCRM_API3_Exception $exception) {
    return civicrm_api3_create_error($exception->getMessage());
  }
}
