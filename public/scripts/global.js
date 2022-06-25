/* Selecting the Update Form | Sélection du formulaire de mise à jour */
const formUpdate = document.querySelector('#formUpdateCustomer');
const formCreate = document.querySelector('#formCreateCustomer');

// If the update form exists | Si le formulaire de mise à jour existe
if(formUpdate)
{
    console.log(formUpdate);
    /* Select Send Form Button | Sélection du bouton d'envoie du formulaire */
    const btnUpdate = document.querySelector('#formUpdateCustomer button');

    /* Selecting the message "mandatory fields" | Sélection du message "champs obligatoire" */
    const msgOblig = document.querySelector('#updateOblig');

    /* select fields | Sélection des champs */
    const inputsUpdate = document.querySelectorAll('#formUpdateCustomer input');

    /* table creation | Création d'un tableau */
    let inputs = new Array();

    /* Adding each field to the table | Ajout de chaque champ dans le tableau */
    inputsUpdate.forEach(input => { inputs.push(input)});

    /* Removal of invisible fields or with default values (radio) | Suppression des champs invisible ou avec des valeurs par défaut (radio) */
    inputs.splice(0,1);
    inputs.splice(3,2);
    
    /* For each field | Pour chaque input */
    inputs.forEach(input =>
    {
        /* We get the label of the field | On récupère le label du champ */
        let label = input.parentNode.children[0];

        /* Create a paragraph that will contain the error messages | On crée une paragraphe qui contiendra les messages d'erreur */
        let msgErrUpdate = document.createElement('span');
        msgErrUpdate.style.color = "red";

        /* A real-time input event is added to the | On ajoute un événement de saisie en temps réel sur le champ */
        input.addEventListener('input', () => 
        {
            if(input.value.length <= 0)
            {
                // If the field is empty modify the border | Si le champ est vide Modifier la bordure
                input.style.border = "2px dashed red";

                // Highlight the "mandatory fields*" | Mettre en évidence le "champs obligatoires*"
                msgOblig.style.color = "red";
                msgOblig.style.fontWeight = "bold";
                msgOblig.style.fontSize = "2rem";

                // Display an error message under the field | Afficher un message d'erreur sous le champ
                msgErrUpdate.innerHTML = "Le champ ne peut être vide.";
                input.parentNode.appendChild(msgErrUpdate);
            }
            else
            {
                // If the field is not empty modify the border | Si le champ n'est pas vide modifier la bordure
                input.style.border = "1px solid rgba(0,0,0,0.5)";

                // Return the message "mandatory fields*" as original | Remettre comme d'origine le message "champs obligatoires*"
                msgOblig.style.color = "black";
                msgOblig.style.fontWeight = "normal";
                msgOblig.style.fontSize = "1rem";
            }

            /* Check compliance of data entered for certain fields | On controle la conformité des données saisies pour certains champ */
            if(label.innerHTML === "Téléphone*")
            {
                /* Regular expression for the phone | Expression régulière pour le téléphone */
                let regPhone = "[0][1-9]([.]{1}[0-9]{2}){4}";

                // Verification of the entry | Vérification de la saisie
                if(regex(regPhone, input.value))
                {
                    /*  If the value of the field corresponds to the regular expression the border is green (valid), the error message and the data attribute disappear
                        Si la valeur du champ correspond à l'expression régulière la bordure est verte (valide), le message d'erreur et l'attribut data disparaissent */
                    input.style.border = "2px solid green";
                    msgErrUpdate.innerHTML = "";
                    msgErrUpdate.remove();
                    input.removeAttribute('data-error');
                }
                else
                {
                    /*  If the field value does not match the regular expression the border is red (invalid), the error message and the data attribute appear
                        Si la valeur du champ ne correspond pas à l'expression régulière la bordure est rouge (invalide), le message d'erreur et l'attribut data apparaissent */
                    input.style.border = "2px dashed red";
                    msgErrUpdate.innerHTML = "En france les téléphone commence par 01 à 09 et sont suivi de 8 chiffres, n'oubliez de séparer par un point (.)";
                    input.parentNode.appendChild(msgErrUpdate);
                    input.setAttribute('data-error', 'error');
                } 
            }
            else if(label.innerHTML === "Email*")
            {
                /* Regular expression for email | Expression régulière pour l'email */
                let regMail = "[-.a-z0-9]+@+[-.a-z0-9]+[.]+([a-z]{2,3})";

                // Verification of the entry | Vérification de la saisie
                if(regex(regMail, input.value))
                {
                    /*  If the value of the field corresponds to the regular expression the border is green (valid), the error message and the data attribute disappear
                        Si la valeur du champ correspond à l'expression régulière la bordure est verte (valide), le message d'erreur et l'attribut data disparaissent */
                    input.style.border = "2px solid green";
                    msgErrUpdate.innerHTML = "";
                    msgErrUpdate.remove();
                    input.removeAttribute('data-error');
                }
                else
                {
                    /*  If the field value does not match the regular expression the border is red (invalid), the error message and the data attribute appear
                        Si la valeur du champ ne correspond pas à l'expression régulière la bordure est rouge (invalide), le message d'erreur et l'attribut data apparaissent */
                    input.style.border = "2px dashed red";
                    msgErrUpdate.innerHTML = "Le format d'email n'est pas correct.";
                    input.parentNode.appendChild(msgErrUpdate);
                    input.setAttribute('data-error', 'error');
                }
            }

            /* Activating the send button according to the presence or absence of error | Activation du bouton d'envoie selon la présence ou non d'erreur */
            activeSubmit(inputs, 5,btnUpdate);
    
        })
    })
}

