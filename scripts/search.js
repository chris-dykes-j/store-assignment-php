
document.getElementById("item-input").addEventListener("input", (e) => {
    let cymbals = [];
    if (e.target.value) {
        e.target.value = e.target.value.toUpperCase();
        cymbals = products.filter(product => product.toUpperCase().startsWith(e.target.value));
        cymbals = cymbals.map(cymbal => `<li><a href="#">${cymbal}</a></li>`);
    }
    showProducts(cymbals);
});

function showProducts(cymbals) {
    const newList = !cymbals.length ? '' : cymbals.join('');
    document.getElementById("items-list").innerHTML = newList;
}
