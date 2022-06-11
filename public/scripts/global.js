const formUpdate = document.querySelector('#formUpdateCustomer');


if(formUpdate)
{
    const btnUpdate = document.querySelector('#formUpdateCustomer button');
    const msgOblig = document.querySelector('#updateOblig');
    const divForm = document.querySelectorAll('#formUpdateCustomer div.form-group')
    let inputsUpdate = document.querySelectorAll('#formUpdateCustomer input');
    let inputs = new Array();

    inputsUpdate.forEach(input => { inputs.push(input)});

    /* Suppression des inputs invisible ou avec des valeurs par défaut (radio) */
    inputs.splice(0,1);
    inputs.splice(3,2);
    
    inputs.forEach(input =>
    {
        /* On récupère le label du champ */
        let label = input.parentNode.children[0];
        console.log(label.innerHTML);

        /* On crée une paragraphe qui contiendra les messages d'erreur */
        let msgErrUpdate = document.createElement('p');
        msgErrUpdate.style.color = "red";

        input.addEventListener('input', () => 
        {
            let verifSubmit = [];
            let sumVerifSubmit = 0;

            if(input.value.length <= 0)
            {
                // Si la valeur du champ ne correspond pas à l'expression régulière la bordure est rouge (invalide) et le message d'erreur change
                input.style.border = "2px dashed red";
                msgOblig.style.color = "red";
                msgOblig.style.fontWeight = "bold";
                msgOblig.style.fontSize = "2rem";
            }
            else
            {
                input.style.border = "1px solid rgba(0,0,0,0.5)";
                msgOblig.style.color = "black";
                msgOblig.style.fontWeight = "normal";
                msgOblig.style.fontSize = "1rem";
            }

            /* On controle la conformité des données saisies pour certains champ */
            if(label.innerHTML === "Téléphone*")
            {
                let regPhone = "[0][1-9]([.]{1}[0-9]{2}){4}";
        
                /* Le champ aura une bordure grise */
                //input.style.border = "1px solid gray";
    
                if(regex(regPhone, input.value))
                {
                    // Si la valeur du champ correspond à l'expression régulière la bordure est verte (valide)
                    input.style.border = "2px solid green";
                    msgErrUpdate.innerHTML = "";
                    msgErrUpdate.remove();
                    input.removeAttribute('data-error');
                }
                else
                {
                    // Si la valeur du champ ne correspond pas à l'expression régulière la bordure est rouge (invalide) et le message d'erreur change
                    input.style.border = "2px dashed red";
                    input.setCustomValidity("En france les téléphone commence par 01 à 09 et sont suivi de 8 chiffres, n'oubliez de séparer par un point (.)");
                    msgErrUpdate.innerHTML = "En france les téléphone commence par 01 à 09 et sont suivi de 8 chiffres, n'oubliez de séparer par un point (.)";
                    input.parentNode.appendChild(msgErrUpdate);
                    input.setAttribute('data-error', 'error');
                } 
            }
            else if(label.innerHTML === "Email*")
            {
                let regMail = "[-.a-z0-9]+@+[-.a-z0-9]+[.]+([a-z]{2,3})";

                if(regex(regMail, input.value))
                {
                    // Si la valeur du champ correspond à l'expression régulière la bordure est verte (valide)
                    input.style.border = "2px solid green";
                    msgErrUpdate.innerHTML = "";
                    msgErrUpdate.remove();
                    input.removeAttribute('data-error');
                }
                else
                {
                    // Si la valeur du champ ne correspond pas à l'expression régulière la bordure est rouge (invalide) et le message d'erreur change
                    input.style.border = "2px dashed red";
                    input.setCustomValidity("Le format d'email n'est pas correct.");
                    msgErrUpdate.innerHTML = "Le format d'email n'est pas correct."
                    input.parentNode.appendChild(msgErrUpdate);
                    input.setAttribute('data-error', 'error');
                }
            }

            for(let i = 0 ; i < inputs.length ; i++)
            {
                if(inputs[i].value <= 0 || inputs[i].getAttribute('data-error') === 'error')
                {
                    verifSubmit[i] = 0;
                }
                else
                {
                    verifSubmit[i] = 1;
                }

                sumVerifSubmit += verifSubmit[i];

                
            }

            if(sumVerifSubmit < 5)
            { 
                btnUpdate.setAttribute('disabled', 'true')
            }
            else
            {
                btnUpdate.removeAttribute('disabled');
            }
            console.log(verifSubmit);
            console.log(sumVerifSubmit);

            /*for(let i = 0 ; i < verifSubmit.length ; i++)
            {
                
            }*/

            

        })
    })
}

/* Fonction si test si la valeur envoyé correspond à l'expression régulière */
function regex(regExp, value)
{
    let test = new RegExp(regExp).test(value);
    return test;
}
