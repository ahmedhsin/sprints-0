document.querySelectorAll('input').forEach((input) => {
    
    input.onkeyup = function() {
        if(input.value.length < 3) {
            input.nextElementSibling.style.display = 'block';
            console.log(input.nextElementSibling)
        }else{
            input.nextElementSibling.style.display = 'none';
        }
    }
})