const btn1 = document.getElementById('miBtn1');
const conta1 = document.getElementById('conta1');

const btn2 = document.getElementById('miBtn2');
const conta2 = document.getElementById('conta2');

const btn3 = document.getElementById('miBtn3');
const conta3 = document.getElementById('conta3');

const btn4 = document.getElementById('miBtn4');
const conta4 = document.getElementById('conta4');

const btn5 = document.getElementById('miBtn5');
const conta5 = document.getElementById('conta5');

let itci = 0, tec = 0, urn = 0, uacj = 0, uach = 0;

btn1.addEventListener('click', funtion())
{
    itci++;
    conta1.textContent = itci;
    btn1.disabled = true;
    btn1.textContent = 'votado';
}

btn2.addEventListener('click', funtion())
{
    tec++;
    conta2.textContent = tec;
    btn2.disabled = true;
    btn2.textContent = 'votado';
}

btn3.addEventListener('click', funtion())
{
    urn++;
    conta3.textContent = urn;
    btn3.disabled = true;
    btn3.textContent = 'votado';
}

btn4.addEventListener('click', funtion())
{
    uacj++;
    conta4.textContent = uacj;
    btn4.disabled = true;
    btn4.textContent = 'votado';
}

btn5.addEventListener('click', funtion())
{
    uach++;
    conta5.textContent = uach;
    btn5.disabled = true;
    btn5.textContent = 'votado';
}