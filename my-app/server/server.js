// server/server.js
const express = require("express");
const cors = require("cors");
const path = require("path");

const app = express();
const PORT = 5000;

// Enable CORS
app.use(cors());
app.use(express.json());

// Serve static frontend files
app.use(express.static(path.join(__dirname, "../client/public")));

// Example GET API endpoint
app.get("/api/message", (req, res) => {
  res.json({ message: "Hello from Express backend!" });
});

// Example POST API endpoint
app.post("/api/echo", (req, res) => {
  const { text } = req.body;
  res.json({ received: text });
});

// Start server
app.listen(PORT, () => {
  console.log(`✅ Server running at http://localhost:${PORT}`);
});
