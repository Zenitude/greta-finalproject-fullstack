const { type } = require("jquery");

// Sélection du bâtiment
const headHotel = document.querySelector('#head img:nth-child(2)');

// Création de la timeline
const timeLine = gsap.timeline();

// Création de l'animation
timeLine
    .to(headHotel,
    {
        y: 100,
        scrollTrigger: 
        {
            trigger: 'head',
            scrub: true
        }
    })

// Formulaires
/*function formulaire()
{
    const formConnection = document.querySelector('#formConnection');

    class InputFormulaire 
    {       
        constructor(form, id, textLabel, catCell, typeInput, nameError, classLabel, classInput) 
        {
           this.form = form;
           this.id = id;
           this.textLabel = textLabel;
           this.catCell = catCell;
           this.typeInput = typeInput;
           this.nameError = nameError;
           this.classLabel = classLabel;
           this.classInput = classInput;
        }

        createInputFusion(form, id, textLabel, catCell, typeInput, nameError, classLabel, classInput)
        {
            let messageError = `<?php if(isset($${nameError}) && $${nameError} != ''){ echo $${nameError}; } ?>`;

            const divGroup = document.createElement('div');
            divGroup.setAttribute('class', 'form-floating my-5 rounded-pill');
            form.appendChild(divGroup)

            const label = document.createElement('label');
            label.setAttribute('for', id);
            label.setAttribute('class', classLabel);
            label.innerText = textLabel;
            divGroup.appendChild(label);
        
            const input = document.createElement(catCell);
            if(catCell === 'input')
            {
                input.setAttribute('type', typeInput);
            }
            input.setAttribute('id', id);
            input.setAttribute('name', id);
            input.setAttribute('class', classInput);
            divGroup.appendChild(input);
            divGroup.appendChild(messageError); 
        }
    }

    const connexionIdentify = new InputFormulaire().createInputFusion(
        formConnection, 
        'emailConnection',
        'Email', 
        'input',
        'text',
        'identify',
        'input-group-text rounded-pill border bg-beige text-darkness fw-bold',
        'form-control rounded-pill border'
    )
    
    const connexionPassword = new InputFormulaire().createInputFusion(
        formConnection, 
        'passwordConnection',
        'Mot de passe',
        'input',
        'password',
        'password',
        'input-group-text rounded-pill border bg-beige text-darkness fw-bold',
        'form-control rounded-pill border'
    )

    connexionIdentify;
    connexionPassword;
}

formulaire();*/