# RobinWood API

Provides a customized `RobinWoodDonation.Submit` APIv3 endpoint that lets
external applications submit donations and (sponsor) memberships into CiviCRM.
It identifies or creates the contact via XCM, handles newsletter subscriptions
and creates the SEPA mandate and/or contribution.

## Requirements

- CiviCRM >= 5.76
- PHP >= 8.1
- Extended Contact Matcher (`de.systopia.xcm`)
- CiviSEPA (`org.project60.sepa`)

## License

AGPL-3.0
