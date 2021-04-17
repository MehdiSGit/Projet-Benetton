/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
import React from 'react';
import ReactDOM from 'react-dom';
import Search from './components/SearchBar';
import Blog from './components/Blog'
const searchBar = document.getElementById('search-bar');
const blogSelector = document.getElementById('blog-pricipal');
// Can also be included with a regular script tag
import Typed from 'typed.js';

if (searchBar) {
    ReactDOM.render(
        <Search />, searchBar
    )
}


if (blogSelector) {
    ReactDOM.render(
        <Blog />,
        blogSelector)
}



// function appear(){

//         let logos  = document.querySelectorAll('.startup_logo img');
//         for(i=0; i<logos.length; i++){
//             let logo = logos[i];
//             logo.classList.toggle('hide'); 
//         }
//     }

//     window.onload = appear();

//     setInterval(logo, 1000)



// function appear(){

//         let logos  = document.querySelector('.startup_logo');
//         logos.classList.toggle('red');


//         console.log(logos)

// }

// window.onload = appear();

// setInterval(appear, 2000);

window.addEventListener('scroll', reveal);

function reveal() {
    let element = document.querySelector('.startup_logo');

    let position = element.getBoundingClientRect();

    if (position.top >= 0 && position.bottom <= window.innerHeight) {
        element.classList.add('logo_animation')
    }
}


window.addEventListener('scroll', active);

function active() {
    let h1 = document.querySelector('.force');

    let pos = h1.getBoundingClientRect();

    if (pos.top >= 0 && pos.bottom <= window.innerHeight) {
        h1.classList.add('activee')
    }
}


window.addEventListener('scroll', appearConcept);

function appearConcept() {
    let concept = document.querySelector('.articles');

    let p = concept.getBoundingClientRect();

    if (p.top >= 0 && p.bottom <= window.innerHeight) {
        concept.classList.add('activeConcept')
    }
}



let typed = new Typed('#typed', {
    strings: ['UX Design', 'UI Design', 'Developpeur', 'Web', 'Dev', 'Front', 'Data'],
    typeSpeed: 0,
    backSpeed: 0,
    smartBackspace: true, // c'est par defaut
    loop: true
});



// Fonction qui va gérer la vidéo

function pauseVideo() {

    let video = document.getElementById('video')
    let bouton = document.getElementById('btn')

    if (video.paused) {
        bouton.textContent = 'Pause'
        video.play()
    }
    else {
        video.pause()
        bouton.textContent = 'Play'
    }
}

bouton.addEventListener('click', pauseVideo);