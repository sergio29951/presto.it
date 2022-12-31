let btn = document.querySelector('#btnCreate');
let icon = document.querySelector('#iconCreate');
let text = document.querySelector('#txtCrea');


let confirm = false;

btn.addEventListener('click', ()=>{
  if(!confirm){
    text.classList.add('txtCreate');
    icon.classList.remove('iconCreate');
    btn.classList.add('roundBtn');
    confirm = true;
  } else {
    icon.classList.add('iconCreate');
    text.classList.remove('txtCreate');
    btn.classList.remove('roundBtn');
    confirm = false;
    text.classList.add('txtCreate');
    icon.classList.remove('iconCreate');
    btn.classList.add('roundBtn');
  }
});








