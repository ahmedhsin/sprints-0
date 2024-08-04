document.querySelector('#addCountry').onclick = function() {
    let nameInEn = document.querySelector('#exampleName1').value;
    let nameInAr = document.querySelector('#exampleName2').value;
    let descInEn = document.querySelector('#exampleInputDescription1').value;
    let descInAr = document.querySelector('#exampleInputDescription2').value;
    let tr = document.createElement('tr');
    tr.innerHTML = `
        <td>${nameInEn}</td>
        <td>${nameInAr}</td>
        <td>${descInEn}</td>
        <td>${descInAr}</td>
    `;
    let exit = false;
    document.querySelectorAll('input').forEach((input) => {
        if (input.nextElementSibling.style.display === 'block') {
            exit = true;
        }
        if (input.value === '') {
            exit = true;
        }
    })
    if (exit){
        alert('Please fill the form correctly');
        return;
    }
    document.querySelector('tbody').appendChild(tr);
    document.querySelectorAll('input').forEach(input => input.value = '');
}

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