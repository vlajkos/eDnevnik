let dodajPredmetSelect = document.querySelector("#dodajPredmet");
let idPredmet;
dodajPredmetSelect.addEventListener("change", function () {
    idPredmet = dodajPredmetSelect.value;
    // Don't forget 


    let profesori = JSON.parse(data);
    let izabraniProfesori = [];
    for (let i = 0; i < profesori.length; i++) {
        if (profesori[i].id_predmet == idPredmet) {
            izabraniProfesori.push(profesori[i]);

        }
    }
    //                 word.charAt(0).toUpperCase()
    //   + word.slice(1)

    let dodajProfesoraSelect = document.querySelector("#dodajProfesora");
    dodajProfesoraSelect.innerHTML = '<option selected disabled hidden>Izaberi profesora</option>';
    for (let j = 0; j < izabraniProfesori.length; j++) {
        dodajProfesoraSelect.innerHTML += `<option value=${izabraniProfesori[j].id}>` + izabraniProfesori[j].ime.charAt(0).toUpperCase() + izabraniProfesori[j].ime.slice(1) +
            " " +
            izabraniProfesori[j].prezime.charAt(0).toUpperCase() + izabraniProfesori[j].prezime.slice(1) + "</option>";
    }

})