function fetchAndProcessPartita(i, events) {
    if (i >= 5) {
      return;
    }
  
    const partita = events[i];
    const squadra1 = partita.strHomeTeam;
    const squadra2 = partita.strAwayTeam;
    const risultato = `${partita.intHomeScore} - ${partita.intAwayScore}`;
    const competizione = partita.strLeague ? partita.strLeague : 'N/A';
    const orario = partita.strTime ? partita.strTime : 'N/A';
    const stadio = partita.strVenue ? partita.strVenue : 'N/A';
    const dataPartita = partita.strTimestamp ? partita.strTimestamp.split('T')[0] : 'N/A';
  
    const h2 = document.createElement('h2');
    h2.textContent = 'Partita: ' + squadra1 + ' vs ' + squadra2;
    sezione.appendChild(h2);
  
    const p1 = document.createElement('p');
    p1.textContent = 'Risultato: ' + risultato;
    sezione.appendChild(p1);
  
    const p2 = document.createElement('p');
    p2.textContent = 'Competizione: ' + competizione;
    sezione.appendChild(p2);
  
    const p3 = document.createElement('p');
    p3.textContent = 'Orario: ' + orario;
    sezione.appendChild(p3);
  
    const p4 = document.createElement('p');
    p4.textContent = 'Stadio: ' + stadio;
    sezione.appendChild(p4);
  
    const p5 = document.createElement('p');
    p5.textContent = 'Data: ' + dataPartita;
    sezione.appendChild(p5);
  
    const id = partita.idEvent;
    const casa=partita.intHomeScore;
    const ospite=partita.intAwayScore;

    const url = `http://localhost/cercalikepartita.php?id=${id}`;
    fetch(url)    
    .then(response => response.json())
    .then(json => onCercaLikePartitaJson(json, id, squadra1, squadra2, casa, ospite, competizione, orario, stadio, dataPartita ))
    .then(() => {
      const hr = document.createElement('hr');
      sezione.appendChild(hr);
      fetchAndProcessPartita(i + 1, events);
    });
  }

  function onCercaLikePartitaJson(json, id, squadra1, squadra2, casa, ospite, competizione, orario, stadio, dataPartita) {
    const bottone = document.createElement('button');
    bottone.classList.add('bottone1', 'bottone-like');
    const cuore = document.createElement('i');
    if (json.exists === true) {
      console.log('Like messo');
      cuore.classList.add('fas');
    } else {
      console.log('Like non messo');
      cuore.classList.add('far');
    }

    bottone.appendChild(cuore);
    sezione.appendChild(bottone);
  
    cuore.classList.add('fa-heart');

    bottone.addEventListener('click', function () {
  
      if (cuore.classList.contains('far')) {
        cuore.classList.remove('far');
        cuore.classList.add('fas');
        cuore.classList.add('animating');
        fetch(`http://localhost/aggiungilikepartite.php?id=${id}&squadra1=${squadra1}&squadra2=${squadra2}&casa=${casa}&ospite=${ospite}&competizione=${competizione}&orario=${orario}&stadio=${stadio}&dataPartita=${dataPartita}`)
        .then((response) => response.text())
        .then((data) => console.log(data))
        .catch((error) => console.log(error));
      } else {
        cuore.classList.remove('fas');
        cuore.classList.add('far');
        cuore.classList.add('animating');
        fetch(`http://localhost/rimuovilikepartite.php?id=${id}`)
          .then((response) => response.text())
          .then((data) => console.log(data))
          .catch((error) => console.log(error));
      }
      
      setTimeout(function() {
        cuore.classList.remove('animating');
      }, 500);
    });
  }

  
  
  
  


function onCercaLikePartita(response){
    return response.json();
}

function onCercaPartitaJson(json){
    console.log(json);
    const sezione=document.getElementById('sezione');
    sezione.innerHTML='';
    sezione.classList.remove('hidden');
    const eventi = json.event;
    fetchAndProcessPartita(0, eventi);
}


function onCercaPartita(response){
    return response.json();
}

function onSubmit(event) {
    event.preventDefault();

    const form = document.querySelector('#form1');
    const squadra1= form.elements.squadra1.value;
    const squadra2=form.elements.squadra2.value;

    const data = new FormData();
    data.append('squadra1', squadra1);
    data.append('squadra2', squadra2);

    fetch('http://localhost/cercapartite.php', {
        method: 'POST',
        body: data
    }).then(onCercaPartita).then(onCercaPartitaJson);
    }


const form=document.getElementById('form1');
form.addEventListener('submit', onSubmit);