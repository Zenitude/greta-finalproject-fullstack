// Sélection de l'élément
const headHotel = document.querySelector('#head img:nth-child(2)');

// Création de l'animation
gsap
    
    .fromTo(headHotel,
    {
        y:-175
    },
    {
        y:50,
        scrollTrigger: 
        {
            trigger: '#head',
            scrub: true
        }
    });

/* Création d'une timeline */
const timeLine = gsap.timeline();

/* Animation section Présentation Hotel */
const divsPresentation = document.querySelectorAll('#presentation div div div');


divsPresentation.forEach(div => 
{
    timeLine
        .fromTo(div, 
        {
            y:100,
            x:50,
            opacity: 0,
        },
        {
            y: 5,
            x:0,
            opacity: 1,
            duration: 0.5,
            delay: 0.1
        })

});

/* Animation section Activités Hotel */
const divsActivities = document.querySelectorAll('#activities .card');

timeLine
    .fromTo(
        divsActivities[0], 
        {
            x: -200,
            opacity: 0,
        }, 
        {
            x: 0,
            opacity: 1,
            duration: 0.5,
            delay: 0.1
        }
    )

timeLine
    .fromTo(
        divsActivities[1],
        {
            x: 100,
            opacity: 0,
        }, 
        {
            x: 0,
            opacity: 1,
            duration: 0.5,
            delay: 0.1
        }
    )

/* Animation section Chefs Restaurant*/
const chefs = document.querySelectorAll('#chefs .card');

chefs.forEach(chef => 
{
    timeLine
        .fromTo(
            chef,
            {
                y: -50,
                opacity: 0,
            },
            {
                y: 0,
                opacity: 1,
                duration: 0.5,
                delay: 0.1
            }
        )
});