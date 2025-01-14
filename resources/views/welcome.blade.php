<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <form id="message" action="">
        <input type="text" name="" id="messageInput">
        <button id="submitButton" type="submit">Send</button>
    </form>

    
    <script src="https://cdn.jsdelivr.net/npm/socket.io-client@4.5.4/dist/socket.io.js"></script>
    <script>
        const socket = io('http://localhost:3000');
            socket.on('connect', () => {
                console.log("connected");
                socket.on("messageForAdmin", function(data){
                    console.log(data.message);
                })

                // socket.emit("test", {data:"hello world"})
                
                document.getElementById("message").addEventListener("submit", function(e){
                    e.preventDefault()
                    const messageInput = document.getElementById("messageInput");
                    const message = messageInput.value;
                    socket.emit("messageFromAdmin", {message})
                    messageInput.value = "";
                })
            });
    </script>
</body>
</html>