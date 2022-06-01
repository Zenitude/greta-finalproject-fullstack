const formConnection = document.querySelector('#formConnection');
console.log(formConnection);

if(formConnection)
{
    const inputs = document.querySelectorAll('input');
    const labels = document.querySelectorAll('label');
    
    formConnection.addEventListener('submit', () => 
    {

        for(let i = 0 ; i < inputs.length ; i++)
        {
            if(inputs[i].value === '')
            {
                let parentInput = inputs[i].parentNode;
                let valueLabel = labels[i].innerHTML;
                
                const divErreur = document.createElement('span');
                divErreur.setAttribute('class', 'text-danger');
                divErreur.classList.add('ps-3');
                divErreur.innerHTML = `Le champ ${valueLabel} ne peut être vide.`
                parentInput.appendChild(divErreur);
                
                console.log(inputs[i]);
                console.log(parentInput);
                console.log(valueLabel);
                console.log(divErreur);
            }
        }
    })
}