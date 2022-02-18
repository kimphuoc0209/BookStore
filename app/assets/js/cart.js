
// Increase items
function increase(id, price) {
    change_items(id, price, 1);
}

// Decrease items
function decrease(id, price) {
    change_items(id, price, -1);
}

// Change items
function change_items(id, price, qty) {
    let data = new FormData();
    data.append("change_cart_items", 1);
    data.append("id", id);
    data.append("qty", qty);

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "includes/cart.inc.php");
    xhr.onload = () => {
        let resp = xhr.responseText;
        if (resp) {
            console.log(resp);

            let current_qty = parseInt(document.querySelector("#qty_" + id).value);
            let new_qty = current_qty + qty;

            document.querySelector("#qty_" + id).value = new_qty;
            document.querySelector("#total_" + id).innerText = new_qty * price;
        }
    };
    xhr.send(data);
}