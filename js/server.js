const http = require('http');

const fs = require('fs');

const path = require('path');

const server = http.createServer((req, res) => {
    if (req.method === 'GET' && req === '/' ) {
        const filePath = path.join(__dirname, '/index.html');
        fs.readFile(filePath, 'utf8', (err, data) => {
            if (err) {
                res.writeHead(500, { 'Content-Type': 'text/plain'});
                res.end('Internal Server Error');
                return;
            }
            res.writeHead(200, {'Content-Type': 'text/html'});
            res.end(data);
        });
    } else {
        res.writeHead(404, { 'Content-Type': 'text/plain' });
        res.end('Not Found');
    }
});

const PORT = 3000;
server.listen(PORT, () => {
    console.log(`Server os running on https://localhost:${PORT}`)
})