if(formCreate)
{
    /* Select Send Form Button | Sélection du bouton d'envoie du formulaire */
    const btnCreate = document.querySelector('#formCreateCustomer button');

    /* Selecting the message "mandatory fields" | Sélection du message "champs obligatoire" */
    const msgObligCreate = document.querySelector('#createOblig');

    /* select fields | Sélection des champs */
    const inputsCreate = document.querySelectorAll('#formCreateCustomer input');

    /* table creation | Création d'un tableau */
    let inputs = new Array();

    /* Adding each field to the table | Ajout de chaque champ dans le tableau */
    inputsCreate.forEach(input => { inputs.push(input)});

    /* Removal of invisible fields or with default values (radio) | Suppression des champs invisible ou avec des valeurs par défaut (radio) */
    inputs.splice(2,3);

    /* For each field | Pour chaque input */
    inputs.forEach(input =>
    {
        /* We get the label of the field | On récupère le label du champ */
        let label = input.parentNode.children[0];

        /* Create a paragraph that will contain the error messages | On crée une paragraphe qui contiendra les messages d'erreur */
        let msgErrCreate = document.createElement('span');
        msgErrCreate.style.color = "red";

        /* A real-time input event is added to the | On ajoute un événement de saisie en temps réel sur le champ */
        input.addEventListener('input', () => 
        {
            if(input.value.length <= 0)
            {
                // If the field is empty modify the border | Si le champ est vide Modifier la bordure
                input.style.border = "2px dashed red";

                // Highlight the "mandatory fields*" | Mettre en évidence le "champs obligatoires*"
                msgObligCreate.style.color = "red";
                msgObligCreate.style.fontWeight = "bold";
                msgObligCreate.style.fontSize = "2rem";

                // Display an error message under the field | Afficher un message d'erreur sous le champ
                msgErrCreate.innerHTML = "Le champ ne peut être vide.";
                input.parentNode.appendChild(msgErrCreate);
            }
            else
            {
                // If the field is not empty modify the border | Si le champ n'est pas vide modifier la bordure
                input.style.border = "1px solid rgba(0,0,0,0.5)";

                // Return the message "mandatory fields*" as original | Remettre comme d'origine le message "champs obligatoires*"
                msgObligCreate.style.color = "black";
                msgObligCreate.style.fontWeight = "normal";
                msgObligCreate.style.fontSize = "1rem";
            }

            /* Check compliance of data entered for certain fields | On controle la conformité des données saisies pour certains champ */
            if(label.innerHTML === "Téléphone*")
            {
                /* Regular expression for the phone | Expression régulière pour le téléphone */
                let regCreatePhone = "[0][1-9]([.]{1}[0-9]{2}){4}";

                // Verification of the entry | Vérification de la saisie
                if(regex(regCreatePhone, input.value))
                {
                    /*  If the value of the field corresponds to the regular expression the border is green (valid), the error message and the data attribute disappear
                        Si la valeur du champ correspond à l'expression régulière la bordure est verte (valide), le message d'erreur et l'attribut data disparaissent */
                    input.style.border = "2px solid green";
                    msgErrCreate.innerHTML = "";
                    msgErrCreate.remove();
                    input.removeAttribute('data-error');
                }
                else
                {
                    /*  If the field value does not match the regular expression the border is red (invalid), the error message and the data attribute appear
                        Si la valeur du champ ne correspond pas à l'expression régulière la bordure est rouge (invalide), le message d'erreur et l'attribut data apparaissent */
                    input.style.border = "2px dashed red";
                    msgErrCreate.innerHTML = "En france les téléphone commence par 01 à 09 et sont suivi de 8 chiffres, n'oubliez de séparer par un point (.)";
                    input.parentNode.appendChild(msgErrCreate);
                    input.setAttribute('data-error', 'error');
                } 
            }
            else if(label.innerHTML === "Code Postal*")
            {
                /* Regular expression for email | Expression régulière pour l'email */
                let regCreateZipCode = "([0-8][0-9]|[9][0-8]|[2][a-bA-B]{1})[0-9]{3}";

                // Verification of the entry | Vérification de la saisie
                if(regex(regCreateZipCode, input.value))
                {
                    /*  If the value of the field corresponds to the regular expression the border is green (valid), the error message and the data attribute disappear
                        Si la valeur du champ correspond à l'expression régulière la bordure est verte (valide), le message d'erreur et l'attribut data disparaissent */
                    input.style.border = "2px solid green";
                    msgErrCreate.innerHTML = "";
                    msgErrCreate.remove();
                    input.removeAttribute('data-error');
                }
                else
                {
                    /*  If the field value does not match the regular expression the border is red (invalid), the error message and the data attribute appear
                        Si la valeur du champ ne correspond pas à l'expression régulière la bordure est rouge (invalide), le message d'erreur et l'attribut data apparaissent */
                    input.style.border = "2px dashed red";
                    msgErrCreate.innerHTML = "Les codes postaux sont composés du code départementale (2 caractères) + 3 chiffres. En france métropolitaine, les codes départementaux vont de 01 à 95, puis 96 à 98 pour les dom-tom. Ceux de la corse commençent par 2A ou 2B";
                    input.parentNode.appendChild(msgErrCreate);
                    input.setAttribute('data-error', 'error');
                }
            }
            else if(label.innerHTML === "Email*")
            {
                /* Regular expression for email | Expression régulière pour l'email */
                let regCreateMail = "[-.a-z0-9]+@+[-.a-z0-9]+[.]+([a-z]{2,3})";

                // Verification of the entry | Vérification de la saisie
                if(regex(regCreateMail, input.value))
                {
                    /*  If the value of the field corresponds to the regular expression the border is green (valid), the error message and the data attribute disappear
                        Si la valeur du champ correspond à l'expression régulière la bordure est verte (valide), le message d'erreur et l'attribut data disparaissent */
                    input.style.border = "2px solid green";
                    msgErrCreate.innerHTML = "";
                    msgErrCreate.remove();
                    input.removeAttribute('data-error');
                }
                else
                {
                    /*  If the field value does not match the regular expression the border is red (invalid), the error message and the data attribute appear
                        Si la valeur du champ ne correspond pas à l'expression régulière la bordure est rouge (invalide), le message d'erreur et l'attribut data apparaissent */
                    input.style.border = "2px dashed red";
                    msgErrCreate.innerHTML = "Le format d'email n'est pas correct.";
                    input.parentNode.appendChild(msgErrCreate);
                    input.setAttribute('data-error', 'error');
                }
            }

            /* Activating the send button according to the presence or absence of error | Activation du bouton d'envoie selon la présence ou non d'erreur */
            activeSubmit(inputs, 7,btnCreate);
    
        })
    })
}

