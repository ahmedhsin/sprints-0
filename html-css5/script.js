function isPrime(num) {
    for (let i = 2; i * i <= num; i++) {
        if (num % i === 0) return false;
    }
    return true;
}

while(false){
    let num = Number(prompt("enter number to check or -1 to exit"))
    if (num === -1) break;
    alert(isPrime(num) ? "Number Is Prime" : "Number Is Not Prime")
}