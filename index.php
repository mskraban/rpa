<!doctype html>
<html lang="sl">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">


    <title>Hello, world!</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Izbira</h1>
        </div>
    </div>
    <form action="#">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Izbira dobavitelja</label>
                    <select id="narocila" name="users">
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "crud";
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT ID_narocilo FROM narocilo";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value=\"owner1\">" . $row['ID_narocilo'] . "</option>";
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                        ?>

                    </select>
                </div>
                <div class="form-group">
                    <label>Šifra artikla</label>
                    <select name="datum" id="artikli">
                        <option value="">Izberi artikel</option>
                        <option value="1">4247</option>
                        <option value="2">5321</option>
                        <option value="3">78952</option>
                        <option value="4">12345</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Količina artikla</label>

                    <input type="number" id="kolicina" min="1" max="100">

                </div>
                <button type="submit" id="potrdi" class="">Potrdi</button>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <!-- Button trigger modal -->
                    <button type="button" id="potrdi" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModal">
                        Dodaj artikel
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Vnos v dobavnico</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php

                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        $naziv = $_POST["naziv"];
                                        $naslov = $_POST["naslov"];
                                        $trr = $_POST["trr"];
                                        $ime = $_POST["ime"];
                                        $priimek = $_POST["priimek"];
                                        $nazivartikla = $_POST["nazivartikla"];
                                        $cena = $_POST["cena"];
                                        $rabat = $_POST["rabat"];

                                        $servername = "localhost";
                                        $username = "root";
                                        $password = "";
                                        $dbname = "crud";

                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }

                                        $sql = "INSERT INTO dobavitelj (naziv, naslov, TR)
                                        VALUES ($naziv, $naslov, $trr)";

                                        if ($conn->query($sql) === TRUE) {
                                            echo "New record created successfully";
                                        } else {
                                            echo "Error: " . $sql . "<br>" . $conn->error;
                                        }

                                        $conn->close();
                                    }

                                    function test_input($data)
                                    {
                                        $data = trim($data);
                                        $data = stripslashes($data);
                                        $data = htmlspecialchars($data);
                                        return $data;
                                    }

                                    ?>
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                        <h3>Dobavitelj</h3>

                                        <label class="col-sm-2 col-form-label">Naziv</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="naziv">
                                        </div>


                                        <label class="col-sm-2 col-form-label">Naslov</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="naslov">
                                        </div>


                                        <label class="col-sm-2 col-form-label">TRR</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="trr">
                                        </div>

                                        <h3>Referent</h3

                                        <label class="col-sm-2 col-form-label">Ime</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="ime">
                                        </div>


                                        <label class="col-sm-2 col-form-label">Priimek</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="priimek">
                                        </div>

                                        <h3>Artikel</h3

                                        <label class="col-sm-2 col-form-label">Naziv</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nazivartikla">
                                        </div>


                                        <label class="col-sm-2 col-form-label">Cena</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="cena">
                                        </div>


                                        <label class="col-sm-2 col-form-label">Rabat</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="rabat">
                                        </div>


                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary" name="vnos">Potrdi vnos
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zapri</button>
                                    <button type="button" class="btn btn-primary">Shrani spremembe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <hr>
    </form>
    <div class="row">
        <div class="col-2">
            <img src="https://cdn.motor1.com/images/mgl/GwZbJ/s3/logo-story-volkswagen.jpg" class="img-fluid">
        </div>
        <div class="col-6">
            <div class="wrap"><p><b>Big Bang</b>, trgovina in storitve, d.o.o.</p>
                <p>Šmartinska 152, 1000 Ljubljana, Slovenija</p>
                <p>02 543 58 65</p></div>
        </div>
        <div class="col-4">
            <p>Št. nabavnega naročila: 256</p>
            Datum: <?php echo "" . date("Y.m.d") . "<br>"; ?>
        </div>
    </div>
    <div class="row">
        <h1>Nabavno naročilo</h1>
        <hr>
    </div>
    <div class="row">
        <div class="col-6">
            <h2>Dobavitelj</h2>

            <table class="table">
                <tr>
                    <th>Šifra:</th>
                    <td id="dsifra">4654646</td>
                </tr>
                <tr>
                    <th>Naziv:</th>
                    <td id="dnaziv">Merkur</td>
                </tr>
                <tr>
                    <th>Naslov:</th>
                    <td id="dnaslov">Naslov podjetja</td>
                </tr>
                <tr>
                    <th>TR:</th>
                    <td id="dtrr">555 77 854 12312</td>
                </tr>
            </table>
        </div>
        <div class="col-6">
            <h2>Pogoji dobave</h2>

            <table class="table">
                <tr>
                    <th>Rok dobave:</th>
                    <td id="pdobava">22.02.2018</td>
                </tr>
                <tr>
                    <th>Štev. dni plačila:</th>
                    <td id="pdni">50</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead class="">
                <tr>
                    <th scope="col">Šifra artikla</th>
                    <th scope="col">Naziv</th>
                    <th scope="col">EM</th>
                    <th scope="col">Količina</th>
                    <th scope="col">Cena (€)</th>
                    <th scope="col">Rabat (%)</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row" id="sifraA"></th>
                    <td id="nazivA"></td>
                    <td id="emA"></td>
                    <td id="kolicinaA">kos</td>
                    <td id="cenaA"></td>
                    <td id="rabatA"></td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
<script>
    $(document).ready(function () {


        $("#potrdi").click(function () {
            var text1 = $("#narocila option:selected").text();
            var text5 = $("#artikli option:selected").text();
            var text6 = $("#referent option:selected").text();
            console.log(text1);
            console.log(text2);

            console.log(text5);
            console.log(text6);
        });

    })
</script>
</body>
</html>
