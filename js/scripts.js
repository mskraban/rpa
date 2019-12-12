$(document).ready(function () {
    $("#narocila").click(function () {
        var vrednost = $("#narocila option:selected").text();

        if (vrednost == 1) {
            $("#dsifra").text("5489546");
            $("#dnaziv").text("MERKUR trgovina d.o.o.");
            $("#dnaslov").text("Cesta na Okroglo 7");
            $("#dtrr").text("SI56 0100 0425 9685 3254");
        } else if (vrednost == "2") {
            $("#dsifra").text("15849");
            $("#dnaziv").text("RAING");
            $("#dnaslov").text("Zavrh nad Dobrno 9");
            $("#dtrr").text("SI56 0700 0725 1685 8255");
        } else if (vrednost == "3") {
            $("#dsifra").text("36941");
            $("#dnaziv").text("Big bang d.o.o.");
            $("#dnaslov").text("Zaloška cesta 13");
            $("#dtrr").text("SI56 2103 0145 9587 2359");
        } else if (vrednost == "4") {
            $("#dsifra").text("58624");
            $("#dnaziv").text("Mercator d.o.o.");
            $("#dnaslov").text("Slovenska ul. 24");
            $("#dtrr").text("SI56 1547 9685 3627 7514");
        }
    });
    $("#artikli").click(function () {
        var vrednost = $("#artikli option:selected").val();
        console.log(vrednost);

        if (vrednost == 1) {
            $("#sifraA").text("5489546");
            $("#nazivA").text("Prenosni računalnik");
            $("#emA").text("14");
            $("#cenaA").text("359.99");
            $("#rabatA").text("22,00");
        } else if (vrednost == "2") {
            $("#sifraA").text("5489546");
            $("#nazivA").text("Računalnik");
            $("#emA").text("14");
            $("#cenaA").text("1249.99");
            $("#rabatA").text("22,00");
        } else if (vrednost == "3") {
            $("#sifraA").text("5489546");
            $("#nazivA").text("Telefon");
            $("#emA").text("14");
            $("#cenaA").text("599.99");
            $("#rabatA").text("22,00");
        } else if (vrednost == "4") {
            $("#sifraA").text("5489546");
            $("#nazivA").text("Kamera");
            $("#emA").text("14");
            $("#cenaA").text("7859,50");
            $("#rabatA").text("18,00");
        }
    });

    $("#kolicina").change(function () {
        var zacetnaCena = $("#cenaA").text();
        console.log("zacetna cena: "+zacetnaCena);
        var steviloKos = $("#kolicina").val();
        console.log("stevilo kosov: "+steviloKos);
        $("#kolicinaA").text(steviloKos);

        var kos =  $("#kolicinaA").text(steviloKos);

        var skupaj = zacetnaCena * steviloKos;
        console.log(skupaj);

        $("#cenaA").text(skupaj);

    });




});
