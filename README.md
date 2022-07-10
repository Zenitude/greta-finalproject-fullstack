# GRETA - Projet Final -FullStack
* Chosen subject: Hotel Restaurant in the mountains

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
<ul>
    <li>Customers
        <ul>
            <li>Create : Administrator Hotel and General.</li>
                <ul>
                    <li>At creation, the administrator enters the last name, first name, address, email, telephone, vip or not, and if there is a spouse among the existing  clients.</li>
                </ul>
            <li>Read : All Administrator.</li>
                <ul>
                    <li>View the customer list with the ability to edit, delete and view details for each customer.</li>
                </ul>
            <li>Update : Administrator Hotel and General.</li>
                <ul>
                    <li>The administrator changes the same information as for the creation.</li>
                </ul>
            <li>Delete : Administrator Hotel and General.</li>
                <ul>
                    <li>In order to delete a customer, they must no longer have an existing reservation in their name.</li>
                </ul>
        </ul>
</ul>

<ul>
    <li>Booking Hotel</li>
        <ul>
            <li>Create : Administrator Hotel and General.</li>
                <ul>
                    <li>The administrator first selects a customer, then selects the dates to check the availability of the rooms, selects the one or more rooms then valid to obtain the summary of the reservation. By creating a reservation, the selected rooms are reserved and the invoice is created.</li>
                </ul>
            <li>Read : Administrator Hotel and General.</li>
                <ul>
                    <li>View the booking list with the ability to delete and view details for each booking.</li>
                </ul>
            <li>Delete : Administrator Hotel and Genral.</li>
                <ul>
                    <li>By deleting a reservation, the administrator deletes at the same time the rooms reserved as well as the invoices related to this reservation.</li>
                </ul>
        </ul>
</ul>

<ul>
    <li>Invoices</li>
        <ul>
            <li>Create : Administrator Hotel and General.</li>
                <ul>
                    <li>The invoice is created at the same time as the customer’s booking creation.</li>
                </ul>
            <li>Read : Administrator Hotel and General.</li>
                <ul>
                    <li>View the invoices list with the ability to edit, delete and view details for each invoice.</li>
                </ul>
            <li>Update : Administrator Hotel and General.</li>
                <ul>
                    <li>The administrator can only change the rate and therefore the amount of the rebate granted</li>
                </ul>
            <li>Delete : Administrator Hotel and General, deleted through booking.</li>
                <ul>
                    <li>The invoice is deleted at the same time as the customer’s reservation is deleted</li>
                </ul>
        <ul>
</ul>