/* Function if test if the sent value matches the regular expression | Fonction si test si la valeur envoyé correspond à l'expression régulière */
function regex(regExp, value)
{
    let test = new RegExp(regExp).test(value);
    return test;
}

/*  Feature that enables and disables the send form button if there is an error in the form
    Fonction qui active et désactive le bouton d'envoie du formulaire si il y a une erreur dans le formulaire  */
function activeSubmit(fields, val, btn)
{
    /* We create a table that will receive the information | On crée un tableau qui recevra les informations */
    let verifSubmit = [];

    /* We create the variable that will sum the values of the table | On crée la variable qui fera la somme des valeurs du tableau */
    let sum = 0;
    console.log(fields.length);
    for(let i = 0 ; i < fields.length ; i++)
    {
        if(fields[i].value <= 0 || fields[i].getAttribute('data-error') === 'error')
        {
            /*  If the value of the field is empty or if it has the attribute 'data-error', 0 is displayed 
                Si la valeur du champ est vide ou s'il possède l'attribut 'data-error', on affiche 0 */
            verifSubmit[i] = 0;
        }
        else
        {
            /*  If the field is not empty or does not have the attribute 'data-error', we display 1
                Si le champ n'est pas vide ou n'a pas l'attribut 'data-error', on affiche 1 */
            verifSubmit[i] = 1;
        }

        /* Calculation of the sum of the table values | Calcul de la somme des valeurs du tableau */
        sum += verifSubmit[i];
    }
    console.log(verifSubmit);

    if(sum < val)
    { 
        // If the sum is less than 5, the send button on the form is disabled | Si la somme est inférieur à 5, on désactive le bouton d'envoie du formulaire
        btn.setAttribute('disabled', 'true')
    }
    else
    {
        // Si la somme vaut 5, on active le bouton d'envoie du formulaire | If the sum is 5, activate the send button on the form
        btn.removeAttribute('disabled');
    }
}