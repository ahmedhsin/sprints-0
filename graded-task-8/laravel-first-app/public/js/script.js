if(document.URL.split('product')[1]){
    let inputs = document.querySelectorAll('form .simulated');

    for (input of inputs){
        input.onkeyup = function() {
            let input_name = event.target.getAttribute('name');
            let written_el = document.querySelector('.simulation div span[related_to="'+input_name+'"] ');
            written_el.innerHTML = event.target.value;
        }
    }

    //simulate images inputs
    let simulation_images = document.querySelector('.simulation .images');
    document.querySelector('form input[type="file"]').onchange = function(){
        simulation_images.innerHTML = '';
        for(let file of event.target.files){
            let img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            if (simulation_images.innerHTML == ''){
                img.style.width = '350px';
                img.style.height = '100%';
                img.style.display = 'block';
            }
            simulation_images.append(img);
        }
    }
}
