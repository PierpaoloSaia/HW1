function onpartitaJson(json) {
    const partita = document.getElementById("partita");
  
    json.forEach(function(partita) {
      const squadra1 = partita.squadra1;
      const squadra2 = partita.squadra2;
      const casa = partita.casa; 
      const ospite= partita.ospite;
      const competizione = partita.competizione;
      const orario = partita.orario;
      const stadio = partita.stadio;
      const dataPartita = partita.dataPartita;

      const h3 = document.createElement('h3');
      h3.textContent = 'Partita: ' + squadra1 + ' vs ' + squadra2;
      h3.classList.add('titolo');
      partite.appendChild(h3);

    const p1 = document.createElement('p');
    p1.textContent = 'Risultato: ' + casa + ' - ' + ospite;
    p1.classList.add('testo', 'risultato');
    partite.appendChild(p1);

    const p2 = document.createElement('p');
    p2.textContent = 'Competizione: ' + competizione;
    partite.appendChild(p2);

    const p3 = document.createElement('p');
    p3.textContent = 'Orario: ' + orario;
    partite.appendChild(p3);

    const p4 = document.createElement('p');
    p4.textContent = 'Stadio: ' + stadio;
    partite.appendChild(p4);

    const p5 = document.createElement('p');
    p5.textContent = 'Data: ' + dataPartita;
    partite.appendChild(p5);

    const cuore = document.createElement('i');
    cuore.classList.add('fas', 'fa-heart');
    partite.appendChild(cuore);

    const hr = document.createElement("hr");
    partite.appendChild(hr);

    cuore.addEventListener('click', function() {
        if (cuore.classList.contains('far')) {
          cuore.classList.remove('far');
          cuore.classList.add('fas');
          cuore.classList.add('animating');
          fetch(`http://localhost/aggiungilikepartite.php?id=${partita.idPartita}&squadra1=${partita.squadra1}&squadra2=${partita.squadra2}&casa=${partita.casa}&ospite=${partita.ospite}&competizione=${partita.competizione}&orario=${partita.orario}&stadio=${partita.stadio}&dataPartita=${partita.dataPartita}`)
            .then((response) => response.text())
            .then((data) => console.log(data))
            .catch((error) => console.log(error));
        } else {
          cuore.classList.remove('fas');
          cuore.classList.add('far');
          cuore.classList.add('animating');
          fetch(`http://localhost/rimuovilikepartite.php?id=${partita.idPartita}`)
            .then((response) => response.text())
            .then((data) => console.log(data))
            .catch((error) => console.log(error));
        }
  
        setTimeout(function() {
          cuore.classList.remove('animating');
        }, 500);
    });


});
  
}

  function onpartita(response){
    return response.json();
  }
  

  

function onStadiJson(json) {
    const stadi = document.getElementById("stadi");
  
    json.forEach(function(stadio) {
  
      const nome = document.createElement("p");
      nome.textContent = stadio.stadio; 
      stadi.appendChild(nome);
  
      const foto = document.createElement("img");
      foto.src = stadio.foto; 
      stadi.appendChild(foto);
  
      const cuore = document.createElement('i');
      cuore.classList.add('fas', 'fa-heart');
      stadi.appendChild(cuore);

      const hr = document.createElement("hr");
      stadi.appendChild(hr);

      cuore.addEventListener('click', function() {
        if (cuore.classList.contains('far')) {
          cuore.classList.remove('far');
          cuore.classList.add('fas');
          cuore.classList.add('animating');
          fetch(`http://localhost/aggiungilikestadio.php?stadio=${stadio.stadio}&foto=${stadio.foto}`)
            .then((response) => response.text())
            .then((data) => console.log(data))
            .catch((error) => console.log(error));
        } else {
          cuore.classList.remove('fas');
          cuore.classList.add('far');
          cuore.classList.add('animating');
          fetch(`http://localhost/rimuovilikestadio.php?stadio=${stadio.stadio}`)
            .then((response) => response.text())
            .then((data) => console.log(data))
            .catch((error) => console.log(error));
        }
  
        setTimeout(function() {
          cuore.classList.remove('animating');
        }, 500);
      });
  
  
    });
  }

  function onStadi(response){
    return response.json();
  }

  function onGiocatoriJson(json) {
    const giocatori = document.getElementById("giocatori");
  
    json.forEach(function(giocatore) {
      const nome = document.createElement("p");
      nome.textContent = giocatore.giocatore;
      giocatori.appendChild(nome);
  
      const foto = document.createElement("img");
      foto.src = giocatore.foto;
      giocatori.appendChild(foto);
  
      const cuore = document.createElement('i');
      cuore.classList.add('fas', 'fa-heart');
      giocatori.appendChild(cuore);

      const hr = document.createElement("hr");
      giocatori.appendChild(hr);
  
      cuore.addEventListener('click', function() {
        if (cuore.classList.contains('far')) {
            cuore.classList.remove('far');
            cuore.classList.add('fas');
            cuore.classList.add('animating');
            fetch(`http://localhost/aggiungilike.php?giocatore=${giocatore.giocatore}&foto=${giocatore.foto}`)
              .then((response) => response.text())
              .then((data) => console.log(data))
              .catch((error) => console.log(error));
          } else {
            cuore.classList.remove('fas');
            cuore.classList.add('far');
            cuore.classList.add('animating');
            fetch(`http://localhost/rimuovilike.php?giocatore=${giocatore.giocatore}`)
              .then((response) => response.text())
              .then((data) => console.log(data))
              .catch((error) => console.log(error));
          }
    
          setTimeout(function() {
            cuore.classList.remove('animating');
          }, 500);
        });
      });
    }

    function onGiocatori(response){
        return response.json();
    }

  
  
  fetch('http://localhost/stadi.php').then(onStadi).then(onStadiJson);
  fetch('http://localhost/giocatori.php').then(onGiocatori).then(onGiocatoriJson);
  fetch('http://localhost/partitelike.php').then(onpartita).then(onpartitaJson);