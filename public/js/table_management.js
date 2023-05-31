let occupiedPlacesSpan = document.querySelector("span.occupiedPlaces");
let tableOccupiedText = document.querySelector(".table-occupied");
let orderBtn = document.querySelector(".order-button");

const changeTableState = (occupiedPlaces) => {
    switch (occupiedPlaces) {
        case 0:
        case "0":
            orderBtn.classList.add("blocked");
            tableOccupiedText.innerText = "wolny";
            orderBtn.setAttribute("disabled", true);
            break;
        default:
            orderBtn.classList.remove("blocked");
            tableOccupiedText.innerText = "zajęty";
            orderBtn.setAttribute("disabled", false);
    }
};

async function addPersonToTable() {
    await fetch("/tables/addPersonToTable/" + occupiedPlacesSpan.dataset.id)
        .then((el) => el.json())
        .then((el) => {
            occupiedPlacesSpan.innerText = el.occupiedPlaces;
            changeTableState(el.occupiedPlaces);
        });
}

async function removePersonFromTable() {
    await fetch(
        "/tables/removePersonFromTable/" + occupiedPlacesSpan.dataset.id
    )
        .then((el) => el.json())
        .then((el) => {
            occupiedPlacesSpan.innerText = el.occupiedPlaces;
            changeTableState(el.occupiedPlaces);
        });
}

changeTableState(occupiedPlacesSpan.innerText.trim());
