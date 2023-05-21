let occupiedPlaces = document.querySelector(".occupiedPlaces");
let tableOccupiedText = document.querySelector(".table-occupied");
let order = document.querySelector(".order-button");

function changeButtonState() {
    switch (occupiedPlaces.innerText) {
        case 0:
        case "0":
            order.classList.add("blocked");
            tableOccupiedText.innerText = "wolny";
            order.setAttribute("disabled", true);
            break;
        default:
            order.classList.remove("blocked");
            tableOccupiedText.innerText = "zajęty";
            order.setAttribute("disabled", false);
    }
}

async function addPersonToTable() {
    await fetch("/tables/addPersonToTable/" + occupiedPlaces.dataset.id)
        .then((el) => el.json())
        .then((el) => {
            occupiedPlaces.innerText = el.occupiedPlaces;
            changeButtonState();
        })
        .catch((el) => console.log(el));
}

async function removePersonFromTable() {
    await fetch("/tables/removePersonFromTable/" + occupiedPlaces.dataset.id)
        .then((el) => el.json())
        .then((el) => {
            occupiedPlaces.innerText = el.occupiedPlaces;
            changeButtonState();
        });
}

changeButtonState();
