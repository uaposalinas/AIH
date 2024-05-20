const express = require('express');
const { exec } = require('child_process');

const app = express();
const port = 4000;

app.use(express.static('public'));

app.get('/lockworkstation', (req, res) => {
  exec('rundll32.exe user32.dll,LockWorkStation', (error, stdout, stderr) => {
    if (error) {
      res.status(500).send('Error al ejecutar el comando para bloquear la estación de trabajo.');
      return;
    }
    res.send('Estación de trabajo bloqueada.');
  });
});

app.get('/lockworkstations', (req, res) => {
  exec('echo Hola', (error, stdout, stderr) => {
    if (error) {
      res.status(500).send('Error al ejecutar el comando "echo Hola".');
      return;
    }
    res.send('Comando ejecutado: "echo Hola".');
  });
});
app.get('/open', (req, res) => {
  const chromePath = 'C:/Archivos de programa/Google/Chrome/Application/chrome.exe';

  exec('start /d "C:\Program Files\Google\Chrome\Application" chrome.exe', (error, stdout, stderr) => {
    if (error) {
      res.status(500).send('Error al abrir Google Chrome.');
      return;
    }
    res.send('Google Chrome abierto.');
  });
});



app.listen(port, () => {
  console.log(`Servidor en ejecución en http://localhost:${port}`);
});
