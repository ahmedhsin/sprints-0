let productNumbers = prompt("How many products do you want to buy?");
let products = []
for (let i =0; i < productNumbers; i++) {
    let name = prompt(`Enter product number: ${i+1} name`);
    let price = prompt(`Enter product number: ${i+1} price`);
    products[products.length] = {name: name, price: parseInt(price)};
}
let total = 0;
for (let i =0; i < productNumbers; i++) {
    total += products[i].price
    console.log(`Product name: ${products[i].name}`);
}
console.log(`Total price is ${total}`)