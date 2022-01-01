// SOAL NOMOR 1
const phi = 3.14
let input = prompt("Masukkan jari jari lingkaran : ");
let luas = phi * input**2
alert(`Luas Lingkaran : ${luas} cm`)

let keliling = 2 * phi * input
alert(`Keliling Lingkaran : ${keliling} cm`)

// SOAL NOMOR 2
let Rupiah = prompt("Masukkan Uang Rupiah Anda : ");
const kurs = 14.650
let total = Rupiah / kurs 
alert(`Hasil Konversi : ${total}`)

// SOAL NOMOR 3
const jamMasuk = prompt("Masukkan Jam Masuk :");
const jamKeluar = prompt("Masukkan Jam Keluar : ");
const selisih = Number(jamKeluar) - Number(jamMasuk);
const hargaAwal = 3000

if (selisih <= 2){
    alert(`Keluaran Biaya : ${hargaAwal}`);
} 
else {
    const hasil = hargaAwal + (selisih - 2) * 1000; 
    alert(`Keluaran Biaya :  ${hasil}`);
}



