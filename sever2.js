const express = require('express');
const app = express();
const port = 3000;

// Função para gerar dados simulados (turbidez, temperatura, pH)
function getSensorData() {
  const now = new Date();
  return {
    turbidity: Math.floor(Math.random() * 100),  // Simulando turbidez (0-100%)
    temperature: (Math.random() * 35).toFixed(2),  // Simulando temperatura (0-35°C)
    ph: (Math.random() * 2 + 6).toFixed(2),  // Simulando pH (6.0 a 8.0)
    date: now.toLocaleDateString(),  // Data formatada
    time: now.toLocaleTimeString()  // Hora formatada
  };
}

// Rota para fornecer os dados de sensores
app.get('/dados', (req, res) => {
  const data = getSensorData();
  res.json(data);  // Retorna os dados como JSON
});

// Servindo arquivos estáticos (HTML, CSS, JS)
app.use(express.static('public'));

// Iniciando o servidor
app.listen(port, () => {
  console.log(`Servidor rodando em http://localhost:${port}`);
});
