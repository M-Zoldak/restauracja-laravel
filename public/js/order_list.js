const InProgres = 1;
const Ready = 2;
const Delivered = 3;

const statusButtons = document.querySelectorAll(".status-button");

function changeStatusText(id, text) {
    console.log(`change: ${id} to ${text}`);
  const statusText = document.getElementById(`status${id}`);
  statusText.textContent = text;
}

function showDeleteButton(id) {
  const delteOrder = document.getElementById(`delete${id}`);
  delteOrder.classList.remove("confirm-hidden");
}

function buttonClick(button, id)
{
    console.log("click");
    const statusText = document.getElementById(`status${id}`);
    switch(statusText.textContent)
    {
        case "In Progress":
            console.log("In progress");
            updateOrderStatus(id, Ready, button)
            break;
        case "Ready":
            console.log("ready");
            updateOrderStatus(id, Delivered, button)
            break;
        case "Delivered":
            showDeleteButton(id);
            break;
    }
}

function changeButtonState(id, button, status)
{
    if (status === InProgres) {
        changeStatusText(id, "In Progress");
    }
    else if (status === Ready) {
        button.parentElement.parentElement.classList.add("order-ready");
        changeStatusText(id, "Ready");
        button.textContent = "Dostarczono";
    }
    else if (status === Delivered) {
        button.parentElement.parentElement.classList.remove("order-ready");
        button.parentElement.parentElement.classList.add("order-delivered");

        button.classList.add("confirm-hidden");
        changeStatusText(id, "Delivered");
        showDeleteButton(id);
    }
}

async function updateOrderStatus(orderId, status, button){
    await fetch("/order/updateOrderStatus/" + orderId + "/" + status)
        .then(() => {
            changeButtonState(orderId, button, status);
        })
        .catch((el) => console.log(el));
}

statusButtons.forEach((button) => {
  button.addEventListener("click", (event) => {
    buttonClick(button, event.target.id);
  });
});


    //function changeStatusButton(button, id) {
    //   if (button.textContent === "Ready") {
    //     button.parentElement.parentElement.classList.remove("order-ready");
    //     button.parentElement.parentElement.classList.add("order-delivered");

    //     showDeleteButton(id);
    //     changeStatusText(id, "Status: Delivered");
    //     button.classList.add("confirm-hidden");
    //   } else {
    //     changeStatusText(id, "Status: Ready");
    //     button.textContent = "Dostarczono";
    //     updateOrderStatus(id, 2);
    //   }
    // }

////////////////////////
/////// Dragging ///////
////////////////////////

const draggables = document.querySelectorAll(".draggable");
const containers = document.querySelectorAll(".order-list-ul");

draggables.forEach((draggable) => {
  draggable.addEventListener("dragstart", () => {
    draggable.style.backgroundColor = "lightgray";
    draggable.classList.add("dragging");
  });

  draggable.addEventListener("dragend", () => {
    draggable.style.backgroundColor = "white";
    draggable.classList.remove("dragging");
  });
});

containers.forEach((container) => {
  container.addEventListener("dragover", (e) => {
    e.preventDefault();
    const afterElement = getDragAfterElement(container, e.clientY);
    const draggable = document.querySelector(".dragging");
    if (afterElement == null) {
      container.appendChild(draggable);
    } else {
      container.insertBefore(draggable, afterElement);
    }
  });
});

function getDragAfterElement(container, y) {
  const draggableElements = [
    ...container.querySelectorAll(".draggable:not(.dragging)"),
  ];
  return draggableElements.reduce(
    (closest, child) => {
      const box = child.getBoundingClientRect();
      const offset = y - box.top - box.height / 2;
      if (offset < 0 && offset > closest.offset) {
        return { offset: offset, element: child };
      } else {
        return closest;
      }
    },
    { offset: Number.NEGATIVE_INFINITY }
  ).element;
}
