
async function getCorrectDomka() {
    const response = await fetch('https://domkamichal.eu/backend/domka/index_domka.php');
    const json = await response.json();
    return json;
}
  
function postDomka(formular) {
    fetch('https://domkamichal.eu/backend/domka/index_domka.php', {
        method: "POST",
        body: JSON.stringify(formular)
    })
        .then((response) => {console.log(response.json())})
        .then((json) => console.log(json));
}

async function getCorrectMitko() {
    const response = await fetch('https://domkamichal.eu/backend/mitko/index_mitko.php');
    const json = await response.json();
    return json;
}
  
function postMitko(formular) {
    fetch('https://domkamichal.eu/backend/mitko/index_mitko.php', {
        method: "POST",
        body: JSON.stringify(formular)
    })
        .then((response) => {console.log(response.json())})
        .then((json) => console.log(json));
}

function formatDate(date, onlyDate = false) {
    var d = new Date(date);

    year = d.getFullYear();
    month = '' + (d.getMonth() + 1);
    day = '' + d.getDate();
    hours = '' + d.getHours();
    minutes = '' + d.getMinutes();

    if (minutes.length < 2) { minutes = '0' + minutes; } 

    if(onlyDate){
        return [day, month, year].join('.')
    }

    return [day, month, year].join('.') + ' o ' + [hours, minutes].join(':');
}