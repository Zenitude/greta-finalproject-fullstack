# GRETA - Projet Final -FullStack
* Chosen subject: Hotel Restaurant in the mountains
* Sujet choisi : Hotel Restaurant en montagne

## User Types
<ul>
  <li>Customers
    <ul><li>Can only see home page</li></ul>
  <li>Administrators
    <ul>
      <li>Can see home page</li>
      <li>has access to the management page after logging in</li>
      <li>Three types of administrator</li>
      <ul>
        <li>General Administrator : Can access anything</li>
        <li>Hotel Administrator : Can’t handle the restaurant part</li>
        <li>Restaurant Administrator : Can’t handle the hotel part</li>
      </ul>
    </ul>
</ul>

## Fonctionnalités
* Customers
** Create : Administrator Hotel and General.
*** At creation, the administrator enters the last name, first name, address, email, telephone, vip or not, and if there is a spouse among the existing clients.
** Read : All Administrator.
*** View the customer list with the ability to edit, delete and view details for each customer.
** Update : Administrator Hotel and General.
*** The administrator changes the same information as for the creation.
** Delete : Administrator Hotel and General.
*** In order to delete a customer, they must no longer have an existing reservation in their name.

* Booking Hotel
** Create : Administrator Hotel and General.
*** The administrator first selects a customer, then selects the dates to check the availability of the rooms, selects the one or more rooms then valid to obtain the summary of the reservation. By creating a reservation, the selected rooms are reserved and the invoice is created.
** Read : Administrator Hotel and General.
*** View the booking list with the ability to delete and view details for each booking.
** Delete : Administrator Hotel and Genral.
*** By deleting a reservation, the administrator deletes at the same time the rooms reserved as well as the invoices related to this reservation.

* Invoices
** Create : Administrator Hotel and General.
*** The invoice is created at the same time as the customer’s booking creation.
** Read : Administrator Hotel and General.
*** View the invoices list with the ability to edit, delete and view details for each invoice.
** Update : Administrator Hotel and General.
*** The administrator can only change the rate and therefore the amount of the rebate granted
** Delete : Administrator Hotel and General, deleted through booking.
*** The invoice is deleted at the same time as the customer’s reservation is deleted
