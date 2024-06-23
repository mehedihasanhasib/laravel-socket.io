const express = require('express');
const app = express();
const http = require('http');
const { Server } = require('socket.io');

// Create an HTTP server
const server = http.createServer(app);

// Initialize socket.io with the HTTP server and set CORS options
const io = new Server(server, {
  cors: { origin: "*" }
});

// Set up a connection event listener
io.on('connection', (socket) => {
     console.log('A user connected');
     socket.on("messageFromUser", function(data){
          io.emit("messageForAdmin", data);
     })

     socket.on("messageFromAdmin", function(data){
          io.emit("messageForUser", data);
     })
});

// Start the server on port 3000
server.listen(3000, () => {
  console.log('Server is running on http://localhost:3000');
});
