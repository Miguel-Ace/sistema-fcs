import './bootstrap';

const menuToggle = document.querySelector('.menuToggle');
const lateral = document.querySelector('.lateral');
const principal = document.querySelector('.principal');

menuToggle.onclick = function(){
    lateral.classList.toggle('open');
    principal.classList.toggle('open');
}


// //
// const listaParticipantes = document.getElementById('id_expediente');
// const guardarParticipantes = document.getElementById('btnEnviarParticipante');
const listaParticipante = document.getElementById('listaParticipante');

// guardarParticipantes.addEventListener('click', function () {
//     listaParticipantes.setAttribute('name', 'id_expediente');
// });

listaParticipante.addEventListener('click', agregarParticipante);

function agregarParticipante(e){
    // e.preventDefault();
    if (e.target.classList.contains('botoncin')) {
        const participanteSelecionado = e.target.parentElement;
        agregarName(participanteSelecionado);
    }
}

function agregarName(participante) {
    console.log(participante.querySelector('input'));
    console.log(participante.querySelector('input').name = 'id_expediente');
    // const participanteListo = participante.querySelector('input');
    // participanteListo.setAttribute('name','id_expediente');
}


