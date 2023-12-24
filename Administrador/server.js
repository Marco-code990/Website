const express = require('express');
const wol = require('wakeonlan');

const app = express();
const PORT = 3001;

app.use(express.static('public'));

app.get('/wakeonlan', (req, res) => {
    const macAddress = req.query.mac;
    const ipAddress = req.query.ip;

    // Enviar el paquete Wake-on-LAN
    wol(macAddress, { address: ipAddress })
        .then(() => {
            console.log('Paquete Wake-on-LAN enviado con éxito');
            res.sendStatus(200);
        })
        .catch(error => {
            console.error('Error al enviar el paquete Wake-on-LAN:', error);
            res.status(500).send('Error interno del servidor');
        });
});

app.listen(PORT, () => {
    console.log(`Servidor escuchando en http://localhost:${PORT}`);
});
