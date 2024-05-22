const Totalss = document.querySelectorAll('.Totals');
let totalSum = 0;

for(let Aument = 0; Aument < Totalss.length; Aument++){
    const Total = Totalss[Aument];
    const GetTotal = Total.innerHTML;
    const RemoveLetters = GetTotal.substring(3,1000); // Asume que los valores están precedidos por un símbolo (e.g., '$')
    const Parse = parseInt(RemoveLetters);

    totalSum += Parse;
}

console.log(totalSum);
