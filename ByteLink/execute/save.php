<!DOCTYPE html>
<html lang="es">
<head>
    <title>Procesar Datos</title>
    <link rel="stylesheet" href="../Fonts/IndexFontsCaviarDreams.css">
</head>
<body>



<?php
// Datos de conexión a la base de datos
$server = "localhost";
$username = "root";
$password = "";
$database = "projects";

// Crear una conexión a la base de datos
$conn = new mysqli($server, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Obtener los datos del formulario
$TestID = $_POST['ShareTestID'];
$Brand = $_POST['ShareBrand'];
$Model = $_POST['ShareModel'];
$Serial = $_POST['ShareSerial'];
$screenTest = $_POST["ShareScreenTest"];
$errorType = $_POST["ShareErrorType"];
$errorNote = $_POST["ShareErrorNote"];
$touchPadTest = $_POST["ShareTouchPadTest"];
$touchScreenTest = $_POST["ShareTouchScreenTest"];
$leftSpeakerTest = $_POST["ShareLeftSpeakerTest"];
$rightSpeakerTest = $_POST["ShareRightSpeakerTest"];
$usbPortsTest = $_POST["ShareUsbPortsTest"];
$hdmiPortTest = $_POST["ShareHdmiPortTest"];
$batteryLifePercentage = $_POST["ShareBatteryLifePercentage"];
$chargerTest = $_POST["ShareChargerTest"];
$micTest = $_POST["ShareMicrophoneTest"];
$cameraTest = $_POST["ShareCameraTest"];
$keyboardTest = $_POST["ShareKeyboardTest"];

echo "$TestID";

// Crear la consulta SQL para insertar los datos
$sql = "INSERT INTO devtestresults (TestID, Brand, Model, Serial, ScreenTest, ErrorType, ErrorNote, TouchPadTest, TouchScreenTest, LeftSpeakerTest, RightSpeakerTest, UsbPortsTest, HdmiPortTest, BatteryLifePercentage, ChargerTest, MicrophoneTest, CameraTest, KeyboardTest) VALUES ('$TestID', '$Brand', '$Model', '$Serial', '$screenTest', '$errorType', '$errorNote', '$touchPadTest', '$touchScreenTest', '$leftSpeakerTest', '$rightSpeakerTest', '$usbPortsTest', '$hdmiPortTest', '$batteryLifePercentage', '$chargerTest', '$micTest', '$cameraTest', '$keyboardTest')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    echo "Los datos se han insertado correctamente en la base de datos.";
} else {
    echo "Error al insertar datos: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>


<h1 style="font-family: caviarDreams; font-size:30px;">Test Completo</h1>
<h2 style="font-family: caviarDreams; font-size:20px; color:#9b9b9b; position:absolute; bottom:0px;">Pulsa F11 para salir del test</h2>
<canvas id="birthday"></canvas>


<style>

body {
  margin: 0;
  background: #020202;
  overflow:hidden;
}
canvas{display:block}
h1 {
  position: absolute;
  top: 40%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: #F4F5F7;
  font-family: "Impact,Charcoal,sans-serif";
  font-size: 5em;
  font-weight: 800;
  -webkit-user-select: none;
  user-select: none;
}
h2 {
  position: absolute;
  top: 80%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: #F4F6F7;
  font-family: "Impact,Charcoal,sans-serif";
  font-size: 5em;
  font-weight: 800;
  -webkit-user-select: none;
  user-select: none;
}

</style>
 
    <script>

    // helper functions
const PI2 = Math.PI * 2;
const random = (min, max) => (Math.random() * (max - min + 1) + min) | 0;
const timestamp = (_) => new Date().getTime();

// container
class Birthday {
  constructor() {
    this.resize();

    // create a lovely place to store the firework
    this.fireworks = [];
    this.counter = 0;
  }

  resize() {
    this.width = canvas.width = window.innerWidth;
    let center = (this.width / 2) | 0;
    this.spawnA = (center - center / 4) | 0;
    this.spawnB = (center + center / 4) | 0;

    this.height = canvas.height = window.innerHeight;
    this.spawnC = this.height * 0.1;
    this.spawnD = this.height * 0.5;
  }

  onClick(evt) {
    let x = evt.clientX || (evt.touches && evt.touches[0].pageX);
    let y = evt.clientY || (evt.touches && evt.touches[0].pageY);

    let count = random(3, 5);
    for (let i = 0; i < count; i++)
      this.fireworks.push(
        new Firework(
          random(this.spawnA, this.spawnB),
          this.height,
          x,
          y,
          random(0, 260),
          random(30, 110)
        )
      );

    this.counter = -1;
  }

  update(delta) {
    ctx.globalCompositeOperation = "hard-light";
    ctx.fillStyle = `rgba(20,20,20,${7 * delta})`;
    ctx.fillRect(0, 0, this.width, this.height);

    ctx.globalCompositeOperation = "lighter";
    for (let firework of this.fireworks) firework.update(delta);

    // if enough time passed... create new new firework
    this.counter += delta * 3; // each second
    if (this.counter >= 1) {
      this.fireworks.push(
        new Firework(
          random(this.spawnA, this.spawnB),
          this.height,
          random(0, this.width),
          random(this.spawnC, this.spawnD),
          random(0, 360),
          random(30, 110)
        )
      );
      this.counter = 0;
    }

    // remove the dead fireworks
    if (this.fireworks.length > 1000)
      this.fireworks = this.fireworks.filter((firework) => !firework.dead);
  }
}

class Firework {
  constructor(x, y, targetX, targetY, shade, offsprings) {
    this.dead = false;
    this.offsprings = offsprings;

    this.x = x;
    this.y = y;
    this.targetX = targetX;
    this.targetY = targetY;

    this.shade = shade;
    this.history = [];
  }
  update(delta) {
    if (this.dead) return;

    let xDiff = this.targetX - this.x;
    let yDiff = this.targetY - this.y;
    if (Math.abs(xDiff) > 3 || Math.abs(yDiff) > 3) {
      // is still moving
      this.x += xDiff * 2 * delta;
      this.y += yDiff * 2 * delta;

      this.history.push({
        x: this.x,
        y: this.y
      });

      if (this.history.length > 20) this.history.shift();
    } else {
      if (this.offsprings && !this.madeChilds) {
        let babies = this.offsprings / 2;
        for (let i = 0; i < babies; i++) {
          let targetX =
            (this.x + this.offsprings * Math.cos((PI2 * i) / babies)) | 0;
          let targetY =
            (this.y + this.offsprings * Math.sin((PI2 * i) / babies)) | 0;

          birthday.fireworks.push(
            new Firework(this.x, this.y, targetX, targetY, this.shade, 0)
          );
        }
      }
      this.madeChilds = true;
      this.history.shift();
    }

    if (this.history.length === 0) this.dead = true;
    else if (this.offsprings) {
      for (let i = 0; this.history.length > i; i++) {
        let point = this.history[i];
        ctx.beginPath();
        ctx.fillStyle = "hsl(" + this.shade + ",100%," + i + "%)";
        ctx.arc(point.x, point.y, 1, 0, PI2, false);
        ctx.fill();
      }
    } else {
      ctx.beginPath();
      ctx.fillStyle = "hsl(" + this.shade + ",100%,50%)";
      ctx.arc(this.x, this.y, 1, 0, PI2, false);
      ctx.fill();
    }
  }
}

let canvas = document.getElementById("birthday");
let ctx = canvas.getContext("2d");

let then = timestamp();

let birthday = new Birthday();
window.onresize = () => birthday.resize();
document.onclick = (evt) => birthday.onClick(evt);
document.ontouchstart = (evt) => birthday.onClick(evt);
(function loop() {
  requestAnimationFrame(loop);

  let now = timestamp();
  let delta = now - then;

  then = now;
  birthday.update(delta / 1000);
})();


    </script>

<script>

  window.addEventListener('keydown', e=>{

    const KeyPressed = e.keyCode;

    if(KeyPressed == 122){

      window.location.href = "../execute?Review";

    }else if(KeyPressed == 116){
      
      e.preventDefault();

    }

  })

</script>

</body>
</html>
