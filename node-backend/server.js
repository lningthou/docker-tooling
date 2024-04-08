const express = require("express");
const { Pool } = require("pg"); 

const app = express();
app.use(express.json());

const pool = new Pool({
    user: 'aaronwan',
    host: 'db',
    database: 'mydb',
    password: 'mysecretpassword',  
    port: 5432,  
});

app.get("/", (req, res) => res.send("Healthy!"));
app.get("/todos", async (req, res) => {
	console.log("Started await");
	const { rows } = await pool.query("SELECT * FROM todos;");
	console.log("Ended await");
	console.log(rows);
	res.status(200).json(rows);
});

app.post("/todos", async (req, res) => {
	const { title } = req.body;
	await pool.query("INSERT INTO todos (title) VALUES ($1);", [title]);
	res.status(201).send(`Todo added with title: ${title}`);
});

const PORT = process.env.PORT || 3000;

const server = app.listen(PORT, '0.0.0.0', () => {
    	console.log(`Server running at port ${PORT}`);
});
