/*const form = document.querySelector('form');
console.log(form);

if(form)
{
    const inputs = document.querySelectorAll('form input');
    const select = document.querySelectorAll('form select');
    const labels = document.querySelectorAll('form label');

    console.log(inputs);
    console.log(labels);
    
    form.addEventListener('submit', () => 
    {
        for(let i = 0 ; i < inputs.length ; i++)
        {
            console.log(inputs[i]);

            if(inputs[i].value === '')
            {

                let parentInput = inputs[i].parentNode;
                let valueLabel = labels[i].innerHTML;
                
                console.log(parentInput);
                console.log(valueLabel);

                const divErreur = document.createElement('span');
                divErreur.setAttribute('class', 'text-danger');
                divErreur.classList.add('ps-3');
                divErreur.innerHTML = `Le champ ${valueLabel} ne peut être vide.`
                parentInput.appendChild(divErreur);
                
                console.log(divErreur);
            }
        }
    })
}*/