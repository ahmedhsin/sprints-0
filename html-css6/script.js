let btns = document.querySelectorAll('button')
btns.forEach((btn) => {
    btn.onclick = ((e) => {
        btns.forEach((btn_tmp) => {
            if (btn_tmp.classList.contains('active')){
                btn_tmp.classList.remove('active')
            }
        })
        btn.classList.add('active')
    })
})