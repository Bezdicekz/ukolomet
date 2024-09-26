function timerApp() {
    return {
        zapnuto: false,
        casZacatku: null,
        casUbehly: 0,
        timerInterval: null,
        finalTime: "00:00:00",

        // Getter pro formátovaný čas
        get formattedTime() {
            let totalSeconds = Math.floor(this.casUbehly / 1000);
            let hours = String(Math.floor(totalSeconds / 3600)).padStart(2, '0');
            let minutes = String(Math.floor((totalSeconds % 3600) / 60)).padStart(2, '0');
            let seconds = String(totalSeconds % 60).padStart(2, '0');
            return `${hours}:${minutes}:${seconds}`;
        },

        // Spuštění nebo zastavení timeru
        prepniTimer() {
            if (!this.zapnuto) {
                this.startTimer();
            } else {
                this.stopTimer();
            }
        },

        // Funkce pro spuštění timeru
        startTimer() {
            console.log('startuji odpočet');
            this.zapnuto = true;
            this.casZacatku = Date.now();
            console.log('Startovací čas: ' + this.casZacatku);
            this.timerInterval = setInterval(() => {
                const currentTime = Date.now();
                this.casUbehly = currentTime - this.casZacatku;
                document.getElementById("nav-timer").textContent = this.formattedTime; // aktualizuj nadpis timer
            }, 1000);
            console.log('Uběhlý čas: ' + this.casUbehly);

            // Zobrazí nadpis a skryje textové pole
            document.getElementById("nav-timer").classList.remove("hidden");
            document.getElementById("cas-ukolu").classList.add("hidden");
        },

        // Funkce pro zastavení timeru
        stopTimer() {
            this.zapnuto = false;
            clearInterval(this.timerInterval);
            this.casUbehly = Date.now() - this.casZacatku;

            // Uloží výsledný čas do textového pole
            this.finalTime = this.formattedTime;
            console.log('Výsledný čas : ' + this.finalTime);

            // Skryje nadpis a zobrazí textové pole
            document.getElementById("cas-ukolu").textContent = "Čas věnovaný úkolu: " + this.finalTime;
            document.getElementById("nav-timer").classList.add("hidden");
            document.getElementById("cas-ukolu").classList.remove("hidden");

            // Resetuje čas
            this.casUbehly = 0;
        }
    };
}