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

btn1.addEventListener('click', function()
{
    itci++;
    conta1.textContent = itci;
    btn1.disabled = true;
    btn1.value = 'Votado';
});

btn2.addEventListener('click', function()
{
    tec++;
    conta2.textContent = tec;
    btn2.disabled = true;
    btn2.value = 'Votado';
});

btn3.addEventListener('click', function()
{
    urn++;
    conta3.textContent = urn;
    btn3.disabled = true;
    btn3.value = 'Votado';
});

btn4.addEventListener('click', function()
{
    uacj++;
    conta4.textContent = uacj;
    btn4.disabled = true;
    btn4.value = 'Votado';
});

btn5.addEventListener('click', function()
{
    uach++;
    conta5.textContent = uach;
    btn5.disabled = true;
    btn5.value = 'Votado';
});

const botones = [
    { id: "miBtn1", inst: "ITCJ", contador: "conta1" },
    { id: "miBtn2", inst: "TEC", contador: "conta2" },
    { id: "miBtn3", inst: "URN", contador: "conta3" },
    { id: "miBtn4", inst: "UACJ", contador: "conta4" },
    { id: "miBtn5", inst: "UACH", contador: "conta5" },
];

function cargarConteos() {
    fetch("php/recuperarVotos.php")
        .then(res => res.json())
        .then(data => {
            document.getElementById("conta1").textContent = data.ITCJ;
            document.getElementById("conta2").textContent = data.TEC;
            document.getElementById("conta3").textContent = data.URN;
            document.getElementById("conta4").textContent = data.UACJ;
            document.getElementById("conta5").textContent = data.UACH;
        })
        .catch(err => console.error(err));
}

document.addEventListener("DOMContentLoaded", cargarConteos);

botones.forEach(b => {
    const btn = document.getElementById(b.id);
    const conta = document.getElementById(b.contador);

    btn.addEventListener("click", () => {
        fetch("php/procesarVoto.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ institucion: b.inst })
        })
        .then(res => res.json())
        .then(data => {
            if (data.error) {
                alert(data.error);
                return;
            }

            document.getElementById("conta1").textContent = data.conteos.ITCJ;
            document.getElementById("conta2").textContent = data.conteos.TEC;
            document.getElementById("conta3").textContent = data.conteos.URN;
            document.getElementById("conta4").textContent = data.conteos.UACJ;
            document.getElementById("conta5").textContent = data.conteos.UACH;

            botones.forEach(b2 => {
                const btn2 = document.getElementById(b2.id);
                btn2.disabled = true;
                if (b2.inst === b.inst) {
                    btn2.value = "Votado";
                }
            });
        })
        .catch(err => console.error(err));
    });
});

document.addEventListener("DOMContentLoaded", () => {
    fetch("php/recuperarVotos.php")
        .then(res => res.json())
        .then(data => {
            if(data.error){
                alert(data.error);
                return;
            }

            document.getElementById("conta1").textContent = data.conteos.ITCJ;
            document.getElementById("conta2").textContent = data.conteos.TEC;
            document.getElementById("conta3").textContent = data.conteos.URN;
            document.getElementById("conta4").textContent = data.conteos.UACJ;
            document.getElementById("conta5").textContent = data.conteos.UACH;

            if(data.usuario_voto){
                botones.forEach(b => {
                    const btn = document.getElementById(b.id);
                    btn.disabled = true;
                    if(b.inst === data.usuario_voto){
                        btn.value = "Votado";
                    }
                });
            }
        })
        .catch(err => console.error(err));
});