const express = require('express');
const bodyParser = require('body-parser');
const app = express();
const port = 3000;

// Dados simulados dos sensores (você pode modificar isso depois para integrar com o Arduino)
let sensorData = {
  temperature: 25.0,  // Temperatura em °C
  humidity: 80.0      // Umidade em %
};

// Middleware para processar o corpo da requisição
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Rota para enviar os dados dos sensores para o front-end
app.get('/dados', (req, res) => {
  res.json(sensorData);  // Retorna os dados simulados
});

// Servindo arquivos estáticos da pasta 'public' (HTML, CSS, JS)
app.use(express.static('public'));

// Inicia o servidor
app.listen(port, () => {
  console.log(`Servidor rodando em http://localhost:${port}`);
});
