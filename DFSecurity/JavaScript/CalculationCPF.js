
/* JavaScript */

function whatCPF (count) {

    if ((count = count.replace (/[^\d]/g, "")).length != 11)
        return false;

    if (count == "00000000000")
        return false;

    var read;
    var salt = 0;

    for (inner = 1; inner <= 9; inner++) 
	salt = salt + parseInt (count [inner - 1]) * (11 - inner);
        read = (salt * 10) % 11;

    if ((read == 10) || (read == 11))
        read = 0;

    if (read != parseInt (count [9]))
        return false;

    salt = 0;

    for (inner = 1; inner <= 10; inner++)
        salt = salt + parseInt (count [inner - 1]) * (12 - inner);
        read = (salt * 10) % 11;

    if ((read == 10) || (read == 11))
        read = 0;

    if (read != parseInt (count [10]))
        return false;
    
    return true;

}

function formatMask (object, mask) {

    whatobject=object;
    whatmask=mask;

    setTimeout ("formatMaskAll ()", 1);

}

function formatMaskAll () {

    whatobject.value = whatmask (whatobject.value);

}

function meuCPF (myCPF) {

    myCPF = myCPF.replace (/\D/g, "");
    myCPF = myCPF.replace (/(\d{3})(\d)/, "$1.$2");
    myCPF = myCPF.replace (/(\d{3})(\d)/, "$1.$2");
    myCPF = myCPF.replace (/(\d{3})(\d{1,2})$/, "$1-$2");

    return myCPF;

}

verifyCPF = function (el) {
    
    document.getElementById ('cpfResponse').innerHTML = whatCPF (el.value)? '' : '<span style="color:red"> CPF informado inválido. </span>';
    if (el.value == '') document.getElementById ('cpfResponse').innerHTML = '';

}
