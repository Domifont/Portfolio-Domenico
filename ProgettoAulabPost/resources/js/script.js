// rotazione logo

let logo = document.querySelector('#logo');

window.onscroll = function () {
    scrollRotate();
};

function scrollRotate() {
    logo.style.transform = "rotate(" + window.scrollY/6 + "deg)";
}

// card

let lavoratori = [
    {name: 'Emanuele Tozzi', descr: 'Web developer', url:'/storage/images/Emanuele.jpg'},
    {name: 'Giancarlo Amoruso', descr: 'Web developer', url:'/storage/images/Giancarlo.webp'},
    {name: 'Domenico Fontana', descr: 'Web developer', url:'/storage/images/Domenico.jpg'},
    {name: 'Antonino Scilipoti', descr: 'Web developer', url:'/storage/images/Antonino.jpg'},
]

let circle = document.querySelector('#circle');
let opener = document.querySelector('#opener');
let quattroCard = document.querySelector('#quattroCard');
let cardImg = document.querySelector('#cardImg');
let cardTitle = document.querySelector('#cardTitle');
let cardDescription = document.querySelector('#cardDescription');
let chisiamo = document.querySelector('#chisiamo');

let check = true;
opener.addEventListener('click', ()=>{

    if (check==true) {
        opener.style.transform= 'rotate(45deg)';
        check=false;
        movedDivs.forEach( (div, i)=>{
            let angle = (360/movedDivs.length)*i;
            div.style.transform = `rotate(${angle}deg) translate(150px) rotate(-${angle}deg)`
        })
    }else{
        opener.style.transform= 'rotate(0deg)';
        check=true;
        movedDivs.forEach( (div)=>{
            div.style.transform = `rotate(0deg) translate(0px) rotate(0deg)`
        })
        quattroCard.classList.add('d-none')
    }
})

lavoratori.forEach( (persona)=>{
    let div = document.createElement('div');
    div.classList.add('moved');
    div.style.backgroundImage = `url(${persona.url})`;
    circle.appendChild(div);
})

let movedDivs = document.querySelectorAll('.moved');

movedDivs.forEach( (div, i)=>{
    div.addEventListener('click', ()=>{
        quattroCard.classList.remove('d-none');
        quattroCard.classList.add('text-w');
        cardImg.src= lavoratori[i].url;
        cardTitle.innerHTML = lavoratori[i].name;
        cardDescription.innerHTML = lavoratori[i].descr;
    })
})