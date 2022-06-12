/* Sélection du formulaire de mise à jour */
const formUpdate = document.querySelector('#formUpdateCustomer');

// Si le formulaire de mise à jour existe
if(formUpdate)
{
    /* Sélection du bouton d'envoie du formulaire */
    const btnUpdate = document.querySelector('#formUpdateCustomer button');

    /* Sélection du message "champs obligatoire" */
    const msgOblig = document.querySelector('#updateOblig');

    /* Sélection des champs */
    let inputsUpdate = document.querySelectorAll('#formUpdateCustomer input');

    /* Création d'un tableau */
    let inputs = new Array();

    /* Ajout de chaque champ dans le tableau */
    inputsUpdate.forEach(input => { inputs.push(input)});

    /* Suppression des inputs invisible ou avec des valeurs par défaut (radio) */
    inputs.splice(0,1);
    inputs.splice(3,2);
    
    /* Pour chaque input */
    inputs.forEach(input =>
    {
        /* On récupère le label du champ */
        let label = input.parentNode.children[0];
        console.log(label.innerHTML);

        /* On crée une paragraphe qui contiendra les messages d'erreur */
        let brUpdate = document.createElement('br');
        let msgErrUpdate = document.createElement('span');
        msgErrUpdate.style.color = "red";

        /* On ajoute un événement de saisie en temps réel sur le champ */
        input.addEventListener('input', () => 
        {
            if(input.value.length <= 0)
            {
                // Si le champ est vide Modifier la bordure
                input.style.border = "2px dashed red";

                // Mettre en évidence le "champs obligatoires*"
                msgOblig.style.color = "red";
                msgOblig.style.fontWeight = "bold";
                msgOblig.style.fontSize = "2rem";

                // Afficher un message d'erreur sous le champ
                msgErrUpdate.innerHTML = "Le champ ne peut être vide.";
                input.parentNode.appendChild(msgErrUpdate);
            }
            else
            {
                // Si le champ n'est pas vide modifier la bordure
                input.style.border = "1px solid rgba(0,0,0,0.5)";

                // Remettre comme d'origine le message "champs obligatoires*"
                msgOblig.style.color = "black";
                msgOblig.style.fontWeight = "normal";
                msgOblig.style.fontSize = "1rem";
            }

            /* On controle la conformité des données saisies pour certains champ */
            if(label.innerHTML === "Téléphone*")
            {
                /* Expression régulière pour le téléphone */
                let regPhone = "[0][1-9]([.]{1}[0-9]{2}){4}";

                // Vérification de la saisie
                if(regex(regPhone, input.value))
                {
                    // Si la valeur du champ correspond à l'expression régulière la bordure est verte (valide), le message d'erreur et l'attribut data disparaissent
                    input.style.border = "2px solid green";
                    msgErrUpdate.innerHTML = "";
                    msgErrUpdate.remove();
                    input.removeAttribute('data-error');
                }
                else
                {
                    // Si la valeur du champ ne correspond pas à l'expression régulière la bordure est rouge (invalide), le message d'erreur et l'attribut data apparaissent
                    input.style.border = "2px dashed red";
                    msgErrUpdate.innerHTML = "En france les téléphone commence par 01 à 09 et sont suivi de 8 chiffres, n'oubliez de séparer par un point (.)";
                    input.parentNode.appendChild(msgErrUpdate);
                    input.setAttribute('data-error', 'error');
                } 
            }
            else if(label.innerHTML === "Email*")
            {
                /* Expression régulière pour l'email */
                let regMail = "[-.a-z0-9]+@+[-.a-z0-9]+[.]+([a-z]{2,3})";

                // Vérification de la saisie
                if(regex(regMail, input.value))
                {
                    // Si la valeur du champ correspond à l'expression régulière la bordure est verte (valide), le message d'erreur et l'attribut data disparaissent
                    input.style.border = "2px solid green";
                    msgErrUpdate.innerHTML = "";
                    msgErrUpdate.remove();
                    input.removeAttribute('data-error');
                }
                else
                {
                    // Si la valeur du champ ne correspond pas à l'expression régulière la bordure est rouge (invalide), le message d'erreur et l'attribut data apparaissent
                    input.style.border = "2px dashed red";
                    msgErrUpdate.innerHTML = "Le format d'email n'est pas correct.";
                    input.parentNode.appendChild(msgErrUpdate);
                    input.setAttribute('data-error', 'error');
                }
            }

            /* Activation du bouton d'envoie selon la présence ou non d'erreur */
            activeSubmit(inputs, btnUpdate);
     
        })
    })
}

/* Fonction si test si la valeur envoyé correspond à l'expression régulière */
function regex(regExp, value)
{
    let test = new RegExp(regExp).test(value);
    return test;
}

/* Fonction qui active et désactive le bouton d'envoie du formulaire si il y a une erreur dans le formulaire  */
function activeSubmit(fields, btn)
{
    /* On crée un tableau qui recevra les informations */
    let verifSubmit = [];

    /* On crée la variable qui fera la somme des valeurs du tableau */
    let sum = 0;

    for(let i = 0 ; i < fields.length ; i++)
    {
        if(fields[i].value <= 0 || fields[i].getAttribute('data-error') === 'error')
        {
            // Si la valeur du champ est vide ou s'il possède l'attribut 'data-error', on affiche 0
            verifSubmit[i] = 0;
        }
        else
        {
            // Si le champ n'est pas vide ou n'a pas l'attribut 'data-error', on affiche 1
            verifSubmit[i] = 1;
        }

        /* Calcul de la somme des valeurs du tableau */
        sum += verifSubmit[i];
    }

    if(sum < 5)
    { 
        // Si la somme est inférieur à 5, on désactive le bouton d'envoie du formulaire
        btn.setAttribute('disabled', 'true')
    }
    else
    {
        // Si la somme vaut 5, on active le bouton d'envoie du formulaire
        btn.removeAttribute('disabled');
    }
}
