// Inicializace proměnných pro aktuální měsíc a rok
let aktualniDatum = new Date();
let aktualniMesic = aktualniDatum.getMonth();
let aktualniRok = aktualniDatum.getFullYear();
let dnes = aktualniDatum.getDate(); // Aktuální den

// Název měsíců
const jmenaMesicu = ["Leden", "Únor", "Březen", "Duben", "Květen", "Červen", "Červenec", "Srpen", "Září", "Říjen", "Listopad", "Prosinec"];

// Změna měsíce zpět
document.getElementById('mesic-zpet').addEventListener('click', function() {
  if (aktualniMesic === 0) {
    aktualniMesic = 11;
    aktualniRok--;
  } else {
    aktualniMesic--;
  }
  updateKalendar();
});

// Změna měsíce dopředu
document.getElementById('mesic-vpred').addEventListener('click', function() {
  if (aktualniMesic === 11) {
    aktualniMesic = 0;
    aktualniRok++;
  } else {
    aktualniMesic++;
  }
  updateKalendar();
});

// Funkce pro zobrazení kalendáře
function updateKalendar() {
  // Aktualizace názvu měsíce a roku
  document.getElementById('kalendar-mesic-rok').textContent = `${jmenaMesicu[aktualniMesic]} ${aktualniRok}`;

  // Získání prvního dne měsíce a počtu dní v měsíci
  const prvniDen = new Date(aktualniRok, aktualniMesic, 1).getDay();
  const denvMesici = new Date(aktualniRok, aktualniMesic + 1, 0).getDate();

  // Vyprázdnění kalendáře
  const dnyKalendare = document.getElementById('dny-v-kalendari');
  dnyKalendare.innerHTML = '';

  // Naplnění kalendáře prázdnými buňkami před prvním dnem měsíce
  const blankDays = prvniDen === 0 ? 6 : prvniDen - 1; // Upravíme pro začátek týdne od pondělí
  for (let i = 0; i < blankDays; i++) {
    const prazdnaBunka = document.createElement('div');
    dnyKalendare.appendChild(prazdnaBunka);
  }

  // Vygenerování dní měsíce
  for (let day = 1; day <= denvMesici; day++) {
    const poleDen = document.createElement('div');
    poleDen.textContent = day;
    poleDen.classList.add('p-2', 'hover:bg-gray-200', 'cursor-pointer');
    
    // Zvýraznění aktuálního dne
    if (day === dnes && aktualniMesic === aktualniDatum.getMonth() && aktualniRok === aktualniDatum.getFullYear()) {
        poleDen.classList.add('bg-gray-400', 'text-white', 'rounded-full');
    }
    
    dnyKalendare.appendChild(poleDen);
  }
}

// Inicializace kalendáře při načtení stránky
updateKalendar();
